@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
        <h1>{{$title}}</h1>
        <p>this is the latest posts on this site</p>
        <hr>
        
        
        @foreach ($posts as $post)
        <div class="well" style=" padding-bottom: 2px;">
                        <h3><a href="/posts/{{$post->id}}"> {{$post -> title}}</a></h3>
                          <div style="max-width: 100%; max-height: 40px;">{!!$post->body!!}</div>
                          @if($post->cover_image !== 'noimage.jpg')
                                <img src="/storage/cover_image/{{$post->cover_image}}" style="max-width: 50%;"/><br>
                          @endif
                            <small>Writeen on {{$post -> created_at}} by {{$post->user->name}}</small>
                </div> 
                @break
      @endforeach

@endsection
