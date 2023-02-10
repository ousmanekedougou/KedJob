<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Candidat;
use App\Models\Admin\Domaine;
use App\Notifications\GestionRh;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
class ParticularController extends Controller
{
     public function __construct()
    {
        $this->middleware(['auth','isParticular']);
    }

    public function addDomaine(Request $request){
        $this->validate($request,[
            'name' => 'required'
        ]);

        Domaine::create([
            'name' => $request->name,
            'user_id' => Auth::user()->id
        ]);
        Toastr::success('Votre domaine a bien ete ajouter', 'Compte Modifier', ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function updateDomaine(Request $request,$id){
        $this->validate($request,[
            'name' => 'required'
        ]);

        Domaine::where('id',$id)->where('user_id',Auth::user()->id)->update([
            'name' => $request->name,
        ]);
        Toastr::success('Votre domaine a bien ete modifier', 'Compte Modifier', ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function destroyDomaine($id){
        Domaine::where('id',$id)->where('user_id',Auth::user()->id)->delete();
        Toastr::success('Votre domaine a bien ete supprimer', 'Compte Modifier', ["positionClass" => "toast-top-right"]);
        return back();
    }

    // les methodes du candidat

    public function addCandidat(Request $request,$id){

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:candidats'],
            'phone' => ['required', 'numeric', 'min:13', 'unique:candidats'],
            'date' => ['required', 'date'],
            'lieu' => ['required', 'string', 'max:255'],
            'adress' => ['required', 'string', 'max:255'],
            'type' => ['required','boolean'],
            'cv' => ['required','file','mimes:pdf,PDF'],
            'cni' => ['required','file','mimes:pdf,PDF'],
        ]);

        $cvName = '';
        $cniName = '';

        if($request->hasFile('cv')){
            $cvName = $request->cv->store('public/Candidats/cv');
        }

        if($request->hasFile('cni')){
            $cniName = $request->cni->store('public/Candidats/cni');
        }
        // dd($cniName);
        Candidat::create([
            'name'  => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'date'  => $request->date,
            'lieu'=> $request->lieu,
            'adress'=> $request->adress,
            'cv'    => $cvName,
            'cni'    => $cniName,
            'domaine_id' => $id,
            'user_id' => Auth::user()->id,
            'type' => $request->type,
            'status' => 0,
        ]);

        Toastr::success('Votre candidat a bien ete ajouter', 'Compte Modifier', ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function showCandidat($id){
        $domaine = Domaine::where('id',$id)->where('user_id',Auth::user()->id)->first();
        return view('admin.particular.showCandidat',compact('domaine'));
    }

    public function sendemailpropostition(Request $request,$id){

        // dd($request->all());
        $this->validate($request,[
            'name' => ['required', 'string',],
            'email' => ['required', 'string', 'email'],
            'objet' => ['required', 'string'],
            'msg' => ['required', 'string'],
        ]);

        $candidat = Candidat::where('id',$id)->where('user_id',Auth::user()->id)->first();
        
        Notification::route('mail',Auth::user()->email)
        ->notify(new GestionRh($request->name,$request->email,$request->objet,$request->msg,$request->cv,$request->cni,$candidat));
        $candidat->update(['status' => 1]);
        Toastr::success('Votre message a bien ete envoyer', 'Envoi de mail', ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function deleteCandidat($id){
        $candidat = Candidat::where('id',$id)->where('user_id',Auth::user()->id)->first();
        Storage::delete([$candidat->cv,$candidat->cni]);
        $candidat->delete();
        Toastr::success('Votre candidat a bien ete supprimer', 'Compte Supprimer', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
