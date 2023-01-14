<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FinnishedHike;

class ProfileController extends Controller
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
 
    
    public function index() {
         // $finnishedHikes = FinnishedHike::where('user_id', '=', Auth::user()->id)->get();
         $hikes = FinnishedHike::join('hikes', function($join) {
            $join->on('hikes.id', '=', 'finnished_hikes.hike_id')->where('hikes.user_id', '=', 1);
        })->get();
        
        // dd($hikes);

        return view('profile', compact('hikes'));
    }
}
