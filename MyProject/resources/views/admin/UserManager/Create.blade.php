@extends('admin.Template.admin_layout')
@section('titleForm')
    <div class="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<a href="/admin">{{__('Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('usermanager.index')}}">{{__('TitleLinkUser')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('TitleCreateUser')}}</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="m-auto card pl-3">
        <h3 class="text-center text-uppercase mt-3">{{__('TitleCreateUser')}}</h3>
        <form action="{{route('usermanager.store')}}" method="POST" style="width:95%" enctype="multipart/form-data" id="myForm">
            @csrf
            <div class=row>
                <div class="col-8">
                    <div class="form-group row">
                        <label class="col-sm-3">Name</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="name" name="name" class="form-control" value="{{old('name')}}">
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
                                    <option value="{{$user_group->id}}" {{ (old("group_id") == $user_group->id ? "selected":"") }}>{{$user_group->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">lastname</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="lastname" name="lastname" class="form-control" value="{{old('lastname')}}"/>
                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">firstname</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="firstname" name="firstname" class="form-control" value="{{old('firstname')}}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">phone</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="phone" name="phone" class="form-control" value="{{old('phone')}}"/>
                            @error('phone')
                            <span class="text-danger font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">email</label>
                        <div class="col-sm-9">
                            <input type="email" placeholder="email" name="email" class="form-control" value="{{old('email')}}"/>
                            @error('email')
                            <span class="text-danger font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">password</label>
                        <div class="col-sm-9">
                            <input type="password" placeholder="password" name="password" class="form-control" value="{{old('password')}}"/>
                            @error('password')
                            <span class="text-danger font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">address</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="address" name="address" class="form-control" value="{{old('address')}}"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class=row hidden>
                <div class="col-12">
                    <div class="form-group row">
                        <label class="col-sm-3">Trạng thái</label>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="0" name="active" checked="checked">hiện
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="1" name="active">ẩn
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
            <!-- <a href="javascript:void(0)" onclick="checkvalidation()" class="btn btn-primary">{{__("textCreateBT")}}</a> -->
                <input type="submit" class="btn btn-primary" value="{{__('textCreateBT')}}">
                <a href="{{route('usermanager.index')}}" class="btn btn-secondary ml-2">{{__("textCancelBT")}}</a>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('span.text-danger').hide();
            }, 1500)
        });
        $('#CurrencyInput').on('change', function () {
            const value = this.value.replace(/,/g, '');
            if (value != "") {
                this.value = parseFloat(value).toLocaleString('en-US', {
                    style: 'decimal',
                    maximumFractionDigits: 2,
                    minimumFractionDigits: 0
                });
            }
        });

        function clickavatar1() {
            $("#upload input[type=file]").click();
        }

        function showPreview1(input) {
            if (input.files && input.files[0]) {
                var filerdr = new FileReader();
                filerdr.onload = function (e) {
                    $('#imgPreview1').attr('src', e.target.result);
                }
                filerdr.readAsDataURL(input.files[0]);
            }
        }

        function valid_numbers(e) {
            var key = e.which || e.KeyCode;
            if (key >= 48 && key <= 57)
                return true;
            else return false;
        }
    </script>
@endsection