@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
        <h1>{{$data}}</h1>
        <p>users</p>
        <hr>
        @foreach ($users as $user)
        <div class="well" style=" padding-bottom: 2px; float:left; max_width: 100%; height: 40px;">
                        <h3><a href="/users/{{$user->id}}"> {{$user -> name}}</a></h3>
                          <span style="max-width: 100%; max-height: 40px;">{{$user->created_at}}</span>
                         
                        
                </div> 
                @break
      @endforeach
   

@endsection
