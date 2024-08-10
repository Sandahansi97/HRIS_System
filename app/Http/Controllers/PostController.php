<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use DB;

class PostController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $countpost = DB::table("posts")->count();
        $countopen = DB::table("posts")->sum('numberofopenings');
       

        $posts = Post::all();

        // $data = Post::orderBy('id')->paginate(5);
        // return view('posts.index',compact('data'))
        //     ->with('i', ($request->input('page', 1) - 1) * 5);

        return view('posts.index', compact('posts','countpost','countopen'));
    }

    // public function joblist()
    // {
    //     $posts = Post::all();

    //     // return view('posts.index', compact('posts'));
    //     // return view('/jobs',["posts"=>$posts]);
    //     return view('', compact('posts'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jobcode' => 'required',
            'title' => 'required',
            'qualification' => 'required',
            'description' => 'required',
        ]);

        Post::create($request->all());

        return redirect()->route('posts.index')->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     // return view('posts.show',compact('post'));
    //     // $user = Post::find($id); 
    //     return view('posts.show', compact('post'));
    //     // return view('posts.show',compact('posts'));
    // }
    public function show(Post $post)
    {
      return view('posts.show',compact('post'));
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // // public function edit($id)
    // // {
    // //     return view('posts.edit',compact('post'));
    // // }
        /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }


    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'description' => 'required',
    //     ]);

    //     $post->update($request->all());

    //     return redirect()->route('posts.index')->with('success','Post updated successfully');
    // }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
        'jobcode' => 'required',
            'title' => 'required',
            'qualification' => 'required',
            'description' => 'required',
        ]);

        $post->update($request->all());

        return redirect()->route('posts.index')->with('success','Post updated successfully');
    }


    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     $post->delete();

    //     return redirect()->route('posts.index')
    //                     ->with('success','post deleted successfully');
    // }
     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
      $post->delete();

       return redirect()->route('posts.index')
                       ->with('success','post deleted successfully');
    }
}
