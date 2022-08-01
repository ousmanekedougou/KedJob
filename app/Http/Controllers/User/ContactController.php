<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Contact;
use App\Models\User\Newsletter;
use App\Models\User\Testimonial;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('user.contact.index');
    }

    public function store(Request $request){

        if ($request->option == 1) {
            $validator = $this->validate($request,[
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'text' => ['required', 'string'],
            ]);

            Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'text' => $request->text,
            ]);
            Toastr::success('Votre message a ete enregistre avec succes', 'Envoi de message', ["positionClass" => "toast-top-right"]);
            return back();
        }elseif ($request->option == 2) {
            $validator = $this->validate($request,[
                'email' => ['required', 'string', 'email', 'max:255'],
            ]);

            Newsletter::create([
                'email' => $request->email,
            ]);
            Toastr::success('Votre abonnement a ete enregistre avec succes', 'Envoi de message', ["positionClass" => "toast-top-right"]);
            return back();
        }elseif ($request->option == 3) {
            $validator = $this->validate($request,[
                'name' => ['required', 'string', 'max:255'],
                'job' => ['required', 'string'],
                'text' => ['required', 'string'],
                'image' => 'required|image | mimes:jpeg,png,jpg,gif,ijf',
            ]);

            if($request->hasFile('image')){
                $imageName = $request->image->store('public/Job');
            }

            Testimonial::create([
                'name' => $request->name,
                'job' => $request->job,
                'text' => $request->text,
                'image' => $imageName,
                'status' => 0
            ]);
            Toastr::success('Votre temoignage a ete enregistre avec succes', 'Envoi de message', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }
}
