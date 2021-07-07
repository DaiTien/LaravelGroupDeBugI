@extends('website.layouts.master')
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
                                    <div class="pricing-price">
                                        Free
                                    </div>
                                </div>
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                            role="tab" aria-controls="pills-home" aria-selected="true">7/7 <br> Thứ 2</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                            role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                                    </li>

                                </ul>
                                <div class="pricing-box-content">

                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                            aria-labelledby="pills-home-tab">
                                            <p>Chưa có lịch chiếu cho ngày này. Hãy quay lại sau. Xin cám ơn.</p>
                                            <div class="xuatchieu">
                                                <div class="title__room">
                                                    <h4>Phòng 1</h4>
                                                </div>
                                                <ul class="time__list">
                                                    <li class="time__item">
                                                        <a href="#" class="time__link">13:45 - 15h:30</a>
                                                    </li>
                                                    <li class="time__item">
                                                        <a href="#" class="time__link">13:45 - 15h:30</a>
                                                    </li>
                                                    {{-- <li class="time__item">
                                                        <a href="#" class="time__link">13:45 - 15h:30</a>
                                                    </li>
                                                    <li class="time__item">
                                                        <a href="#" class="time__link">13:45 - 15h:30</a>
                                                    </li>
                                                    <li class="time__item">
                                                        <a href="#" class="time__link">13:45 - 15h:30</a>
                                                    </li>
                                                    <li class="time__item">
                                                        <a href="#" class="time__link">13:45 - 15h:30</a>
                                                    </li> --}}
                                                </ul>
                                            </div>
                                            <div class="xuatchieu">
                                                <div class="title__room">
                                                    <h4>Phòng 2</h4>
                                                </div>
                                                <ul class="time__list">
                                                    <li class="time__item">
                                                        <a href="#" class="time__link">13:45 - 15h:30</a>
                                                    </li>
                                                    <li class="time__item">
                                                        <a href="#" class="time__link">13:45 - 15h:30</a>
                                                    </li>
                                                    {{-- <li class="time__item">
                                                        <a href="#" class="time__link">13:45 - 15h:30</a>
                                                    </li>
                                                    <li class="time__item">
                                                        <a href="#" class="time__link">13:45 - 15h:30</a>
                                                    </li>
                                                    <li class="time__item">
                                                        <a href="#" class="time__link">13:45 - 15h:30</a>
                                                    </li>
                                                    <li class="time__item">
                                                        <a href="#" class="time__link">13:45 - 15h:30</a>
                                                    </li> --}}
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                            aria-labelledby="pills-profile-tab">...</div>
                                    </div>
                                </div>
                                <div class="pricing-box-action">

                                </div>

                            </div>
                        </div>
                        <div class="col-dt-3 col-tl-12 col-mb-12">
                            <div class="pricing-box pricing-box__image hightlight">
                                <a href="#" class="movie-item">
                                    <img src="/website/images/series/star-trek.jpg" alt="">
                                    <div class="movie-item-content">
                                        <div class="movie-item-title">
                                            Star Trek
                                        </div>
                                        <div class="movie-infos">
                                            <div class="movie-info">
                                                <i class="bx bxs-star"></i>
                                                <span>9.5</span>
                                            </div>
                                            <div class="movie-info">
                                                <i class="bx bxs-time"></i>
                                                <span>120 mins</span>
                                            </div>
                                            <div class="movie-info">
                                                <span>HD</span>
                                            </div>
                                            <div class="movie-info">
                                                <span>16+</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="pricing-box-content pricing-box-content__image">
                                    <p>ădjalwdkawkjawlkdj</p>
                                </div>
                            </div>

                            {{-- <div class="pricing-box-action">

                            </div> --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PRICING SECTION -->
@endsection
