@extends('layouts.app')

@section('content')
    <h1>tweets</h1>
    @if(count($posts)>0)

        @foreach ($posts as $post) 
        <a href="/posts/{{$post->id}}"> 
        <div class="tweet">
            <div class="container">
              <div class="tweet-profile-pic">
                 <img class="avatar-pic" src="/storage/user_image/{{$post->user->profile_pic_URL}}">
                  </div>
               
                 <div class="profile-info">
                 <span class="tweet-username">{{$post->user->name}}</span> &#64;{{$post->user->ussername}}
                   </div>
                   <br>
            </div>
            <div class="content">


                {!!$post -> body!!}
            </div>
            @if($post->cover_image !== 'noimage.jpg')
                
            
                    <img class="tweet-pic" src="/storage/cover_image/{{$post->cover_image}}"><br>
            @endif
                    <p style="float: right;">Writeen on {{$post -> created_at}} by {{$post->user->name}}</p>

                        
        </div>
        </a>
      @endforeach
          {{$posts ->links()}}
    @else
    <p>no posts found</p>
    @endif
@endsection