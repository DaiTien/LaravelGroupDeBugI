@extends('admin.Template.admin_layout')
@section('titleForm')
    <div class="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<a href="/admin">{{__('Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('room.index')}}">{{__('TitleLinkMovie')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('TitleCreateMovie')}}</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="m-auto card pl-3">
        <h3 class="text-center text-uppercase mt-3">{{__('TitleCreateMovie')}}</h3>
        <form action="{{route('room.store')}}" method="POST" style="width:95%" enctype="multipart/form-data" id="myForm">
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
                        <label class="col-sm-3">total seats</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="total seats" name="total_seats" class="form-control" value="{{old('total_seats')}}"/>
                        </div>
                    </div>
                
                    <div class="form-group row">
                        <label class="col-sm-3">Trạng thái</label>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="0" name="status" checked="checked">Còn ghế trống
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="1" name="status">Hết ghế trống
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
            <!-- <a href="javascript:void(0)" onclick="checkvalidation()" class="btn btn-primary">{{__("textCreateBT")}}</a> -->
                <input type="submit" class="btn btn-primary" value="{{__('textCreateBT')}}">
                <a href="{{route('room.index')}}" class="btn btn-secondary ml-2">{{__("textCancelBT")}}</a>
                    </div>
               
            </div>
           
        </form>
    </div>
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('span').hide();
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