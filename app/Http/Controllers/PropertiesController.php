<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use App\User;
use Illuminate\Support\Facades\Storage;
use DB;

class PropertiesController extends Controller
{
    /** 
    * Create a new controller instance.
    *
    * @return void
    */
    //public function __construct()
    //{
        /* Add exceptions to the authentication so that a guest can view these excepted pages:
         properties/index and properties/show */
        //$this->middleware('auth', ['except' => ['properties/index', 'pages/index', 'show', 'ammochostos',
          //                        'larnaca', 'limassol', 'nicosia', 'pafos']]);
    //}
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::orderBy('created_at','desc')->get();
        $heading = 'Properties in all cities';
        return view('properties/index')->with('properties', $properties)
                                        ->with('heading', $heading);                           
    }

    public function pagesindex()
    {
        $properties_count = Property::all();
        return view('pages/index')->with('properties_count', $properties_count);
    }

    public function nicosia()
    {
        $properties = Property::all()->where('city', 'Nicosia');
        $heading = 'Properties in Nicosia';
        return view('properties/index')->with('properties', $properties)->with('heading', $heading);
    }

    public function larnaca()
    {
        $properties = Property::all()->where('city', 'Larnaca');
        $heading = 'Properties in Larnaca';
        return view('properties/index')->with('properties', $properties)->with('heading', $heading);
    }

    public function ammochostos()
    {
        $properties = Property::all()->where('city', 'Ammochostos');
        $heading = 'Properties in Ammochostos';
        return view('properties/index')->with('properties', $properties)->with('heading', $heading);
    }

    public function limassol()
    {
        $properties = Property::all()->where('city', 'Limassol');
        $heading = 'Properties in Limassol';
        return view('properties/index')->with('properties', $properties)->with('heading', $heading);
    }

    public function pafos()
    {
        $properties = Property::all()->where('city', 'Pafos');
        $heading = 'Properties in Pafos';
        return view('properties/index')->with('properties', $properties)->with('heading', $heading);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('properties/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'images' => 'image|nullable|max:1999' 
        ]);

        // Handles the file upload of Choose File btn
        if($request->hasFile('images')) { // checks if the user clicked Choose File btn and selected an image
            $filenameWithExt = $request->file('images')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('images')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('images')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $property = new Property;
        $property->title = $request->input('title');
        $property->reference_no = $request->input('reference_no');
        $property->published_date = $request->input('published_date');
        $property->price = $request->input('price');
        $property->property_type = $request->input('property_type');
        $property->area = $request->input('area');
        $property->city = $request->input('city');
        $property->description = $request->input('description');
        $property->images = $fileNameToStore;
        $property->user_id = auth()->user()->id;
        //dd($property);
        $property->save();

        return redirect('/home')->with('success', 'The property was added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::find($id); 
        return view('/properties/show')->with('property', $property);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = Property::find($id);
	
        //if(auth()->user()->id !== $property->user_id) { 
        if(!auth()->user()) { 
            return redirect('/properties/index')->with('error', 'Unauthorized Action! Access Denied.');
        }

        return view('/properties/edit')->with('property', $property);
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
        $this->validate($request, [
            'images' => 'image|nullable|max:1999' 
        ]);

        // Handles the file upload of Choose File btn
        if($request->hasFile('images')) { // checks if the user clicked Choose File btn and selected an image
            $filenameWithExt = $request->file('images')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('images')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('images')->storeAs('public/images', $fileNameToStore);
        } 

        $property = Property::find($id);
        $property->title = $request->input('title');
        $property->reference_no = $request->input('reference_no');
        //$property->published_date = $request->input('published_date');
        $property->price = $request->input('price');
        $property->property_type = $request->input('property_type');
        $property->area = $request->input('area');
        $property->city = $request->input('city');
        $property->description = $request->input('description');
        $property->user_id = auth()->user()->id;
        if($request->hasFile('images')) {
            $property->images = $fileNameToStore;
        }
        $property->save();

        return redirect('/home')->with('success', 'The property was edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::find($id); // Find a property and pass in id. Look into properties/show.blade
        
        // Checks if this isn't the user that the post belongs to in order to deny deleting the post.
        if(auth()->user()->id !== $property->user_id) { 
            return redirect('/properties')->with('error', 'Unauthorized Action! Access Denied.');
        }

        if($property->images != 'noimage.jpg') {
            Storage::delete('public/images/'.$property->images);
        } 
        
        $property->delete();
        
        return redirect('/properties')->with('success', 'The property was deleted successfully.');
    }
}
