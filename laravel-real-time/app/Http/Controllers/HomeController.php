<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\User;
use Auth;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=Auth::id();
        
        //get friends post only
        $posts = Post::with('user')->
        whereIn('user_id', Auth::user()->friends()->pluck('friend_id'))->orWhere('user_id', $id)->latest()->get();

        //random pepoel to add friends
        $peopelToFollow=User::where('id','!=',$id)->take(3)->inRandomOrder()->get();
        
        return view('home',compact('peopelToFollow'))->withPosts($posts);        
    }
    public function friends()
    {
        return view('friends');
    }
}
