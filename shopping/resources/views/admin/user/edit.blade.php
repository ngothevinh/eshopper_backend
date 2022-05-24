@extends('layouts.admin')

@section('title')
    <title>Edit User</title>
@endsection

@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('admins/add.css')}}" rel="stylesheet"/>
@endsection

@section('js')
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script>
        $('.select2_init').select2({
            'placeholder':'Chọn vai trò '
        })
    </script>
@endsection

@section('content')
    <div class="content-wrapper">
    @include('partials.content_header',['name'=>'User','key'=>'Edit'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <form action="{{route('users.update',['id'=>$user->id])}}" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label >Tên user</label>
                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       placeholder="Nhập tên user"
                                       @error('name')is-invalid @enderror
                                       value="{{$user->name}}">
                                @error('name')
                                <div class="alert alert-danger validate">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >Email</label>
                                <input type="email"
                                       name="email"
                                       class="form-control"
                                       placeholder="Nhập email"
                                       @error('email')is-invalid @enderror
                                       value="{{$user->email}}">
                                @error('email')
                                <div class="alert alert-danger validate">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >Password</label>
                                <input type="password"
                                       name="password"
                                       class="form-control"
                                       placeholder="Nhập password"
                                       @error('password')is-invalid @enderror
                                       value="{{old('password')}}">
                                @error('password')
                                <div class="alert alert-danger validate">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >Chọn vai trò</label>
                                <select name="role_id[]" class="form-control select2_init" multiple>
                                    <option value=""></option>
                                    @foreach($roles as $role)
                                        <option {{$roleUser->contains('id',$role->id) ? 'selected' : ''}}
                                                value="{{$role->id}}">
                                                {{$role->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                <div class="alert alert-danger validate">{{$message}}</div>
                                @enderror
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







