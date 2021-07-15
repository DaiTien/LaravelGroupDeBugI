@extends('website.layouts.master')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
@section('title', 'Details')
@section('content')
    <!-- PRICING SECTION -->
    <div class="section">
        <div class="container">
            <div class="pricing">
                <div class="pricing-header">
                    <span class="main-color"></span>Đặt vé
                </div>
                <div class="pricing-list">
                    <div class="row">
                        <div class="col-dt-9 col-tl-12 col-mb-12">
                            <div class="pricing-box hightlight">
                                <div class="pricing-box-header">
                                    <div class="pricing-name">
                                        Lịch Chiếu
                                    </div>
                                </div>
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    @foreach($week as $key=>$value)
                                        <li class="nav-item">
                                            <a class="nav-link active input_date" id="{{$key}}"
                                               href="javascript:void(0)">{{$value}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="pricing-box-content">
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active">
                                            @if(count($data)>0)
                                                @foreach($data as $item)
                                                    <div class="xuatchieu">
                                                        <div class="title__room">
                                                            <h4>{{$item->showTimeRoom->name}}</h4>
                                                        </div>
                                                        <ul class="time__list">
                                                            <li class="time__item">
                                                                <a href="javascript:void(0)" id="{{$item->id}}"
                                                                   class="time__link btn_showtime">{{$item->time_start}}
                                                                    - {{$item->time_end}}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p>Chưa có lịch chiếu cho ngày này. Xin cám ơn.</p>
                                            @endif
                                        </div>
                                    </div>
                                    <input type="text" name="show_id" id="show_id" hidden>
                                    <input type="text" name="date" hidden>
                                </div>
                            </div>
                        </div>
                        <div class="col-dt-3 col-tl-12 col-mb-12">
                            <div class="pricing-box pricing-box__image hightlight">
                                <a href="javascript:void(0)" class="movie-item">
                                    <img src="/{{$movie->image}}" alt="">
                                    <div class="movie-item-content">
                                        <div class="movie-item-title">
                                            {{$movie->name}}
                                        </div>
                                        <div class="movie-infos">
                                            <div class="movie-info">
                                                <i class="bx bxs-star"></i>
                                                <span>9.5</span>
                                            </div>
                                            <div class="movie-info">
                                                <i class="bx bxs-time"></i>
                                                <span>{{explode(' ', $movie->duration)[0]}} mins</span>
                                            </div>
                                            <div class="movie-info">
                                                <span>HD</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="pricing-box-content pricing-box-content__image">
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-danger btn_next">Tiếp tục</a>
                </div>
            </div>
        </div>
    </div>
    <!-- END PRICING SECTION -->
    <script>
        $(document).ready(function () {
            var date = new Date().toISOString().slice(0, 10);
            $("input[name*='date']").val(date);
            var values_ = $("input[name*='show_id']").val();
            if (values_ != "") {

            } else {
                $("a.btn_next").attr('disabled', true);
                $("a.btn_next").addClass('disable_btn_next');
            }

        })
        $("a.input_date").click(function () {
            $date = $(this).attr('id');
            var currentURL = document.URL;
            $arr = currentURL.split('/');
            $movie_id = $arr[$arr.length - 1];
            $.ajax({
                method: 'GET',
                url: '/movie/show-time/' + $movie_id + '/' + $date,
                dataType: 'html',
                success: function (data) {
                    console.log(data)
                    $(".tab-content").html(data);
                }
            })
            $("input[name*='date']").val($date);
            $("a.btn_next").attr('disabled', true);
            $("a.btn_next").addClass('disable_btn_next');
        })
        $("a.btn_showtime").click(function () {
            $show_time_id = $(this).attr('id');
            $(this).addClass('showtime_active');
            $(this).removeClass('time__link');
            $("input[name*='show_id']").val($show_time_id);
            $("a.btn_next").removeClass('disable_btn_next');
            $("a.btn_next").attr('disabled', false);
        });
        $(document).on('click', 'a.btn_next', function () {
            $show_time_id = $("input[name*='show_id']").val();
            $date = $("input[name*='date']").val();
            var currentURL = document.URL;
            $arr = currentURL.split('/');
            $movie_id = $arr[$arr.length - 1];
            console.log($movie_id,$date,$show_time_id)
            location.href=('/movie/choose-ticket/'+$movie_id+'/'+$date+'/'+$show_time_id);
        });

    </script>
@endsection
