<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Candidat;
use App\Models\Admin\Domaine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        if (Auth::user()->is_admin == 0) {
            return view('admin.home');
        }elseif (Auth::user()->is_admin == 1) {
            return view('admin.company.home');
        }elseif (Auth::user()->is_admin == 2) {
            $domaines = Domaine::where('user_id',Auth::user()->id)->get();
            $propositions = Candidat::where('user_id',Auth::user()->id)->where('status',1)->get();
            return view('admin.particular.home',compact('domaines','propositions'));
        }
    }
}
