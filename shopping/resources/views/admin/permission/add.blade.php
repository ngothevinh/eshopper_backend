@extends('layouts.admin')

@section('title')
    <title>Add Permission</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content_header',['name'=>'Permissions','key'=>'Add'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <form action="{{route('permissions.store')}}" method="post">
                            <div class="form-group">
                                <label >Chọn tên module</label>
                                <select class="form-control" name="module_parent">
                                    <option value="">Chọn tên module</option>
                                    @foreach(config('permission.table_module') as $moduleItem)
                                        <option value="{{$moduleItem}}">{{$moduleItem}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    @foreach(config('permission.module_children') as $moduleItemChildren)
                                        <div class="col-md-3">
                                            <label for="">
                                                <input type="checkbox" value="{{$moduleItemChildren}}" name="module_child[]">
                                                    {{$moduleItemChildren}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
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




