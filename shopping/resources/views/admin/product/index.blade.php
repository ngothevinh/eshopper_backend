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
    @include('partials.header')
    <div class="content-wrapper">

    @include('partials.content_header',['name'=>'Product','key'=>'List'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('product.create')}}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá sản phẩm</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                        @foreach($products as $productItem)
                            <tr>
                                <th scope="row">{{$productItem->id}}</th>
                                <td>{{$productItem->name}}</td>
                                <td>{{number_format($productItem->price)}}</td>
                                <td>
                                    <img class="image_150_100" src="{{$productItem->feature_image_path}}" alt="">
                                </td>
                                <td>{{optional($productItem->category)->name}}</td>
                                <td>
                                    <a href="{{route('product.edit',['id'=>$productItem->id])}}" class="btn btn-primary">Edit</a>
                                    <a href="" data-url="{{route('product.delete',['id'=>$productItem->id])}}" class="btn btn-danger action_delete">Delete</a>
                                </td>

                            </tr>
                        @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{$products->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection




