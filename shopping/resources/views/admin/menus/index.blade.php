@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('js')
    <!-- Call ajax để xóa sản phẩm -->
    <script src="{{asset('vendors/sweetAlert2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/delete.js')}}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
    @include('partials.content_header',['name'=>'Menu','key'=>'List'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('menus.create')}}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên menu</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($menus as $menu)
                                <tr>
                                    <th scope="row">{{$menu->id}}</th>
                                    <td>{{$menu->name}}</td>
                                    <td>
                                        <a href="{{route('menus.edit',['id'=>$menu->id])}}" class="btn btn-primary">Edit</a>
                                        <a href=""
                                           data-url="{{route('menus.delete',['id'=>$menu->id])}}"
                                           class="btn btn-danger action_delete">
                                            Delete
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{$menus->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection




