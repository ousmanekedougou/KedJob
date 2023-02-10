<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Notifications\RegisteredUser;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
        $this->middleware(['auth','isAdmin'])->except('confirm');
    }

     public function confirm($id , $token){
       
        define('ACTIVE',1);
        $user = User::where('id',$id)->where('confirmation_token',$token)->first();
        if ($user) {
            $user->update(['confirmation_token' => null , 'is_active' => ACTIVE]);
            $this->guard()->login($user);
            Toastr::success('Votre compte a bien ete confirmer', 'Compte Confirmer', ["positionClass" => "toast-top-right"]);
            return redirect($this->redirectPath());
        }else {
            Toastr::success('Ce lien ne semble plus valide', 'Compte invalide', ["positionClass" => "toast-top-right"]);
            return redirect()->route('login')->with('error','Ce lien est invalid');
        }
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $user->notify(new RegisteredUser);
        Toastr::success('Votre compte a bien ete creer', 'Creation de compte', ["positionClass" => "toast-top-right"]);
        return back();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'numeric', 'min:13', 'unique:users'],
            'adress' => ['required', 'string', 'max:255'],
            'is_admin' => ['required', 'numeric'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'adress' => $data['adress'],
            'is_admin' => $data['is_admin'],
            'is_active' => 1,
            'image' => null,
            'password' => Hash::make('password'),
            // 'confirmation_token' => str_replace('/','',Hash::make(Str::random(40))), 
            'slug' =>  str_replace('/','',Hash::make(Str::random(10).'admin'.$data['email']))
        ]);
    }
}
