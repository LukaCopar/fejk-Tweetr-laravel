<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Auth;
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
        $posts = Post::orderBy('created_at','desc')->where('user_id', auth()->user()->id)->paginate(10);
        return view('home')->with('posts', $posts);
    }
}
