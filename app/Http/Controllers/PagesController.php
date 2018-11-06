<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome To My Site';
        $posts = Post::orderBy('created_at','desc')->get();
// return view('pages.index', compact('title'));
return view('pages.index')->with(['title' => $title, 'posts' => $posts ]);

    }
    public  function about()
    {
        $title = 'this is about yes';
        return view('pages.about')->with('title', $title);
    }
    public  function services()
    {
        $data = array(
                'title' => 'services',
                'services' => ['webDesign', 'potatos']);
        return view('pages.services')->with($data);
    }
   
}
