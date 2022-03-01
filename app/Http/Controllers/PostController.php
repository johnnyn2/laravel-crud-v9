<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rules\Uppercase;
use App\Http\Requests\PostValidationRequest;

class PostController extends Controller
{
    // may not the best way to add middleware in PostController. We can add middleware to route in web.php
    // but we are using Route::resource() for PostController, so it is better to declare the middleware in
    // controller so that it can restrict user access down to certain controller method
    public function __construct() {
        $this->middleware('auth', [
            'except' => ['index', 'show'],
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 1. select where id = $id
        // $posts = DB::select('select * from posts WHERE id = :id', [
        //     'id' => 7
        // ]);
        
        // 2. select where id = $id
        // $id = 7;
        // $posts = DB::table('posts')
        //     ->where('id', $id)
        //     ->get();

        // 3. select body column only
        // $posts = DB::table('posts')
        //     ->select('body')
        //     ->get();

        // 4. where clause
        // $posts = DB::table('posts')
        //     ->where('created_at', '<', now()->subDay())
        //     ->orWhere('title', 'Prof.')
        //     ->get();

        // 5. where between
        // $posts = DB::table('posts')
        //     ->whereBetween('id', [7,9])
        //     ->get();

        //6. Distinct
        // $posts = DB::table('posts')
        //     ->select('title')
        //     ->distinct()
        //     ->get();

        // 7. orderBy
        // $posts = DB::table('posts')
        //     ->orderBy('title', 'asc')
        //     ->get();

        // 8. sort by created_at in desc order
        // $posts = DB::table('posts')
        //     ->latest()
        //     ->get();

        // 9. sort by created_at in asc order
        // $posts = DB::table('posts')
        //     ->oldest()
        //     ->get();

        // 10. get the first one latest item
        // $posts = DB::table('posts')
        //     ->latest()
        //     ->first();

        // 11. find
        // $id = 7;
        // $posts = DB::table('posts')
        //     ->find($id);

        // 12. count
        // $posts = DB::table('posts')
        //     ->where('id', 111)
        //     ->count();

        // 13. min
        // $posts = DB::table('posts')
        //     ->min('id');

        // 14. max
        // $posts = DB::table('posts')
        //     ->max('id');

        // 15. sum
        //  $posts = DB::table('posts')
        //      ->sum('id');

        // 16. avg.
        // $posts = DB::table('posts')
        //     ->avg('id');

        // 17. insert
        // $posts = DB::table('posts')
        //     ->insert([
        //         'title' => 'New post',
        //         'body' => 'new post'
        //     ]);

        // 18. update
        // $posts = DB::table('posts')
        //     ->where('title', 'New post')
        //     ->update([
        //         'title' => 'New title',
        //         'body' => 'updated body'
        //     ]);

        // 19. delete
        // $posts = DB::table('posts')
        //     ->where('id', 13)
        //     ->delete();
        // dd($posts);

        // Eloquent
        // 1. select all
        // $posts = Post::all();
        
        // 2. where
        $posts = Post::where('id', '>', 3)->get()->toArray();

        //3. count
        // Post::count();

        // 4. sum
        $total = Post::sum('id');

        // 5. avg
        $avg = Post::avg('id');

        return view('posts.index', [
            'posts' => $posts,
            'total' => $total,
            'avg' => $avg
        ]);
    }

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
    public function store(PostValidationRequest $request)
    {
        // methods we can use on $request->file()
        // guessExtension()
        // guessClientExtension
        // getMimeType()
        // store()
        // asStore()
        // storePublicly()
        // move()
        // getClientOriginalName()
        // getClientMimeType()
        // getSize()
        // getError()
        // isValid()

        // get the upload file extension, e.g. jpg / png/ pdf
        // $fileExtension = $request->file('picture')->guessExtension();

        // we don't want people to upload image with the same name
        $picture = $request->file('picture');
        $newImageName = time() . '-' . $picture->getClientOriginalName();
        // move the picture to public/upload_pictures folder
        $picture->move(public_path('upload_pictures'), $newImageName);

        // method one to save a post. Good to use when you need custom logic before saving the model
        // $post = new Post;
        // $post->title = $request->input('title');
        // $post->body = $request->input('body');
        // $post->save();

        // method two to directly save the model
        $post = Post::create([
            'user_id' => auth()->id(),
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'picture_path' => $newImageName,
        ]);
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostValidationRequest $request, Post $post)
    {
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts');
    }
}
