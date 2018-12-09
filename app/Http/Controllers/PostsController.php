<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\comment;
use App\User;
use App\follow;
use Illuminate\Support\Facade\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!empty(auth()->user()->id)){
        $follows = follow::where('user_id', auth()->user()->id)->pluck('follows_id');
        $posts = Post::whereIn('user_id', $follows)->orderBy('created_at','desc')->get();
       // orderBy('created_at','desc')->paginate(10)
        $users = User::get();
        return view('posts.index')->with(['posts' => $posts, 'users' => $users]);
        }else{
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view('posts.index')->with(['posts' => $posts]);
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        
            if($request->hasFile('cover_image')){
                $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
                    //get filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    //get ext
                $extension = $request->file('cover_image')->getClientOriginalExtension();
                    //filename to store
                $filenameToStore = $filename.'_'.time().'.'.$extension;
                    //upload image
                $path = $request->file('cover_image')->storeAs('public/cover_image', $filenameToStore);
            }else{
                $filenameToStore = 'noimage.jpg';
            }

            //create post
        $post = new post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $filenameToStore;
        $post -> save();

        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $post =  Post::find($id);
      $comments = comment::where('post_id', $id)->get();
      return view('posts.show')->with(['post'=> $post,'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post =  Post::find($id);
            //check user
            if(auth()->user()->id !== $post->user_id){
                return redirect('/posts')->with('error', 'unauthorized access');
            }

        return view('posts.edit')->with('post', $post);
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        if($request->hasFile('cover_image')){
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
                //get filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //get ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
                //filename to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;
                //upload image
            $path = $request->file('cover_image')->storeAs('public/cover_image', $filenameToStore);
        }

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
            if($request->hasFile('cover_image')){
              $post->cover_image = $filenameToStore;
            }
        $post -> save();

        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =  Post::find($id);
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'unauthorized access');
        }

        if($post->cover_image != 'noimage.jpg'){
                //delete image
                Storage::delete('public/cover_image/'. $post->cover_image);
        }    

        $post->delete();
        return redirect('/posts')->with('success', 'Post Deletet');
    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function main()
   {
       $posts = Post::orderBy('created_at','desc')->paginate(10);
       return view('pages.index')->with('posts', $posts);
   }
}
