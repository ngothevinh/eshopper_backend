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
    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Content Header -->
    @include('partials.content_header',['name'=>'User','key'=>'List'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('users.create')}}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên user</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <th>
                                        <a href="{{route('users.edit',['id'=>$user->id])}}" class="btn btn-primary">Edit</a>
                                        <a href="" data-url="{{route('users.delete',['id'=>$user->id])}}" class="btn btn-danger action_delete">Delete</a>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{$users->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection




