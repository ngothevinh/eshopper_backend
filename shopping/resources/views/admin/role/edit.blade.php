@extends('layouts.admin')

@section('title')
    <title>Edit Role</title>
@endsection

@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('admins/add.css')}}" rel="stylesheet"/>
@endsection

@section('js')
    <script src="{{ asset('admins/add_role.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
    @include('partials.content_header',['name'=>'Role','key'=>'Edit'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{route('roles.update',['id'=>$role->id])}}" method="post" enctype="multipart/form-data" style="width: 100%">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Tên vai trò</label>
                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       placeholder="Nhập tên vai trò"
                                       value="{{$role->name}}">
                            </div>
                            <div class="form-group">
                                <label>Mô tả vai trò</label>
                                <textarea name="display_name" rows="4" class="form-control">
                                    {{$role->display_name}}
                                </textarea>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-8">
                                    <input  type="checkbox"
                                            class="checkall"
                                            style="margin-bottom: 20px;margin-top: 20px;">
                                    Checkall
                                </div>
                                @foreach($permissionsParent as $permissionsParentItem)
                                    <div class="card border-primary mb-3  col-md-12">
                                        <div class="card-header" style="background-color: #3ce0af">
                                            <label>
                                                <input type="checkbox" value="" class="checkbox_wrapper">
                                            </label>
                                            {{$permissionsParentItem->name}}
                                        </div>
                                        <div class="row">
                                            @foreach($permissionsParentItem->permissionChildren as $permissionChildrenItem)
                                                <div class="card-body text-primary col-md-3">
                                                    <h5 class="card-title">
                                                        <label>
                                                            <input  type="checkbox" name="permission_id[]"
                                                                    value="{{$permissionChildrenItem->id}}"
                                                                    class="checkbox_children"
                                                                    {{$permissionsChecked->contains('id',$permissionChildrenItem->id) ? 'checked':''}}>
                                                        </label>
                                                        {{$permissionChildrenItem->name}}
                                                    </h5>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-left: 10px">Update</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection





