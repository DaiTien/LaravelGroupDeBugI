@extends('website.layouts.master')
@section('title', 'Details')
@section('content')
    <!-- PRICING SECTION -->
    <div class="section">
        <div class="container">
            <div class="pricing">
                {{-- <div class="pricing-header">
                    <span class="main-color"></span>Chọn ghế
                </div> --}}
                <div class="pricing-list">
                    <div class="row">
                        <div class="col-dt-9 col-tl-12 col-mb-12">
                            <div class="pricing-box hightlight">
                                <div class="pricing-box-header">
                                    <div class="pricing-name">
                                        Chọn ghế
                                    </div>
                                </div>
                                <div class="pricing-box-content">
                                    <div class="chair__content">
                                        <div class="chair__content-sidebar">
                                            <ul class="list__sreen">
                                                <li class="list__item">
                                                    <p class="list__color"></p>
                                                    <span class="list__title">Ghế đang chọn</span>
                                                </li>
                                                <li class="list__item">
                                                    <p class="list__color"></p>
                                                    <span class="list__title">Ghế đã bán</span>
                                                </li>
                                                <li class="list__item">
                                                    <p class="list__color"></p>
                                                    <span class="list__title">Có thế chọn</span>
                                                </li>
                                                <li class="list__item">
                                                    <p class="list__color"></p>
                                                    <span class="list__title">Không thể chọn </span>
                                                </li>

                                            </ul>
                                            <h5 class="screen">
                                                Màn hình
                                            </h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-left" colspan="5">Dãy ghế</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th class="text-left scope=" row"><a href="#"
                                                                class="chair__link disabled" tabindex="-1">A</a></th>
                                                        <td><a href="#" class="chair__link chair__link--active">1</a></td>
                                                        <td><a href="#" class="chair__link chair__link--active">1</a></td>
                                                        <td><a href="#" class="chair__link chair__link--active">1</a></td>
                                                        <td><a href="#" class="chair__link chair__link--active">1</a></td>
                                                        <td><a href="#" class="chair__link chair__link--active">1</a></td>
                                                        <td><a href="#" class="chair__link chair__link--active">1</a></td>
                                                        <td><a href="#" class="chair__link chair__link--active">1</a></td>
                                                        <td><a href="#" class="chair__link chair__link--active">1</a></td>
                                                        <td><a href="#" class="chair__link chair__link--active">1</a></td>
                                                        <td><a href="#" class="chair__link chair__link--active">1</a></td>

                                                    </tr>
                                                    <tr>
                                                        <th class="text-left" scope="row"><a href="#"
                                                                class="chair__link chair__link--active disabled">B</a></th>
                                                        <td><a href="#" class="chair__link chair__link--active">1</a></td>
                                                        <td><a href="#" class="chair__link chair__link--active">1</a></td>
                                                        <td><a href="#" class="chair__link chair__link--active">1</a></td>
                                                        <td><a href="#" class="chair__link chair__link--active">1</a></td>
                                                        <td><a href="#" class="chair__link chair__link--active">1</a></td>
                                                        <td><a href="#" class="chair__link chair__link--active">1</a></td>
                                                        <td><a href="#" class="chair__link chair__link--active">1</a></td>
                                                        <td><a href="#" class="chair__link chair__link--active">1</a></td>
                                                        <td><a href="#" class="chair__link chair__link--active">1</a></td>
                                                        <td><a href="#" class="chair__link chair__link--active">1</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-left" scope="row"><a href="#"
                                                                class="chair__link chair__link--active disabled">C</a></th>
                                                        <td><a href="#" class="chair__link chair__link--active">1</a></td>
                                                        <td><a href="#" class="chair__link chair__link--active">1</a></td>
                                                        <td><a href="#" class="chair__link chair__link--active">1</a></td>
                                                        <td><a href="#" class="chair__link chair__link--active">1</a></td>
                                                        <td><a href="#" class="chair__link chair__link--active">1</a></td>
                                                        <td><a href="#" class="chair__link chair__link--active">1</a></td>
                                                        <td><a href="#" class="chair__link chair__link--active">1</a></td>
                                                        <td><a href="#" class="chair__link chair__link--active">1</a></td>
                                                        <td><a href="#" class="chair__link chair__link--active">1</a></td>
                                                        <td><a href="#" class="chair__link chair__link--active">1</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-left" scope="row"><a href="#"
                                                                class="chair__link disabled">Hư</a></th>
                                                        <td><a href="#" class="chair__link chair__disable">1</a></td>
                                                        <td><a href="#" class="chair__link chair__disable">1</a></td>
                                                        <td><a href="#" class="chair__link chair__disable">1</a></td>
                                                        <td><a href="#" class="chair__link chair__disable">1</a></td>
                                                        <td><a href="#" class="chair__link chair__disable">1</a></td>
                                                        <td><a href="#" class="chair__link chair__disable">1</a></td>
                                                        <td><a href="#" class="chair__link chair__disable">1</a></td>
                                                        <td><a href="#" class="chair__link chair__disable">1</a></td>
                                                        <td><a href="#" class="chair__link chair__disable">1</a></td>
                                                        <td><a href="#" class="chair__link chair__disable">1</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
                                    <ul class="images__list">
                                        <li class="images__item">
                                            <p>Phòng : 1</p> <span></span>
                                        </li>
                                        <li class="images__item">
                                            <p>Suất chiếu : </p> <span>13:45 | Thứ 2, 07/07/2021</span>
                                        </li>
                                        <li class="images__item">
                                            <p>Tổng : </p> <span>0 VND</span>
                                        </li>
                                        <li class="images__item">
                                            <a href="#" class="btn btn-hover" data-toggle="modal"
                                                data-target="#exampleModal">
                                                <span class="text-white">Tiếp tục</span>
                                            </a>
                                        </li>
                                    </ul>
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
    {{-- MODAL --}}
    <!-- Button trigger modal -->
    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
    </button> --}}

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin vé</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal__info">
                        <label for="">Họ và tên : </label>
                        <input type="text" value="Lưu Văn Quyết" disabled>
                    </div>
                    <div class="modal__info">
                        <label for="">Email : </label>
                        <input type="text" value="" disabled>
                    </div>
                    <div class="modal__info">
                        <label for="">Số điện thoại : </label>
                        <input type="text" value="" disabled>
                    </div>
                    <div class="modal__info">
                        <label for="">Phòng : </label>
                        <input type="text" value="1" disabled>
                    </div>
                    <div class="modal__info">
                        <label for="">Suất chiếu : </label>
                        <input type="text" value="13:45 | Thứ 2, 07/07/2021" disabled>
                    </div>
                    <div class="modal__info">
                        <label for="">Ghế : </label>
                        <input type="text" value="A1,B2" disabled>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    {{-- END MODAL --}}
    <!-- END PRICING SECTION -->

@endsection
