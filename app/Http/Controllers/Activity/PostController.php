<?php

namespace App\Http\Controllers\Activity;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objs = Post::all();
        $data['objs']=$objs;
        return view('manager.post',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data['method']="POST";
      $data['url']=url('manager/post/');
        return view('manager.form.create_post',$data);
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
           'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);
        $obj              = new Post();
        $obj->topic       = $request->get('topic');
        $obj->price       =$request->get('price');
        $obj->description = $request->get('description');
        // $obj->image       = $request->get('image');

        if($request->hasFile('image')){
          $image = $request->file('image');
          $name=str_slug($request->image).'.'.$image->getClientOriginalExtension();
          $destinationPath = public_path('/images');
          $imagePath = $destinationPath."/".$name;
          $image->move($destinationPath,$name);
          $obj->image=$name;
        }
        $obj->user_id     = 1;
        $obj->save();
        return back()->with('success', 'upload successfully.')->with('path', $name);
        // return redirect(url('manager/post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj=Post::find($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $obj = Post::find($id);
      $data['url']=url('manager/post/'.$id);
      $data['method']="put";
      $data['obj']=$obj;

      return view('manager.form.create_post',$data);
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
        $obj =Post::find($id);
        $obj->topic = $request['topic'];
        $obj->price = $request['price'];
        $obj->description =$request['description'];
        $obj->user_id =1;
        $obj->save();
        return redirect(url('manager/post'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $obj = Post::find($id);
      $obj->delete();
      return redirect(url('manager/post'));
    }
}
