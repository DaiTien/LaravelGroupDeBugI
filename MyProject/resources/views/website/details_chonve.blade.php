@extends('website.layouts.master')
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
                            <div class="pricing-box hightlight">
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
                                            <tr>
                                                <th scope="row">Người lớn</th>
                                                <td><input class="text-center" type="number" min="1" /></td>
                                                <td>1651</td>
                                                <td class="text-right">1651</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Trẻ em</th>
                                                <td><input class="text-center" type="number" min="1" /></td>
                                                <td>1651</td>
                                                <td class="text-right">1651</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Sinh viên</th>
                                                <td><input class="text-center" type="number" min="1" /></td>
                                                <td>1651</td>
                                                <td class="text-right">1651</td>
                                            </tr>
                                            <tr class="text-left">
                                                <th scope="row" colspan="3">Tổng</th>
                                                <td class="text-right">0</td>
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
                                            <a href="#" class="btn btn-hover">
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
    <!-- END PRICING SECTION -->
@endsection
