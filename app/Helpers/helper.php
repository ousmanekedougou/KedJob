<?php

use App\Models\Admin\Recrutement;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


if (!function_exists('page_title')) {
    function page_title($title)
    {
        $base_title = 'TouCki';
        if ($title === '') {
            return  $base_title;
        } else {
            return $title . ' | ' . $base_title;
        }
    }
}

if (!function_exists('set_active_roote')) {
    function set_active_roote($route)
    {
        return Route::is($route) ? 'active' : '';
    }
}

if (!function_exists('newemploi')) {
    function newemploi()
    {
        $newemploi = Recrutement::where('view',0)->where('user_id',Auth::user()->id)->get();
        return $newemploi;
    }
}


if (!function_exists('carbon_today')) {
    function carbon_today()
    {
        $today = Carbon::today()->format('Y-m-d');
        return $today;
    }
}

