@extends('layouts.admin')

@section('title')
    <title>Add Setting</title>
@endsection
@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet"/>
@endsection
@section('content')
    <div class="content-wrapper">
    @include('partials.content_header',['name'=>'Setting','key'=>'Add'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <form action="{{route('settings.store') . '?type=' . request()->type}}" method="post">
                            <div class="form-group">
                                <label>Config key</label>
                                <input type="text"
                                       name="config_key"
                                       class="form-control"
                                       placeholder="Nhập config key"
                                       @error('config_key')is-invalid @enderror
                                       value="{{old('config_key')}}">
                                @error('config_key')
                                    <div class="alert alert-danger validate">{{$message}}</div>
                                @enderror
                            </div>

                            @if(request()->type === 'Text')
                                    <div class="form-group">
                                        <label>Config value</label>
                                        <input type="text"
                                               name="config_value"
                                               class="form-control"
                                               placeholder="Nhập config value"
                                               @error('config_value')is-invalid @enderror
                                               value="{{old('config_value')}}">
                                        @error('config_value')
                                            <div class="alert alert-danger validate">{{$message}}</div>
                                        @enderror
                                    </div>
                                    @elseif(request()->type === 'Textarea')
                                <label>Config value</label>
                                <textarea class="form-control" name="config_value" rows="4" @error('config_value')is-invalid @enderror>
                                         {{old('config_value')}}
                                </textarea>
                                @error('config_value')
                                    <div class="alert alert-danger validate">{{$message}}</div>
                                @enderror
                            @endif

                                <button type="submit" class="btn btn-primary">Create</button>
                                @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection




