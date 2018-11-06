@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
        <h1>{{$user->name}}</h1>
        <h3 style="float:left; ">Posts from this user</h3>
        <br>
        <hr>
   @foreach ($posts as $post)
   <div class="well" style="border-bottom: solid .1px lightgray; margin-bottom: 10px; padding-bottom: 2px;">
    <div class="row">
        <div class="col-md-4 col-sm-4" style="max-width:101px; max-height:101px; margin-right: 20px;">
            <img style="max-width:100px; max-height:100px; min-height: 55px;" src="/storage/cover_image/{{$post->cover_image}}">
        </div>
        <div class="col-md-8 col-sm-8">
                <h3><a href="/posts/{{$post->id}}"> {{$post -> title}}</a></h3>
                <small>Writeen on {{$post -> created_at}} by {{$post->user->name}}</small>
                  
         </div>
    </div>
</div>
   @endforeach

@endsection
