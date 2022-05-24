@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection
@section('css')
    <link href="{{asset('admins/setting.css')}}" rel="stylesheet">
@endsection

@section('js')
    <!-- Call ajax để xóa sản phẩm -->
    <script src="{{asset('vendors/sweetAlert2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/delete.js')}}"></script>
@endsection


@section('content')
    <div class="content-wrapper">
    @include('partials.content_header',['name'=>'Setting','key'=>'List'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-group float-right">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                Action
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('settings.create') . '?type=Text'}}">Text</a></li>
                                <li><a href="{{route('settings.create') . '?type=Textarea'}}">Textarea</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Config key</th>
                                <th scope="col">Config value</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($settings as $setting)
                                    <tr>
                                        <th scope="row">{{$setting->id}}</th>
                                        <td>{{$setting->config_key}}</td>
                                        <td>{{$setting->config_value}}</td>
                                        <td>
                                            <a href="{{route('settings.edit',['id'=>$setting->id]). '?type=' . $setting->type}}" class="btn btn-primary">Edit</a>
                                            <a href=""
                                               data-url="{{route('settings.delete',['id'=>$setting->id])}}"
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
                        {{$settings->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection





