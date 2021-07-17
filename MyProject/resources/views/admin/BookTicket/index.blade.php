@extends('admin.Template.admin_layout')
@section('titleForm')
    <div class="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<a
                    href="/admin">{{__('Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('TitleLinkBookTicket')}}</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="card mb-4">
        <div class="m-2">
            <h3 class="text-center">{{__('TitleListBookTicket')}}</h3>
            {{--            <a href="{{route('movie.create')}}" class="btn btn-primary m-7"><i class="fas fa-plus"></i></a>--}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr class="text-center">
                        <th>STT</th>
                        <th>Người đặt</th>
                        <th>Phim</th>
                        <th>Tổng ghế</th>
                        <th>Tổng tiền</th>
                        <th>Ngày đặt</th>
                        <th>Trạng thái</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td class="__alignItemtable">{{ $i++ }}</td>
                            <td class="__alignItemtable">{{ $item->user->name }}</td>
                            <td class="__alignItemtable">{{ $item->movie->name }}</td>
                            <td class="__alignItemtable">{{ $item->total_seat }}</td>
                            <td class="__alignItemtable text-right">{{ $item->total_price }} VND</td>
                            <td class="__alignItemtable">{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                            <td class="__alignItemtable">{{ $item->status==0?'Chưa duyệt':($item->status==1?'Đã duyệt':'Đã hủy') }}</td>
                            <td class="__alignItemtable">
                                <div class="text-center d-flex">
                                    <a onclick="details_book_ticket({{$item->id}})" class="btn btn-info" hidden><i
                                            class="fas fa-list"></i></a>
                                    @if($item->status==0)
                                        <a onclick="duyetve({{$item->id}})" class="btn btn-success"><i
                                                class="fas fa-check"></i></a>
                                    @endif
                                    @if($item->status==2)
                                    @else
                                        <a id="{{$item->id}}" data-id="{{$item->id}}" data-toggle="modal"
                                           data-target="#exampleModal_Huy" class="btn btn-danger ml-2 btn_cancel"
                                           title="Hủy vé"><i
                                                class="fas fa-times"></i></a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn_details" data-toggle="modal" data-target="#exampleModal" hidden>
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body tab-content">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal hủy -->
    <div class="modal fade" id="exampleModal_Huy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Lý do hủy</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="book_id" hidden>
                        <textarea name="lydo" id="txtlydo" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="modal-footer">
                        <a onclick="xacnhanhuy()" class="btn btn-primary">Xác nhận hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>

        //func detail
        function details_book_ticket(id) {
            $book_id = id
            $.ajax({
                method: 'GET',
                url: '/admin/book-ticket/detail/' + $book_id,
                dataType: 'html',
                success: function (data) {
                    // console.log(data)
                    $(".tab-content").html(data);
                }
            })
            $('button.btn_details').click();
            ;
        }

        //func duyet
        function duyetve(id) {
            $book_id = id
            Swal.fire({
                title: '{{__("ConfirmBookTitle")}}',
                text: '',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '{{__("confirmButtonText")}}',
                confirmButtonColor: '#007bff',
                cancelButtonText: '{{__("cancelButtonText")}}',
                cancelButtonColor: '#6c757d',
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        data: {
                            book_id: $book_id,
                            "_token": "{{ csrf_token() }}"
                        },
                        method: 'POST',
                        type: 'UPDATE',
                        dataType: 'json',
                        url: '/admin/book-ticket/confirm/' + $book_id,
                        success: function (data) {
                            if (data.success == true) {
                                Swal.fire({
                                    position: 'center',
                                    title: '{{__("ConfirmSuccessTitle")}}',
                                    icon: "success",
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(function () {
                                    location = "{{route('book_ticket.index')}}";
                                })
                            } else {
                                Swal.fire({
                                    position: 'center',
                                    title: '{{__("TextError")}}',
                                    icon: "error",
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(function () {
                                    location = "{{route('book_ticket.index')}}";
                                })
                            }
                        }
                    })
                }
            })
        }

        // func hủy
        function xacnhanhuy() {
            $book_id = $('input[name=book_id]').val();
            var lydo = $('#txtlydo').val();
            if (lydo == "") {
                Swal.fire({
                    position: 'center',
                    title: 'Vui lòng điền lý do hủy!',
                    icon: "error",
                    showConfirmButton: true,
                }).then(function () {
                    $('#txtlydo').focus();
                })
            } else {
                $.ajax({
                    data: {
                        book_id: $book_id,
                        lydo: lydo,
                        "_token": "{{ csrf_token() }}"
                    },
                    method: 'POST',
                    type: 'UPDATE',
                    dataType: 'json',
                    url: '/admin/book-ticket/cancel/' + $book_id,
                    success: function (data) {
                        if (data.success == true) {
                            Swal.fire({
                                position: 'center',
                                title: '{{__("CancelSuccessTitle")}}',
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function () {
                                location = "{{route('book_ticket.index')}}";
                            })
                        } else {
                            Swal.fire({
                                position: 'center',
                                title: '{{__("TextError")}}',
                                icon: "error",
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function () {
                                location = "{{route('book_ticket.index')}}";
                            })
                        }
                    }
                })
            }

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

        $(document).on("click", "a.btn_cancel", function () {
            var book_id = $(this).data('id');
            $('input[name=book_id]').val(book_id);
        });
    </script>
@endsection
