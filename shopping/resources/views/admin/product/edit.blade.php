@extends('layouts.admin')

@section('title')
    <title>Edit Product</title>
@endsection

@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('admins/add.js')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('admins/image.css')}}">
@endsection


@section('head')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content_header',['name'=>'Product','key'=>'Edit'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <form action="{{route('product.update',['id'=>$product->id])}}" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" name="name" class="form-control" placeholder="Nhập tên sản phẩm"
                                       value="{{$product->name}}">
                            </div>
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input type="text" name="price" class="form-control" placeholder="Nhập giá sản phẩm"
                                       value="{{$product->price}}">
                            </div>
                            <div class="form-group">
                                <label> Ảnh sản phẩm</label>
                                <input type="file" name="feature_image_path" class="form-control-file">
                                <div class="col-md-12">
                                    <div class="row">
                                        <img class="image_150_100" src="{{$product->feature_image_path}}"
                                             alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Chi tiết ảnh sản phẩm</label>
                                <input type="file" multiple name="image_path[]" class="form-control-file">
                                <div class="col-md-12">
                                    <div class="row">
                                        @foreach($product->images as $productImageItem)
                                            <div class="col-md-3">
                                                <img class="image_150_100" src="{{$productImageItem->image_path}}" alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Chọn danh mục sản phẩm</label>
                                    <select class="form-control select2_init" name="category_id">
                                        <option value="">Menu cha</option>
                                        {!! $htmlOption!!}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nhập tags cho sản phẩm</label>
                                    <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                                        @foreach($product->tags as $tagItem)
                                            <option value="{{$tagItem->name}}"selected> {{$tagItem->name}} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Mô tả sản phẩm</label>
                                    <textarea name="contents" class="form-control " id="content" rows="3"
                                              placeholder="Nhập mô tả sản phẩm">{{$product->content}}</textarea>
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
@section('footer')
    <script>
        CKEDITOR.replace('content')
    </script>
@endsection
@section('js')
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('admins/add.js')}}"></script>

@endsection




