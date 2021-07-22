@extends('website.layouts.master')
@section('title', 'Info')
@section('content')
    <!-- PRICING SECTION -->
    <div class="section">
        <div class="container">
            <div class="pricing">
                <div class="pricing-header">
                    <span class="main-color"></span>Thông tin tài khoản
                </div>
                <div class="pricing-list">
                    <div class="row">
                        <div class="col-dt-12 col-tl-12 col-mb-12">
                            <div class="pricing-box hightlight">
                                <div class="pricing-box-content text-left content-details__movie">
                                    <div class="title-details__movie title-details__info">
                                        <img src="/website/images/cartoons/coco.jpg" alt="" class="info-avatar">
                                        <h4 class="name-info">Lưu Văn Quyết</h4>
                                    </div>
                                </div>
                                <div class="pricing-box-action">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-dt-6 col-tl-12 col-mb-12">
                                                <div class="form-group mb-5 d-flex">
                                                    <label for="name" class="" style="min-width: 200px">Tên :</label>
                                                    <input disabled type="text" class="form-control" id="name"
                                                        placeholder="Tên">
                                                </div>
                                                <div class="form-group mb-5 d-flex">
                                                    <label for="email" class="" style="min-width: 200px">Email :</label>
                                                    <input disabled type="text" class="form-control" id="email"
                                                        placeholder="Email">
                                                </div>
                                                <div class="form-group mb-5 d-flex">
                                                    <label for="address" class="" style="min-width: 200px">Địa chỉ :</label>
                                                    <input disabled type="text" class="form-control" id="address"
                                                        placeholder="Địa chỉ">
                                                </div>
                                            </div>
                                            <div class="col-dt-6 col-tl-12 col-mb-12">
                                                <div class="form-group mb-5 d-flex">
                                                    <label for="fullName" class="" style="min-width: 200px">Họ và
                                                        Tên :</label>
                                                    <input disabled type="text" class="form-control" id="fullName"
                                                        placeholder="Họ và Tên">
                                                </div>
                                                <div class="form-group mb-5 d-flex">
                                                    <label for="phone" class="" style="min-width: 200px">Số điện
                                                        thoại :</label>
                                                    <input disabled type="text" class="form-control" id="phone"
                                                        placeholder="Số điện thoại">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>

                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END PRICING SECTION -->
@endsection
