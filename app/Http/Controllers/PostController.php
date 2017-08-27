<?php

namespace App\Http\Controllers;


use App\Post;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

        public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is.super');

        // $this->middleware('can:update,post')->only(['edit', 'update']);
        // $this->middleware('can:delete,post')->only(['destroy']);
        //         $this->middleware('can:create,App\Post')->only(['create', 'store']);

    }

    public function index()
    {
        return view('blog.posts.index');
    }

    public function data()
    {
        return Datatables::of(Post::query())
        ->addColumn('action', function($post) {
            return view('blog.posts.action.action', compact('post'))->render();
        })
        ->addColumn('user', function($post) {
            return $post->user->name;
        })
        ->editColumn('created_at', function($post) {
            return $post->created_at->format('d/m/Y');
        })
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(['title', 'body']);
        $data['user_id'] = auth()->id();

        $post = Post::create($data);
        $post->images()->attach($request->input('image'));
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('blog.posts.edit');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }
}
