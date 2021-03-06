<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use App\Post;
use Auth;
class LikeController extends Controller
{
    public function index(Post $post)
    {
       return response()->json($post->likes()->with('user')->get());
    }

   /**
    * Favorite a particular post
    *
    * @param  Post $post
    * @return Response
    */
    public function likePost(Post $post)
    {
        Auth::user()->likes()->attach($post->id);

        return back();
    }

    /**
     * Unfavorite a particular post
    *
    * @param  Post $post
    * @return Response
    */
    public function unlikePost(Post $post)
    {
        Auth::user()->likes()->detach($post->id);

        return back();
    } 
    
    public function showLikes(Post $post)
    {
        $likesOwners = $post->likes();
        dd($likesOwners);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        //
    }
}
