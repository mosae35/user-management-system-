@extends('admin.layout.admin_layout')




@section('content')
<div class="col-lg-8 form_add offset3">
    <form class="login_form_0" method="POST" action="{{ route('users.store') }}">

    {{ csrf_field() }}
    @include('admin.users.form')
    </form>
</div>
    @endsection
















