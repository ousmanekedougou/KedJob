<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function info(Request $request){
        // dd($request->all());
        $password = '';
        if ($request->password == null) {
           $password = Auth::user()->password;
        }else {
            $password = Hash::make($request->password);
        }
        
        User::where('id',Auth::user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'adress' => $request->adress,
            'phone' => $request->phone,
            'password' => $password
        ]);
        Toastr::success('Vos informations ont ete modifie avec success', 'Modification de compte', ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function image(Request $request){

        if (Auth::user()->is_admin == 1) {
            if($request->companyLogo == '')
            {
                $companyLogo = Auth::user()->companyLogo;
            }else{

                if($request->hasFile('logo'))
                {
                    $companyLogo = $request->logo->store('public/Admin');
                    Storage::delete(Auth::user()->companyLogo);
                }
            }
            User::where('id',Auth::user()->id && Auth::user()->is_admin == 1)->update([
                'companyLogo' => $companyLogo
            ]);
        }else {
            if($request->image == '')
            {
                $image = Auth::user()->image;
            }else{

                if($request->hasFile('image'))
                {
                    $image = $request->image->store('public/Admin');
                    Storage::delete(Auth::user()->image);
                }
            }

            User::where('id',Auth::user()->id)->update([
                'image' => $image
            ]);
        }

        Toastr::success('Votre image de profile a ete modifie avec success', 'Modification de compte', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
