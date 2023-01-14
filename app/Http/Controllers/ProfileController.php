<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FinnishedHike;
use Illuminate\Support\Facades\Auth;

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
        //  dd(Auth::user()->id);
        $hikes = FinnishedHike::join('hikes', function($join) {
            $join->on('hikes.id', '=', 'finnished_hikes.hike_id')->where('finnished_hikes.user_id', '=', Auth::user()->id);
        })->get();
        
        
        // dd($hikes);

        return view('profile', compact('hikes'));
    }
}
