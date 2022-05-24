@extends('layouts.admin')

@section('title')
    <title>Add Product</title>
@endsection

@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('admins/add.css')}}" rel="stylesheet"/>
@endsection

@section('head')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content_header',['name'=>'Product','key'=>'Add'])
    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label >Tên sản phẩm</label>
                                <input type="text"
                                       name="name"
                                       @error('name')is-invalid @enderror
                                       class="form-control"
                                       placeholder="Nhập tên sản phẩm"
                                       value="{{old('name')}}">
                                @error('name')
                                    <div class="alert alert-danger validate">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >Giá sản phẩm</label>
                                <input type="number"
                                       name="price"
                                       @error('price')is-invalid @enderror
                                       class="form-control"
                                       placeholder="Nhập giá sản phẩm"
                                       value="{{old('price')}}">
                                @error('price')
                                    <div class="alert alert-danger validate">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label> Ảnh sản phẩm</label>
                                <input type="file"
                                       name="feature_image_path"
                                       class="form-control-file" >
                            </div>
                            <div class="form-group">
                                <label>Chi tiết ảnh sản phẩm</label>
                                <input type="file"
                                       multiple
                                       name="image_path[]"
                                       class="form-control-file mb-2" >
                            </div>

                            <div class="form-group">
                                <label >Chọn danh mục sản phẩm</label>
                                <select class="form-control select2_init"
                                        @error('category_id')is-invalid @enderror
                                        name="category_id">
                                    <option value="">Menu cha</option>
                                    {!! $htmlOption!!}
                                </select>
                                @error('category_id')
                                <div class="alert alert-danger validate">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nhập tags cho sản phẩm</label>
                                <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Mô tả sản phẩm</label>
                                <textarea name="contents" class="form-control" @error('contents')is-invalid @enderror id="content" rows="3" placeholder="Nhập mô tả sản phẩm">
                                    {{old('contents')}}
                                </textarea>
                                @error('contents')
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
@section('footer')
    <script>
        CKEDITOR.replace('content')
    </script>
@endsection
@section('js')
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('admins/add.js')}}"></script>

@endsection




