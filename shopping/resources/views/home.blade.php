@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <!-- Header -->
    @include('partials.header')

    <div class="content-wrapper">
    @include('partials.content_header',['name'=>'Home','key'=>''])
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                       Trang chủ
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



