@extends('admin.layout.admin_layout')




@section('content')
    <div class="col-lg-8 form_add offset3">
            {!! Form::model($data,['route'=>['users.update',$data->id],'method'=>'PATCH']) !!}
            {{ csrf_field() }}
            @include('admin.users.form',['user_one' => '1'])
        {!! Form::close() !!}
    </div>

@endsection


