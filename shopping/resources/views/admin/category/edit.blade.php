@extends('layouts.admin')

@section('title')
    <title>Edit Category</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content_header',['name'=>'Category','key'=>'Edit'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <form action="{{route('categories.update',['id'=>$category->id])}}" method="post">
                            <div class="form-group">
                                <label >Tên danh mục</label>
                                <input type="text" name="name" class="form-control"  placeholder="Nhập tên danh mục" value="{{$category->name}}">
                            </div>
                            <div class="form-group">
                                <label >Chọn danh mục</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Danh mục cha</option>
                                    {!! $htmlOption !!}
                                </select>
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




