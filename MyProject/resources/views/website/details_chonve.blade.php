@extends('website.layouts.master')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
@section('title', 'Details')
@section('content')
    <!-- PRICING SECTION -->
    <div class="section">
        <div class="container">
            <div class="pricing">
                {{-- <div class="pricing-header">
                    <span class="main-color"></span>Chọn vé
                </div> --}}
                <div class="pricing-list">
                    <div class="row">
                        <div class="col-dt-9 col-tl-12 col-mb-12">
                            <div class="pricing-box hightlight tab-content">
                                <div class="pricing-box-header">
                                    <div class="pricing-name">
                                        Chọn vé
                                    </div>
                                </div>
                                <div class="pricing-box-content">
                                    <table class="table">
                                        <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Loại vé</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Giá (VNĐ)</th>
                                            <th scope="col">Tổng (VNĐ</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($price_ticket as $price_ticket)
                                            <tr>
                                                <th scope="row">{{ $price_ticket->name }}</th>
                                                <td><input class="text-center number_ticket"
                                                           id="num_{{ $price_ticket->id }}" name="number" type="number"
                                                           min="0" value="0" autocomplete="off"/></td>
                                                <td><span id="price_{{ $price_ticket->id }}"
                                                          name="price_book">{{ number_format($price_ticket->price, 0, ',', ',') }}</span>
                                                </td>
                                                <td class="text-right"><span id="total_{{ $price_ticket->id }}"
                                                                             class="total_price_id">0</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr class="text-left">
                                            <th scope="row" colspan="3">Tổng</th>
                                            <td class="text-right"><span id="total_price"></span></td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="pricing-box-action">
                                </div>
                            </div>
                        </div>
                        <div class="col-dt-3 col-tl-12 col-mb-12">
                            <div class="pricing-box pricing-box__image hightlight">
                                <a href="#" class="movie-item movie-item--image">
                                    <img src="/{{ $movie->image }}" alt="">
                                    <div class="movie-item-content">
                                        <div class="movie-item-title">
                                            {{ $movie->name }}
                                        </div>
                                        <div class="movie-infos">
                                            <div class="movie-info">
                                                <i class="bx bxs-star"></i>
                                                <span>9.5</span>
                                            </div>
                                            <div class="movie-info">
                                                <i class="bx bxs-time"></i>
                                                <span>{{ explode(' ', $movie->duration)[0] }} mins</span>
                                            </div>
                                            <div class="movie-info">
                                                <span>HD</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="pricing-box-content pricing-box-content__image">
                                    <ul class="images__list">
                                        <li class="images__item">
                                            <p>{{ $show->showTimeRoom->name }}</p> <span></span>
                                        </li>
                                        <li class="images__item">
                                            <p>Suất chiếu : </p>
                                            <span>{{ $show->time_start }} | {{ $show->show_date }}</span>
                                        </li>
                                        <li class="images__item">
                                            <p>Tổng : </p> <span id="total_price">0 </span>
                                        </li>
                                        <li class="images__item">
                                            <a href="javascript:void(0)" onclick="check_chonve()"
                                               class="btn btn-movies btn_next">
                                                <span class="text-white">Tiếp tục</span>
                                            </a>
                                            <a href="javascript:void(0)" onclick="check_ticket()"
                                               class="btn btn-movies btn_tickket">
                                                <span class="text-white">Đặt vé</span>
                                            </a>
                                            {{-- <a href="javascript:void(0)" class="btn btn-hover btn_tickket"
                                                onclick="check_ticket()">
                                                <span class="text-white">Đặt vé</span>
                                            </a> --}}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <input type="text" name="count_ticket" hidden>
                        {{-- <input type="text" id="ticket_1"> --}}
                        {{-- <input type="text" id="ticket_2"> --}}
                        {{-- <input type="text" id="ticket_3"> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-primary btn_confirm" data-toggle="modal" data-target="#exampleModal" hidden>
        Launch demo modal
    </button>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin đặt vé</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('movie.save_book_ticket') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="text" id="ticket_1" name="ticket_1" hidden>
                        <input type="text" id="ticket_2" name="ticket_2" hidden>
                        <input type="text" id="ticket_3" name="ticket_3" hidden>
                        <div class="modal__info">
                            <label for="">Họ và tên : </label>
                            <input type="text" name="username" value="{{ $user->name }}" disabled>
                            <input type="text" name="user_id" value="{{ $user->id }}" hidden>
                        </div>
                        <div class="modal__info">
                            <label for="">Email : </label>
                            <input type="text" name="email" value="{{ $user->email }}" disabled>
                        </div>
                        <div class="modal__info">
                            <label for="">Số điện thoại : </label>
                            <input type="text" name="phong" value="{{ $user->phone }}" disabled>
                        </div>
                        <div class="modal__info">
                            <label for="">Phim : </label>
                            <input type="text" name="movie" value="{{ $movie->name }}" disabled>
                            <input type="text" name="movie_id" value="{{ $movie->id }}" hidden>
                        </div>
                        <div class="modal__info">
                            <label for="">Phòng : </label>
                            <input type="text" name="room" value="{{ $show->showTimeRoom->name }}" disabled>
                        </div>
                        <div class="modal__info">
                            <label for="">Suất chiếu : </label>
                            <input type="text" name="show_time"
                                   value="{{ $show->time_start }} | {{ $show->show_date }}" disabled>
                            <input type="text" name="show_time_id" value="{{ $show->id }}" hidden>
                        </div>
                        <div class="modal__info">
                            <label for="">Vị trí ghế : </label>
                            <input type="text" name="room_seat" value="" disabled>
                            <input type="text" name="seat_id" hidden>
                        </div>
                        <div class="modal__info">
                            <label for="">Tổng tiền : </label>
                            <input type="text" name="total_price" value="" disabled>
                            <input type="text" name="price" hidden>
                            <input type="text" name="count_seats" hidden>
                        </div>
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                        {{-- <button type="submit" class="btn btn-primary"></button> --}}
                        <a href="javascript:void(0)" class="btn btn-primary btn-confirm">Xác nhận</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- END PRICING SECTION -->
    <script>
        $("input[name *=number]").change(function () {
            $id = $(this).attr('id').split('_')[1];
            $price = $("span#price_" + $id).html().replace(',', '');
            $num_ticket = $("input#num_" + $id).val();
            if ($num_ticket < 0) {
                $num_ticket = 0
                $("input#num_" + $id).val($num_ticket);
            }
            $total = $price * $num_ticket;
            $("span#total_" + $id).html($total.toLocaleString());
            $tp = document.querySelector('.total_price_id').innerHTML;
            var x = document.getElementsByClassName("total_price_id");
            var y = document.getElementsByClassName("number_ticket");
            // console.log(y);
            var i;
            $countPrice = 0;
            $countTicket = 0;
            for (i = 0; i < x.length; i++) {
                $t = parseInt(x[i].outerText.replace(',', ''));
                // console.log(y[i].value);
                $countPrice += $t;
                $countTicket += parseInt(y[i].value);
            }
            // console.log($countTicket)
            //get tongo giá
            $("span#total_price").html($countPrice.toLocaleString() + " VND");
            $("input[name=count_ticket]").val($countTicket);

        })

        function get_book_details() {
            var x = document.getElementsByName('number');
            var y = document.getElementsByName('price_book');
            var i;
            for (i = 0; i < x.length; i++) {
                $num_ticket = x[i].value;
                $price_book = parseInt(y[i].outerText.replace(',', ''));
                if ($num_ticket > 0) {
                    $("input#ticket_" + (i + 1)).val((i + 1) + ',' + $num_ticket + ',' + $price_book);
                }
            }
        }

        function check_chonve() {
            // route('movie.choose_seat')
            $count_ticket = $("input[name=count_ticket]").val();

            // $room_id = 1;
            var currentURL = document.URL;
            $arr = currentURL.split('/');
            $show_id = $arr[$arr.length - 1];
            // console.log($show_id);
            if ($count_ticket == 0) {
                swal({
                    title: "Bạn chưa chọn vé nào!",
                    text: 'Vui lòng chọn thêm vé',
                    icon: "error",
                });
            } else if ($count_ticket > 4) {
                swal({
                    title: "Bạn chọn quá nhiều vé!",
                    text: 'Mỗi lần đặt vé không quá 4 vé! Xin cảm ơn',
                    icon: "warning",
                });
            } else {
                get_book_details();
                $.ajax({
                    method: 'GET',
                    url: '/movie/choose-seats/' + $show_id,
                    dataType: 'html',
                    success: function (data) {
                        // console.log(data)
                        $(".tab-content").html(data);
                    }
                })
            }
        }

        function check_ticket() {
            var arr_id = document.getElementById("txtDanhSachChecked").value;
            $count_choose = document.getElementById("txtCountChecked").value;
            $count_ticket = $("input[name=count_ticket]").val();
            var ds_ghe = document.getElementById("txtDanhSachGhe").value;
            var arr_ghe = ds_ghe.split(',');
            arr_ghe.splice(0, 1);
            // console.log(arr_ghe)
            if ($count_choose == 0) {
                swal({
                    title: "Bạn chưa chọn chỗ ngồi nào!",
                    text: 'Vui lòng chọn!',
                    icon: "error",
                });
            } else if ($count_choose != $count_ticket) {
                swal({
                    title: "Số chỗ ngồi bạn chọn không hợp lệ!",
                    text: 'Bạn chỉ được chọn ' + $count_ticket + ' ghế!',
                    icon: "warning",
                });
            } else {
                // xử lý hoàn thành
                // console.log('success')
                $('input[name*=room_seat]').val(arr_ghe);
                $('input[name*=seat_id]').val(arr_id);
                $('input[name=total_price]').val($("span#total_price").html());
                $('input[name=price]').val($("span#total_price").html());
                $('input[name=count_seats]').val($count_choose);
                $('button.btn_confirm').click();
            }
        }

        $(document).on('click', 'a.btn-confirm', function () {
            var ticket_1 = $('input[name=ticket_1]').val();
            var ticket_2 = $('input[name=ticket_2]').val();
            var ticket_3 = $('input[name=ticket_3]').val();
            var user_id = $('input[name=user_id]').val();
            var movie_id = $('input[name=movie_id]').val();
            var show_time_id = $('input[name=show_time_id]').val();
            var seats_id = $('input[name=seat_id]').val();
            var price = $('input[name=price]').val();
            var count_seats = $('input[name=count_seats]').val();
            $.ajax({
                data: {
                    ticket_1: ticket_1,
                    ticket_2: ticket_2,
                    ticket_3: ticket_3,
                    user_id: user_id,
                    movie_id: movie_id,
                    show_time_id: show_time_id,
                    seats_id: seats_id,
                    price: price,
                    count_seats: count_seats,
                    "_token": "{{ csrf_token() }}"
                },
                url: '{{ route('movie.save_book_ticket') }}',
                method: "POST",
                dataType: "json",
                success: function (data) {
                    if (data.success == true) {
                        swal({
                            position: 'center',
                            icon: 'success',
                            title: 'Đặt vé thành công!',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function () {
                            // $('#myForm').trigger("reset");
                            window.location.href = '/'
                        })
                    } else {
                        swal({
                            title: "Đã có lỗi xảy ra!",
                            text: 'Vui lòng thử lại sau!',
                            icon: "error",
                        });
                    }
                }
            })
        });
    </script>
@endsection
