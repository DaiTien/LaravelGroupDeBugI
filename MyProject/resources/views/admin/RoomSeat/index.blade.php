@extends('admin.Template.admin_layout')
@section('titleForm')
    <div class="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<a href="/admin">{{__('Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('TitleLinkRoomSeat')}}</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="card mb-4">
        <div class="m-2">
            <h3 class="text-center">{{__('TitleListRoomSeat')}}</h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2">Phòng chiếu: </label>
                <div class="col-sm-4">
                    <select name="room" class="form-control">
                        @foreach($room as $room)
                            <option value="{{$room->id}}">{{$room->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="table-responsive">
                <h4>Sơ đồ phòng chiếu</h4>
                <hr>
                <table class="table w-50 table-borderless mx-auto">
                    <thead>
                    <tr>
                        <th class="text-center">Dãy ghế</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['name_seat'] as $name_seat)
                        <tr>
                            <th class="text-center ">
                                <button id="{{$name_seat->id}}" class="row_seat active">{{$name_seat->name}}</button>
                            </th>
                            <td>
                                @foreach($data['seat'][$name_seat->name] as $seat)
                                    <input type="checkbox" id="check_{{$seat->id}}" name="{{$name_seat->name.'_'.$seat->seat_number}}" value="{{$seat->id}}" style="display: none"/>
                                    <button onclick="changStatus(this.id)" id="{{$seat->id}}" name="{{$name_seat->name.'_'.$seat->seat_number}}" class="seat {{$seat->status ==0 ? "active":""}}">{{$seat->seat_number}}</button>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <input id="txtDanhSachChecked" name="ds_id" type="text"/>
    </div>
    <script>
        //func chang status
        function changStatus(id) {
            if ($('#check_' + id).is(':checked')) {
                $('#check_' + id).removeAttr('checked');
                $('#check_' + id).css('display', 'none');
            } else {
                $('#check_' + id).attr('checked', 'checked');
                $('#check_' + id).css('display', '');
            }
            $("#txtDanhSachChecked").val(id);
            var arr = $('input[name="ds_id"]').map(function () {
                return this.value;
            }).get();
            console.log(arr)

        }

        //func delete
        function Delete(id) {
            Swal.fire({
                title: '{{__("ConfirmDeleteTitle")}}',
                text: '{{__("ConfirmDeleteText")}}',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '{{__("confirmButtonText")}}',
                confirmButtonColor: '#007bff',
                cancelButtonText: '{{__("cancelButtonText")}}',
                cancelButtonColor: '#6c757d',
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        method: 'GET',
                        type: 'DELETE',
                        url: '/admin/movie/delete/' + id,
                        success: function () {
                            Swal.fire({
                                position: 'center',
                                title: '{{__("DeleteSuccessTitle")}}',
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function () {
                                location = "{{route('movie.index')}}";
                            })
                        }
                    })
                }
            })
        }
    </script>
@endsection
