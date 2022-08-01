<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User\Contact;
use App\Models\User\Newsletter;
use App\Models\User\Testimonial;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact.contact',compact('contacts'));
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

    public function temoignage()
    {
        $temoignages = Testimonial::all();
        return view('admin.contact.temoignage',compact('temoignages'));
    }


    public function aboner(){
        $abonnements = Newsletter::all();
        return view('admin.contact.aboner',compact('abonnements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (request()->option == 1) {
            Contact::where('id',$id)->delete();
            Toastr::success('Ce message a ete supprimer avec succes', 'Message Supprimer', ["positionClass" => "toast-top-right"]);
            return back();
        }elseif (request()->option == 2) {
            Testimonial::where('id',$id)->delete();
            Toastr::success('Ce temoignage a ete supprimer avec succes', 'Temoignage Supprimer', ["positionClass" => "toast-top-right"]);
            return back();
        }elseif (request()->option == 3) {
            Newsletter::where('id',$id)->delete();
            Toastr::success('Cet abboner a ete supprimer avec succes', 'Abonnement Supprimer', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }
}
