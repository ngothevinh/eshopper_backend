@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('admins/image.css')}}">
@endsection
@section('js')
    <!-- Call ajax để xóa sản phẩm -->
    <script src="{{asset('vendors/sweetAlert2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/delete.js')}}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
    @include('partials.content_header',['name'=>'Role','key'=>'List'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('roles.create')}}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên vai trò</th>
                                <th scope="col">Mô tả vai trò</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <th scope="row">{{$role->id}}</th>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->display_name}}</td>
                                    <th>
                                        <a href="{{route('roles.edit',['id'=>$role->id])}}" class="btn btn-primary">Edit</a>
                                        <a href="" data-url="{{route('roles.delete',['id'=>$role->id])}}" class="btn btn-danger action_delete">Delete</a>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{$roles->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection




