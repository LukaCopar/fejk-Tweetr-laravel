@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-default">Go Back</a>
    <h1>{{$post->title}}</h1>
    <div>
        @if($post->cover_image !== 'noimage.jpg')
            <img  src="/storage/cover_image/{{$post->cover_image}}" style="max-width:100%;">
        @endif
            <br><br>
        {!!$post->body!!}

    </div>
    <small>Written on {{$post -> created_at}} by {{$post->user->name}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
        <table style="float:right;">
            <td>
<a href="/posts/{{$post -> id}}/edit"class="btn btn-default">Edit</a>
            </td>
            <td>   
                
            </td>
            <td>
{!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}

{!!Form::close()!!}
            </td>
        </table>
    @endif
@endif
<br><br>
    <h2>comments</h2>
    <table>
        @foreach ($comments as $comment)
        <tr>
            <th>annonymus:   </th>
              <td>{{$comment->body}}</td>
        </tr>
        @endforeach
    </table>
<br><br>
<h4>Create a comment</h4>
{!! Form::open(['action' => ['CommentsController@store', $post->id], 'method' => 'POST']) !!}
    
    <div class="form-group">
            {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'comment text', 'style' => 'height:70px;' ])}}
            {{Form::hidden('id', $post->id)}}
    </div>
            {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}
@endsection