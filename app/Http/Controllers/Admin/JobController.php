<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Job;
use App\Models\Admin\Recrutement;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware(['auth','isCompany']);

    }
    public function index()
    {
        $emplois = Job::where('type',0)->get();
        return view('admin.job.emploi',compact('emplois'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function stage()
    {
        $stages = Job::where('type',1)->get();
        return view('admin.job.stage',compact('stages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validate($request,[
            'title' => 'required|string',
            'date' => 'required|date',
            'image' => 'required|image | mimes:jpeg,png,jpg,gif,ijf',
            'resume' => 'required|string',
            'body' => 'required|string',
            'status' => 'required|boolean',
        ]);

        if($request->hasFile('image')){
            $imageName = $request->image->store('public/Job');
        }

        Job::create([
            'title' => $request->title,
            'expiration_at' => $request->date,
            'image' => $imageName,
            'resume' => $request->resume,
            'detail' => $request->body,
            'status' => $request->status,
            'type' => $request->typeOffre,
            'user_id' => Auth::user()->id,
            'slug' =>  str_replace('/','',Hash::make(Str::random(10).$request->date.$request->title))
        ]);
        Toastr::success('Votre offre a ete ajouter avec succes', 'Ajout d\'offre', ["positionClass" => "toast-top-right"]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response'slug' =>  str_replace('/','',Hash::make(Str::random(10).'job'.$request->title))
     */
    public function show($id)
    {
       
    }

    public function employe()
    {
        $emplois = Recrutement::where('type',0)->where('user_id',Auth::user()->id)->get();
        return view('admin.recrutement.emploi',compact('emplois'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        
    }

    public function stagiare()
    {
        $stages = Recrutement::where('type',1)->where('user_id',Auth::user()->id)->get();
        return view('admin.recrutement.stage',compact('stages'));
    }


    public function annonce()
    {
        $getEmploi = Job::where('id',request()->annonce)->where('user_id',Auth::user()->id)->first();
        if ($getEmploi->type == 0) {
            $emplois = Recrutement::where('job_id',$getEmploi->job_id)->where('user_id',Auth::user()->id)->get();
            return view('admin.recrutement.emploi',compact('emplois'));
        }elseif($getEmploi->type == 1) {
            $stages = Recrutement::where('job_id',$getEmploi->job_id)->where('user_id',Auth::user()->id)->get();
            return view('admin.recrutement.stage',compact('stages'));
        }
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
        $validator = $this->validate($request,[
            'title' => 'required|string',
            'resume' => 'required|string',
            'body' => 'required|string',
            'status' => 'required|boolean',
        ]);
        $update = Job::where('id',$id)->first();
        $imageName = '';
        $status = '';
        $date = '';

        if($request->image == '')
        {
            $imageName = $update->image;
        }else{

            if($request->hasFile('image'))
            {
                $imageName = $request->image->store('public/Job');
                Storage::delete($update->image);
            }
        }
        if ($request->typeOffre == 0) {
            $type = 0;
        }else {
            $type = 1;
        }
        if ($request->date == '') {
            $date = $update->expiration_at;
        }else {
            $date = $request->date;
        }
        $update->title = $request->title;
        $update->expiration_at = $date;
        $update->resume = $request->resume;
        $update->detail = $request->body;
        $update->user_id = Auth::user()->id;
        $update->image = $imageName;
        $update->type = $type;
        $update->status = $request->status;
        $update->slug = str_replace('/','',Hash::make(Str::random(10).$date.$request->title));
        $update->save();
        Toastr::success('Votre offre a ete modifier avec succes', 'Modification d\'offre', ["positionClass" => "toast-top-right"]);
        return back();
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
            $admin_delete = Recrutement::where('id',$id)->first();
            $imgdel = $admin_delete->image;
            Storage::delete($imgdel); 
            $admin_delete->delete();
            Toastr::success('Votre employer a ete supprimer', 'Supression Employer', ["positionClass" => "toast-top-right"]);
            return back();
        }else {
            $admin_delete = Job::where('id',$id)->first();
            $imgdel = $admin_delete->image;
            Storage::delete($imgdel); 
            $admin_delete->delete();
            Toastr::success('Votre annonce a ete supprimer', 'Supression Annonce', ["positionClass" => "toast-top-right"]);
            return back();
        }
        
    }
}
