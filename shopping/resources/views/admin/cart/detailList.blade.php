@extends('layouts.admin')

@section('title')
    <title>Chi tiết đơn hàng</title>
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
    @include('partials.content_header',['name'=>'Detail','key'=>'list'])

    <!-- Main content -->
        <h2 class="ml-3">Chi tiết đơn hàng</h2>
        <div class="customer">
            <ul>
                @foreach($carts as $cart)
                    <li>
                        ID đơn hàng:
                        <strong>
                            {{$cart->id}}
                        </strong>
                    </li>
                    <li>
                        Tên khách hàng:
                        <strong>
                            {{$cart->name}}
                        </strong>
                    </li>
                    <li>
                        Số điện thoại:
                        <strong>
                            {{$cart->phone}}
                        </strong>
                    </li>
                    <li>
                        Địa chỉ:
                        <strong>
                            {{$cart->address}}
                        </strong>
                    </li>
                    <li>
                        Email:
                        <strong>
                            {{$cart->email}}
                        </strong>
                    </li>
                    <li>
                        Ghi chú:
                        <strong>
                            {{$cart->description}}
                        </strong>
                    </li>
                @endforeach
            </ul>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Giá tiền</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Ngày đặt hàng</th>
                    <th scope="col">Thành tiền</th>
                </tr>
                </thead>
                <tbody>
{{--                @php--}}
{{--                    $total=0--}}
{{--                @endphp--}}
                @foreach($bills as $bill)
{{--                    @php--}}
{{--                        $total+=$bill->price * $bill->quantity--}}
{{--                    @endphp--}}
                    <tr>
                        <td>
                            <img src="{{$bill->product_image}}" alt=""
                                 style="width: 150px;height: 100px;object-fit: cover">
                        </td>
                        <td>{{$bill->product_name}}</td>
                        <td>{{$bill->price}} VNĐ</td>
                        <td>{{$bill->quantity}}</td>
                        <td>{{$bill->date_order}}</td>
                        <td>{{$bill->total_bill}} VNĐ</td>
                    </tr>
                @endforeach
{{--                <tr>--}}
{{--                    <td colspan="5"><b class="text-red">Tổng tiền</b></td>--}}
{{--                    <td colspan="1"><b class="text-red" style="margin-left: 10px">{{number_format($total)}} VNĐ</b></td>--}}
{{--                </tr>--}}
                </tbody>
            </table>
        </div>
    </div>

@endsection





