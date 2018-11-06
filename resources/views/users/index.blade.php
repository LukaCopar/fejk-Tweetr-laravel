@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
        <h1>{{$data}}</h1>
        <p>users</p>
        
        @foreach ($users as $user)
        <hr>
        <div class="well" style=" padding-bottom: 2px; float:left; max_width: 100%; height: 40px;">
                        <span style="font-size: 30px;"><a href="/users/{{$user->id}}"> {{$user -> name}}</a></span>
                          <span style="max-width: 100%; max-height: 40px; white-space: normal;">joined: {{$user->created_at}}</span>    
                          <hr/>
                        </div> 

                        
      @endforeach
      

@endsection
