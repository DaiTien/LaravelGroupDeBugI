@extends('admin.Template.admin_layout')
@section('titleForm')
    <div class="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<a href="/adimin">{{__('Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('room.index')}}">{{__('TitleLinkRoom')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('TitleUpdateRoom')}}</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="m-auto card pl-3">
        <h3 class="text-center text-uppercase mt-3">{{__('TitleUpdateRoom')}}</h3>
        <form action="{{route('room.update')}}" method="POST" style="width:95%" enctype="multipart/form-data">
            @csrf
            <div class=row>
                <div class="col-8">
                    <div class="form-group row" hidden>
                        <label class="col-sm-3">ID</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="id" name="id" value="{{$room->id}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Name</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="name" name="name" class="form-control" value="{{old('name', $room->name)}}">
                            @error('name')
                            <span class="text-danger font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-3">total_seats</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="total_seats" name="total_seats" class="form-control" value="{{old('total_seats',$room->total_seats)}}"/>
                        </div>
                    </div>
                    
                <div class="col-12">
                    <div class="form-group row">
                        <label class="col-sm-2">Trạng thái</label>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="0" name="status" {{$room->status==0?"checked":""}}>Còn ghế trống
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="1" name="status" {{$room->status==1?"checked":""}}>Hết ghế
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-primary" value="{{__('textUpdateBT')}}">
                <a href="{{route('movie.index')}}" class="btn btn-warning ml-2">{{__("textCancelBT")}}</a>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('span').hide();
            }, 1500)
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
                // to check whether pressed key is number or not
                return true;
            else return false;
        }
    </script>
@endsection