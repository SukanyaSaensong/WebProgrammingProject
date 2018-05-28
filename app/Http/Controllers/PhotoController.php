<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manager.form.photo');
    }
    public function upload(Request $request){
      $this->validate($request,[
        'select_file'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
      ]);

     $image = $request->file('select_file');

     $new_name = rand() . '.' . $image->getClientOriginalExtension();

     $image->move(public_path('images'), $new_name);
  
     return back()->with('success', 'Image Uploaded Successfully')->with('path', $new_name);
    }
}
