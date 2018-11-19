@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
        <h1>{{$data}}</h1>
        <p>users</p>
        
        @foreach ($users as $user)
        <hr>
        <div class="well" style=" width: 100%; padding-bottom: 2px; float:left; max_width: 100%; height: 40px;">
                        <span style="font-size: 30px; float: left;"><a href="/users/{{$user->id}}"> {{$user -> name}}</a></span>
                          <span style="max-width: 100%; padding-botom: 5px; float:right; max-height: 40px; white-space: normal;">
                         @if(Auth::user()->id !== $user->id)
                               <a href="users/{{$user->id}}/follow">
                                @if ($results = DB::select('select * from follows where follows_id = :id', ['id' => $user->id]))
                                
                               unfollow
                                @else
                                follow
                                @endif
                              </a>
                          @endif
                          <br>
                          joined: {{$user->created_at}}
                          </span>    
                          
          </div> 
          <br><br>
                        
      @endforeach
@endsection
