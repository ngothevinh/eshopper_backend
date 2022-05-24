@extends('layouts.admin')

@section('title')
    <title>Add Slider</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('admins/image.css')}}">
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content_header',['name'=>'Slider','key'=>'Edit'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <form action="{{route('slider.update',['id'=>$slider->id])}}" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label >Tên slider</label>
                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       placeholder="Nhập tên slider"
                                       @error('name')is-invalid @enderror
                                       value="{{$slider->name}}">
                                @error('name')
                                    <div class="alert alert-danger validate">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >Mô tả slider</label>
                                <textarea name="description" rows="3" class="form-control" @error('description')is-invalid @enderror>
                                    {{$slider->description}}
                                </textarea>
                                @error('description')
                                    <div class="alert alert-danger validate">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label >Hình ảnh</label>
                                <input type="file"
                                       name="image_path"
                                       class="form-control-file"
                                       @error('image_path')is-invalid @enderror>
                                <div class="col-md-4">
                                    <div class="row">
                                        <img class="image_150_100" src="{{$slider->image_path}}" alt="">
                                    </div>
                                </div>
                                @error('image_path')
                                    <div class="alert alert-danger validate">{{$message}}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection






