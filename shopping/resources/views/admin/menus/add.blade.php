@extends('layouts.admin')

@section('title')
    <title>Add Menu</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content_header',['name'=>'Menu','key'=>'Add'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <form action="{{route('menus.store')}}" method="post">
                            <div class="form-group">
                                <label >Tên Menu</label>
                                <input type="text" name="name" class="form-control"  placeholder="Nhập tên Menu">
                            </div>
                            <div class="form-group">
                                <label >Chọn Menu</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Menu cha</option>
                                    {!! $optionSelect !!}
                                </select>
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




