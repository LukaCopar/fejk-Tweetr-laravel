@extends('layouts.app')

@section('content')
    <h1>Edit user</h1>
    {!! Form::open(['action' => ['usersController@update', $user->id], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Name' ])}}
    </div>
    <div class="form-group">
            {{Form::label('ussername', 'ussername')}}
            {{Form::text('ussername', $user->ussername, ['class' => 'form-control', 'placeholder' => 'ussername text' ])}}
        </div>

        <div class="form-group">
            {{Form::label('password', 'Password')}}
            {{Form::text('password', '', ['class' => 'form-control', 'placeholder' => 'new password' ])}}
        </div>

        <div class="form-group">
            {{Form::label('password-conf', 'Password-conf')}}
            {{Form::text('password-conf', '', ['class' => 'form-control', 'placeholder' => 'confirm password' ])}}
        </div>

        <div class="form-group">
                {{Form::file('user_image')}}
            </div>

            
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}
@endsection