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
    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Content Header -->
    @include('partials.content_header',['name'=>'Cart','key'=>'List'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên khách hàng</th>
                                <th scope="col">Email</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">SĐT</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($carts as $cart)
                                <tr>
                                    <th scope="row">{{$cart->id}}</th>
                                    <td>{{$cart->name}}</td>
                                    <td>{{$cart->email}}</td>
                                    <td>{{$cart->address}}</td>
                                    <td>{{$cart->phone}}</td>
                                    <td>
                                        <a href="{{route('cart.detailList',['id'=>$cart->id])}}" class="btn btn-primary">Chi tiết đơn hàng</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{$carts->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection





