<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Departement;
use App\Models\Admin\Job;
use App\Models\Admin\Recrutement;
use App\Models\User;
use App\Notifications\RecrutementJob;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companys = User::where('is_admin',1)->where('is_active',1)->where('confirmation_token',null)->get();
        return view('user.company.index',compact('companys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validate($request , [
            'genre' => ['required', 'numeric',],
            'name' => 'required|string',
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'numeric', 'min:13',],
            'adress' => ['required', 'string', 'max:255'],
            'commune' => ['required', 'numeric'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,ijf',
            'cv' => 'required|mimes:pdf,PDF',
            'cni' => 'required|mimes:pdf,PDF',
            'motivation' => 'required|mimes:pdf,PDF',
            'extrait' => 'required|mimes:pdf,PDF',
        ]);
        $imageName = '';
        $cvName = '';
        $cniName = '';
        $mtName = '';
        $extName = '';

        if($request->hasFile('image')){
            $imageName = $request->image->store('public/Recrutement');
        }

        if($request->hasFile('cv')){
            $cvName = $request->cv->store('public/Recrutement');
        }

        if($request->hasFile('cni')){
            $cniName = $request->cni->store('public/Recrutement');
        }
        
        if($request->hasFile('motivation')){
            $mtName = $request->motivation->store('public/Recrutement');
        }

        if($request->hasFile('extrait')){
            $extName = $request->extrait->store('public/Job');
        }

        $profil = '';
        if ($request->profil == '') {
            $profil = null;
        }else {
            $profil = $request->profil;
        }

        $user = Recrutement::create([
            'genre' => $request->genre,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'adress' => $request->adress,
            'commune_id' => $request->commune,
            'image' => $imageName,
            'cv' => $cvName,
            'cni' => $cniName,
            'motivation' => $mtName,
            'extrait' => $extName,
            'type' => $request->type,
            'user_id' => $request->user_id,
            'job_id' => $request->job_id,
            'profil' => $profil
        ]);
        $user->notify(new RecrutementJob);
        Toastr::success('Votre inscription a bien ete enregistre', 'Inscription', ["positionClass" => "toast-top-right"]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $user = User::where('slug',$slug)->first();
        $companyfirst = Job::where('user_id',$user->id)->where('type',0)->first();
        $companys = Job::where('user_id',$user->id)->where('type',0)->get();
        return view('user.company.emploi',compact('companys','companyfirst'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $user = User::where('slug',$slug)->first();
        $companyfirst = Job::where('user_id',$user->id)->where('type',1)->first();
        $companys = Job::where('user_id',$user->id)->where('type',1)->get();
        return view('user.company.stage',compact('companys','companyfirst'));
    }

    public function detail($slug){
        $job = Job::where('slug',$slug)->first();
        $jobs = Job::where('type',$job->type)->get();
        $departements = Departement::all();
        return view('user.company.show',compact('job','jobs','departements'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($slug)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
