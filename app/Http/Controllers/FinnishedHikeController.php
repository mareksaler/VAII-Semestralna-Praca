<?php

namespace App\Http\Controllers;

use App\Models\FinnishedHike;
use App\Models\Hike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinnishedHikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Hike $hike)
    {
        // dd($request);
        
        $user_id = Auth::user()->id;
        $hike_id = $hike->id;
        // dd(FinnishedHike::where('hike_id', '=', $hike->id)->where('user_id', '=', $user_id)->exists());
        
        if (FinnishedHike::where('hike_id', '=', $hike->id)->where('user_id', '=', $user_id)->exists()) {
            return redirect()->back()->with('status-warning', 'Prispevok uz mate pridany do splnenych tur.'); 
        }

        $finnishedHike = new FinnishedHike();
        $finnishedHike->user_id = $user_id;
        $finnishedHike->hike_id = $hike_id;

        $finnishedHike->save();

        return redirect()->back()->with('status', 'Prispevok uspesne pridany do splnenych');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FinnishedHike  $finnishedHike
     * @return \Illuminate\Http\Response
     */
    public function show(FinnishedHike $finnishedHike)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FinnishedHike  $finnishedHike
     * @return \Illuminate\Http\Response
     */
    public function edit(FinnishedHike $finnishedHike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FinnishedHike  $finnishedHike
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FinnishedHike $finnishedHike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FinnishedHike  $finnishedHike
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hike $hike)
    {
        // dd($hike->id, Auth::user()->id);
        $finnishedHike = FinnishedHike::where('hike_id', '=', $hike->id)->where('user_id', '=', Auth::user()->id);
        // dd($finnishedHike);
        $finnishedHike->delete();
        return redirect()->back()->with('status', 'Prispevok uspesne odstraneny zo splnenych tur.');
    }

    public function finnished(Hike $hike, Request $request) {
        $hikes = FinnishedHike::join('hikes', function($join) {
            $join->on('hikes.id', '=', 'finnished_hikes.hike_id')->where('hikes.user_id', '=', 1);
        })->get();
    }
}
