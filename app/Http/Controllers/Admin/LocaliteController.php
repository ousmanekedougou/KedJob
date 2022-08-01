<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Commune;
use App\Models\Admin\Departement;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class LocaliteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth','isAdmin']);

    }
    public function index()
    {
        $departements = Departement::all();
        return view('admin.localite.departement',compact('departements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function commune()
    {
        $communes = Commune::all();
        $departements = Departement::all();
        return view('admin.localite.commune',compact('departements','communes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->option == 1) {
            $validator = $this->validate($request,[
                'name' => 'required|string',
            ]);

            Departement::create([
                'name' => $request->name
            ]);
            Toastr::success('Votre departement a ete ajouter avec succes', 'Ajout de departement', ["positionClass" => "toast-top-right"]);
            return back();
        }
        elseif ($request->option == 2) {
            $validator = $this->validate($request,[
                'name' => 'required|string',
                'departement' => 'required|numeric',
            ]);

            Commune::create([
                'name' => $request->name,
                'departement_id' => $request->departement
            ]);
            Toastr::success('Votre Commune a ete ajouter avec succes', 'Ajout de departement', ["positionClass" => "toast-top-right"]);
            return back();
        }
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
        if ($request->option == 1) {
            $validator = $this->validate($request,[
                'name' => 'required|string',
            ]);

            Departement::where('id',$id)->update([
                'name' => $request->name
            ]);
            Toastr::success('Votre departement a ete modifier avec succes', 'Ajout de departement', ["positionClass" => "toast-top-right"]);
            return back();
        }elseif ($request->option == 2) {
            $validator = $this->validate($request,[
                'name' => 'required|string',
                'departement' => 'required|numeric',
            ]);

            Commune::where('id',$id)->update([
                'name' => $request->name,
                'departement_id' => $request->departement
            ]);
            Toastr::success('Votre Commune a ete modifier avec succes', 'Ajout de departement', ["positionClass" => "toast-top-right"]);
            return back();
        }
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
            Departement::find($id)->delete();
        }else {
            Commune::find($id)->delete();
        }
        Toastr::success('Votre departement a ete supprimer avec succes', 'Ajout de departement', ["positionClass" => "toast-top-right"]);
        return back();
    }
}
