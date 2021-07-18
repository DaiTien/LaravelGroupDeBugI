@extends('admin.Template.admin_layout')
@section('titleForm')
    <div class="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<a
                    href="/admin">{{ __('Home') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('TitleLinkRoomSeat') }}</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="card mb-4">
        <div class="m-2">
            <h3 class="text-center">{{ __('TitleListRoomSeat') }}</h3>
        </div>
        <form method="POST">
            @csrf
            <div class="card-body">
                @if (isset($room))
                    <div class="form-group row">
                        <label class="col-sm-2">Phòng chiếu: </label>
                        <div class="col-sm-4">
                            <select name="room" class="form-control list_room">
                                @foreach ($room as $room)
                                    <option value="{{ $room->id }}" {{ $room->status==1?'selected':'' }}>{{ $room->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
                <div class="table-responsive">
                    @if (isset($data))
                        <h4>Sơ đồ phòng chiếu</h4>
                        <hr>
                        <table class="table table-borderless mx-auto w-auto">
                            <thead>
                            <tr>
                                <th class="text-center">Dãy ghế</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody class="data">
                            @foreach ($data['name_seat'] as $name_seat)
                                <tr>
                                    <th class="text-center ">
                                        <a href="javascript:void(0)" id="{{ $name_seat->id }}"
                                           class="row_seat">{{ $name_seat->name }}</a>
                                    </th>
                                    <td>
                                        @foreach ($data['seat'][$name_seat->name] as $seat)
                                            <input type="checkbox" id="check_{{ $seat->id }}"
                                                   name="{{ $name_seat->name . '_' . $seat->seat_number }}"
                                                   value="{{ $seat->id }}" style="display: none" />
                                            <a href="javascript:void(0)" onclick="changStatus({{ $seat->id }})"
                                               id="{{ $seat->id }}"
                                               name="{{ $name_seat->name . '_' . $seat->seat_number }}"
                                               class="seat {{ $seat->status == 0 ? 'active' : '' }}">{{ $seat->seat_number }}</a>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    @else
                        <span class="text-center text-danger" colspan="2">Không có dữ liệu</span>
                    @endif
                </div>
            </div>
            <div hidden>
                <input id="txtDanhSachChecked" name="ds_id" type="text" />
                <input id="txtCountChecked" name="count" type="text" />
            </div>
            <div class="form-group text-center">
                <a href="javascript:void(0)" onclick="disableSeat()" id="btnDisable" class="btn btn-light"
                   style="pointer-events: none">{{ __('TextDisable') }}</a>
                <a href="javascript:void(0)" onclick="enableSeat()" id="btnEnable" class="btn btn-light"
                   style="pointer-events: none">{{ __('TextEnable') }}</a>
            </div>
        </form>
    </div>
    <script>
        //func chang status
        function changStatus(id) {
            // debugger;
            if ($('#check_' + id).is(':checked')) {
                $('#check_' + id).removeAttr('checked');
                // $('#check_' + id).css('display', 'none');
            } else {
                $('#check_' + id).attr('checked', 'checked');
                // $('#check_' + id).css('display', 'none');
            }
            var arrValue = document.getElementById("txtDanhSachChecked").value;
            var array = JSON.parse("[" + arrValue + "]");
            var index = array.indexOf(id);
            if (index != -1) {
                array.splice(index, 1);
                document.getElementById("txtDanhSachChecked").value = array;
                document.getElementById("txtCountChecked").value = document.getElementById("txtCountChecked").value - 1;
            } else {
                document.getElementById("txtCountChecked").value = array.push(id);
                document.getElementById("txtDanhSachChecked").value = array;
            }
            if (array.length > 0) {
                $("#btnDisable").css("pointer-events", "auto");
                $("#btnEnable").css("pointer-events", "auto");
                $("#btnDisable").css({
                    "background-color": "#3699FF",
                    "color": "#fff"
                });
                $("#btnEnable").css({
                    "background-color": "#3699FF",
                    "color": "#fff"
                });
            } else {
                $("#btnDisable").css("pointer-events", "none");
                $("#btnEnable").css("pointer-events", "none");
                $("#btnDisable").css({
                    "background-color": "#F3F6F9",
                    "color": "#7e8299"
                });
                $("#btnEnable").css({
                    "background-color": "#F3F6F9",
                    "color": "#7e8299"
                });
            }
        }

        $(".list_room").change(function() {
            $("#txtDanhSachChecked").val('');
            $("#txtCountChecked").val(0);
            $value = $(this).val();
            $.ajax({
                method: 'GET',
                url: '/admin/room-seat/' + $value,
                dataType: 'html',
                success: function(data) {
                    console.log(data)
                    $(".table-responsive").html(data);
                }
            })
        })

        //func disable seat
        function disableSeat() {
            Swal.fire({
                title: '{{ __('ConfirmDisableTitle') }}',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '{{ __('confirmButtonText') }}',
                confirmButtonColor: '#007bff',
                cancelButtonText: '{{ __('cancelButtonText') }}',
                cancelButtonColor: '#6c757d',
            }).then((result) => {
                if (result.value) {
                    var ds_id = $('input[name*=ds_id]').val();
                    var room = $('select[name*=room]').val();
                    console.log(ds_id, room)
                    $.ajax({
                        data: {
                            ds_id: ds_id,
                            room: room,
                            "_token": "{{ csrf_token() }}"
                        },
                        method: 'POST',
                        type: 'UPDATE',
                        url: '/admin/room-seat/disable',
                        dataType: 'json',
                        success: function(data) {
                            if (data.success == true) {
                                Swal.fire({
                                    position: 'center',
                                    title: '{{ __('TextDisableSuccess') }}',
                                    icon: "success",
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(function() {
                                    location.reload();
                                })
                            } else {
                                Swal.fire({
                                    position: 'center',
                                    title: '{{ __('TextError') }}',
                                    icon: "error",
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                        }
                    })
                }
            })
        }

        //func enable seat
        function enableSeat() {
            Swal.fire({
                title: '{{ __('ConfirmEnableTitle') }}',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '{{ __('confirmButtonText') }}',
                confirmButtonColor: '#007bff',
                cancelButtonText: '{{ __('cancelButtonText') }}',
                cancelButtonColor: '#6c757d',
            }).then((result) => {
                if (result.value) {
                    var ds_id = $('input[name*=ds_id]').val();
                    var room = $('select[name*=room]').val();
                    $.ajax({
                        data: {
                            ds_id: ds_id,
                            room: room,
                            "_token": "{{ csrf_token() }}"
                        },
                        method: 'POST',
                        type: 'UPDATE',
                        url: '/admin/room-seat/enable',
                        dataType: 'json',
                        success: function(data) {
                            if (data.success == true) {
                                Swal.fire({
                                    position: 'center',
                                    title: '{{ __('TextEnableSuccess') }}',
                                    icon: "success",
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(function() {
                                    location.reload();
                                })
                            } else {
                                Swal.fire({
                                    position: 'center',
                                    title: '{{ __('TextError') }}',
                                    icon: "error",
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                        }
                    })
                }
            })
        }
    </script>
@endsection
