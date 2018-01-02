@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"> {{\Auth::user()->name}} Profile</div>
        <div class="panel-body">
            <h3 class="text-center"> Welcome {{\Auth::user()->name}} </h3>
            <img class="text-center img-rounded img-responsive"
                 src="{{asset($data->avatar)}}" width="300px" height="100px;" style="margin-left: 220px;">
            <h3 class="text-center"> {{$data->facebook}} </h3>
            <h3 class="text-center"> {{$data->youtube}} </h3>
            <label style="font-size: 20px;font-style: italic;"> About You : </label>
            <p> {{$data->about}} </p>
        </div>
    </div>
@endsection