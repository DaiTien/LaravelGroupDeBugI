@extends('admin.Template.admin_layout')
@section('titleForm')
    <div class="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<a href="/admin">{{__('Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('show_time.index')}}">{{__('TitleLinkShowTime')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('TitleCreateShowTime')}}</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="m-auto card pl-3">
        <h3 class="text-center text-uppercase mt-3">{{__('TitleCreateShowTime')}}</h3>
        <form action="{{route('show_time.store')}}" method="POST" style="width:95%" enctype="multipart/form-data" id="myForm">
            @csrf
            <div class=row>
                <div class="col-8 mx-auto">
                    <div class="form-group row">
                        <label class="col-sm-3">Phim chiếu</label>
                        <div class="col-sm-9">
                            <select name="movie" class="form-control">
                                <option value="0">--- Chọn phim chiếu ---</option>
                                @foreach($movie as $movie)
                                    <option value="{{$movie->id}}" {{ (old("movie") == $movie->id ? "selected":"") }}>{{$movie->name}}</option>
                                @endforeach
                                @error('movie')
                                <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Phòng chiếu</label>
                        <div class="col-sm-9">
                            <select name="room" class="form-control">
                                <option value="0">--- Chọn phòng chiếu ---</option>
                                @foreach($room as $room)
                                    <option value="{{$room->id}}" {{ (old("room") == $room->id ? "selected":"") }}>{{$room->name}}</option>
                                @endforeach
                                @error('room')
                                <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Ngày chiếu</label>
                        <div class="col-sm-9">
                            <input type="date" placeholder="show date" name="show_date" class="form-control" value="{{old('show_date')}}" min="date()"/>
                            @error('show_date')
                            <span class="text-danger font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Giờ bắt đầu</label>
                        <div class="col-sm-9">
                            <input type="time" placeholder="time start" name="time_start" class="form-control" value="{{old('time_start')}}"/>
                            @error('time_start')
                            <span class="text-danger font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Giờ kết thúc</label>
                        <div class="col-sm-9">
                            <input type="time" placeholder="time end" name="time_end" class="form-control" value="{{old('time_end')}}"/>
                            @error('time_end')
                            <span class="text-danger font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-primary" value="{{__('textCreateBT')}}">
                <a href="{{route('show_time.index')}}" class="btn btn-secondary ml-2">{{__("textCancelBT")}}</a>
            </div>
        </form>
    </div>
    <script>
        //set min date = today
        function set_mindate() {
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1; //January is 0!
            var yyyy = today.getFullYear();
            if (dd < 10) {
                dd = '0' + dd
            }
            if (mm < 10) {
                mm = '0' + mm
            }
            today = yyyy + '-' + mm + '-' + dd;
            $("input[type=date]").attr('min', today);
        }

        $(document).ready(function () {
            set_mindate();
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
        //check movie and room choose
        $("#myForm").submit(function (e) {
            e.preventDefault();
            let movie_id = $('select[name*=movie]').val();
            let room_id = $('select[name*=room]').val();
            if (movie_id == 0) {
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    title: '{{__("TitleWarningChooseMovie")}}',
                    confirmButtonText: '{{__("confirmButtonText")}}',
                    confirmButtonColor: '#007bff',
                }).then((result) => {
                    if (result.value) {
                        e.preventDefault();
                        return false;
                    }
                });
            } else if (room_id == 0) {
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    title: '{{__("TitleWarningChooseRoom")}}',
                    confirmButtonText: '{{__("confirmButtonText")}}',
                    confirmButtonColor: '#007bff',
                }).then((result) => {
                    if (result.value) {
                        e.preventDefault();
                        return false;
                    }
                });
            } else {
                this.submit();
            }
        });
    </script>
@endsection