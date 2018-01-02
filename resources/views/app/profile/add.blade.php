@extends('layouts.app')

@section('content')

    {!! Form::open(['route'=>'profile.store','method'=>'post' ,'files'=>'true']) !!}
    @include('app.profile.form')
    {!! Form::close() !!}

@endsection