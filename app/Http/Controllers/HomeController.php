<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FinnishedHike;
use App\Models\User;
use App\Models\Hike;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $finnishedHikes = FinnishedHike::where('user_id', '=', Auth::user()->id)->get();
        $hikes = FinnishedHike::join('hikes', function($join) {
            $join->on('hikes.id', '=', 'finnished_hikes.hike_id')->where('hikes.user_id', '=', 1);
        })->get();
        
        // dd($hikes);

        return view('home', compact('hikes'));
    }
}
