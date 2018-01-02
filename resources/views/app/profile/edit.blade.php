@extends('layouts.app')

@section('content')

    {!! Form::model($data ,['route' =>['profile.update',$data->id],'method'=>'PATCH','files'=>'true']) !!}
    @include('app.profile.form', ['var' => 1])
    {!! Form::close() !!}

@endsection