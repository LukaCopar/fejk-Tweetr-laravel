<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\Post;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facade\Storage;


class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at','desc')->paginate(10);

        $data = 'Users';
        return view('users.index')->with(['data'=> $data,'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::orderBy('created_at','desc')->where('user_id', $id)->paginate(10);
        $user =  User::find($id);
        return view('users.show')->with(['user' => $user, 'posts' => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit')->with('user', $user);
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
            'name' => 'required',
            'ussername' => 'required',
            'user_image' => 'image|nullable|max:1999'
        ]);


        if($request->hasFile('user_image')){
            $filenameWithExt = $request->file('user_image')->getClientOriginalName();
                //get filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //get ext
            $extension = $request->file('user_image')->getClientOriginalExtension();
                //filename to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;
                //upload image
            $path = $request->file('user_image')->storeAs('public/user_image', $filenameToStore);
        }

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->ussername = $request->input('ussername');
        if($request->input('password') == $request->input('password-conf') && $request->input('password') !== '')
        {
          $password =  Hash::make($request->input('password'));
          $user->password = $password;
        }
            if($request->hasFile('user_image')){
              $user->profile_pic_URL = $filenameToStore;
            }
        $user -> save();

        return redirect('/users')->with('success', 'user Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
