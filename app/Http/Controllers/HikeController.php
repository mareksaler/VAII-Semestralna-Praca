<?php

namespace App\Http\Controllers;

use App\Models\Hike;
use App\Models\Category;
use App\Models\FinnishedHike;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request);
        // $category = Category::where('name', 'like', $request->category_id)->first()->id;
        if ($request->category_name === 'all') {
            $hikes = Hike::all();
            $categories = Category::all();
            $name = 'hikes';
            return view('tatry.'.$name, compact('hikes', 'categories'));
        } 

        if ($request->category_name !== null) {
            $category = Category::where('name', '=', $request->category_name)->first();
            // dd($category->id);
            $hikes = Hike::where('category_id', 'like', $category->id)->get();
            $categories = Category::all();
            return view('tatry.hikes', compact('hikes', 'categories'));
        }

        $hikes = Hike::where('category_id', 'like', $request->category_id)->get();
        $name = Str::slug(Category::where('id', $request->category_id)->first()->name, '-');
        return view('tatry.'.$name, compact('hikes'));
        
        
        // dd($name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('tatry.tatry-create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'required|file|mimes:jpg,png,jpeg|max:5048', 
            'dlzka' => 'numeric|min:0|max:100',
            'cas' => 'numeric|min:0|max:100',
            'area' => 'required'
        ]);

        $title = $request->input('title');
        $category_id = $request->input('area');
        if (Hike::latest()->first() !== null) {
            $hikeId = Hike::latest()->first()->id + 1;
        } else {
            $hikeId = 1;
        }
        $slug = Str::slug($title, '-') . '.' . $hikeId;
        $user_id = Auth::user()->id;
        $text = $request->input('body');

        $newImageName = uniqid() . '-' . '.' . $request->image->extension();
        $request->image->move(public_path('img/hikes'), $newImageName);
        $time = $request->input('cas');
        $distance = $request->input('dlzka');

        $hike = new Hike();
        $hike->title = $title;
        $hike->text = $text;
        $hike->category_id = $category_id;
        $hike->slug = $slug;
        $hike->user_id = $user_id;
        $hike->imagePath = $newImageName;
        $hike->distance = $distance;
        $hike->time = $time;

        $hike->save();

        return redirect()->back()->with('status', 'Prispevok uspesne pridany');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hike  $hike
     * @return \Illuminate\Http\Response
     */
    public function show(Hike $hike)
    {
        $finnished = false;
        if (FinnishedHike::where('hike_id', '=', $hike->id)->where('user_id', '=', Auth::user()->id)->exists()) {
            $finnished = true;
        }

        return view('tatry.tatry-post', compact('hike', 'finnished'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hike  $hike
     * @return \Illuminate\Http\Response
     */
    public function edit(Hike $hike)
    {
        if (auth()->user()->id !== $hike->user_id) {
            abort(403);
        }
        $categories = Category::all();
        return view('tatry.tatry-edit', compact('hike', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hike  $hike
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hike $hike)
    {
        
        if (auth()->user()->id !== $hike->user_id) {
            abort(403);
        }
        
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'file|mimes:jpg,png,jpeg|max:5048', 
            'dlzka' => 'numeric|min:0|max:100',
            'cas' => 'numeric|min:0|max:100',
            'area' => 'required'
        ]);

        
        $title = $request->input('title');
        $category_id = $request->input('area');
        
        $slug = Str::slug($title, '-') . '.' . $hike->id;
        $text = $request->input('body');

        if ($request->input('image') !== null) {
            $newImageName = uniqid() . '-' . '-' . $request->image->extension();
            $request->image->move(public_path('img/hikes'), $newImageName);
            $hike->imagePath = $newImageName;
        }
        
        $time = $request->input('cas');
        $distance = $request->input('dlzka');

        $hike->title = $title;
        $hike->text = $text;
        $hike->category_id = $category_id;
        $hike->slug = $slug;

        
        $hike->distance = $distance;
        $hike->time = $time;

        $hike->save();

        return redirect()->back()->with('status', 'Prispevok uspesne upraveny');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hike  $hike
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hike $hike)
    {
        $hike->delete();
        return redirect()->back()->with('status', 'Prispevok uspesne odstraneny.');
    }
}
