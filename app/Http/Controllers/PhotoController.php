<?php

namespace App\Http\Controllers;

use Image;
use App\Event;
use App\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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
    public function store(Request $request, Event $event)
    {
        // |image|mimes:jpeg,png,jpg,gif,svg
        $this->validate($request, [

            'photos' => 'required'
        ]);

        foreach($request->photos as $image) {

            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('photos/' . $filename);

            Image::make($image)->resize(640, 480)->save($location);

            $event->photos()->create([
                'path' => $filename,
            ]);

        }

        return back();
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        $photo->delete();

        return back()->with('flash', 'removed!');
    }
}
