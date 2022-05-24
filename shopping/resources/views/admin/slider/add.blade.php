@extends('layouts.admin')

@section('title')
    <title>Add Slider</title>
@endsection
@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('admins/add.css')}}" rel="stylesheet"/>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content_header',['name'=>'Slider','key'=>'Add'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label >Tên slider</label>
                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       placeholder="Nhập tên slider"
                                       @error('name')is-invalid @enderror
                                       value="{{old('name')}}">
                                @error('name')
                                    <div class="alert alert-danger validate">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >Mô tả slider</label>
                                <textarea name="description" rows="3" class="form-control" @error('description')is-invalid @enderror>
                                    {{old('description')}}
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
                                @error('image_path')
                                    <div class="alert alert-danger validate">{{$message}}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection





