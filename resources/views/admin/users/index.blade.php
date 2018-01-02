@extends('admin.layout.admin_layout')
@section('content')


    <!-- page content -->
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Users <small>Some examples to get you started</small></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="    text-align: center;">
                    <div class="x_title">
                        <h2>Default Example <small>Users</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table id=" datatable" class=" msg table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Permissions</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if( $user->admin == 1)

                                        <a href="user/non_admin/{{ $user->id }}" class="btn btn-danger btn-xs"> Remove Permision </a>
                                        @else
                                        <a href="user/admin/{{ $user->id }}" class="btn btn-primary btn-xs"> Make-Admin </a>
                                    @endif
                                </td>
                                <td><a href="{{route('users.edit',$user->id)}}" class="btn btn-primary">
                                        <span class="text-center fa fa-edit "></span>
                                    </a>
                                </td>
                                <td><a href="{{url('users/'.$user->id.'/destroy')}}"
                                       class="btn btn-danger"><span class="text-center fa fa-trash-o"></span>
                                    </a>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination">
                        {{ $users->render()  }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection



