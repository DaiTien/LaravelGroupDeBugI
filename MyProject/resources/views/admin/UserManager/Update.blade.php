@extends('admin.Template.admin_layout')
@section('titleForm')
    <div class="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<a href="/admin">{{__('Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('usermanager.index')}}">{{__('User')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('UpdateUser')}}</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="m-auto card pl-3">
        <h3 class="text-center text-uppercase mt-2">{{__('TitleUpdateUser')}}</h3>
        <form action="{{route('usermanager.update')}}" method="POST" style="width:95%" enctype="multipart/form-data">
            @csrf
            <div class=row>
                <input type="text" name="id" value="{{$user->id}}" hidden>
                <div class="col-8 mx-auto">
                    <div class="form-group row">
                        <label class="col-sm-3">Name</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="name" name="name" class="form-control" value="{{old('name', $user->name)}}">
                            @error('name')
                            <span class="text-danger font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">role</label>
                        <div class="col-sm-9">
                            <select name="group_id" class="form-control">
                                @foreach($user_group as $user_group)
                                    <option value="{{$user_group->id}}" {{ (old("group_id", $user->group_id) == $user_group->id ? "selected":"") }}>{{$user_group->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">phone</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="phone" name="phone" class="form-control" value="{{old('phone', $user->phone)}}"/>
                            @error('phone')
                            <span class="text-danger font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">email</label>
                        <div class="col-sm-9">
                            <input type="email" placeholder="email" name="email" class="form-control" value="{{old('email', $user->email)}}"/>
                            @error('email')
                            <span class="text-danger font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">address</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="address" name="address" class="form-control" value="{{old('address', $user->address)}}"/>
                            @error('address')
                            <span class="text-danger font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-primary" value="{{__('textUpdateBT')}}"/>
                        <a href="{{route('usermanager.index')}}" class="btn btn-secondary ml-2">{{__("textCancelBT")}}</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('span.text-danger').hide();
            }, 1500)
        });
    </script>
@endsection
