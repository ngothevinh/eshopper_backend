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
    @include('partials.content_header',['name'=>'Slider','key'=>'List'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('slider.create')}}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên slider</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($sliders as $slider)
                                    <tr>
                                        <th scope="row">{{$slider->id}}</th>
                                        <td>{{$slider->name}}</td>
                                        <td>{{$slider->description}}</td>
                                        <td>
                                            <img class="image_150_100" src="{{$slider->image_path}}" alt="">
                                        </td>
                                        <th>
                                            <a href="{{route('slider.edit',['id'=>$slider->id])}}" class="btn btn-primary">Edit</a>
                                            <a href="" data-url="{{route('slider.delete',['id'=>$slider->id])}}" class="btn btn-danger action_delete">Delete</a>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{$sliders->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection




