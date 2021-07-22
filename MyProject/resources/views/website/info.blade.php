@extends('website.layouts.master')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
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
                                @if (session()->has('message'))
                                    <div class="alert alert-success alert-danger__note ">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                <div class="pricing-box-action">
                                    <form action="{{route('update_info')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <input type="text" name="id" value="{{$user->id}}" hidden>
                                            <div class="col-dt-6 col-tl-12 col-mb-12">
                                                <div class="form-group mb-5 d-flex">
                                                    <label for="name" class="" style="min-width: 200px">Tên :</label>
                                                    <div class="w-100">
                                                        <input name="name" value="{{ old('name', $user->name)}}"
                                                               type="text"
                                                               class="form-control" id="name"
                                                               placeholder="Tên">
                                                        @error('name')
                                                        <label
                                                            class="alert alert-danger alert-danger__note ">{{ $message }}</label>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group mb-5 d-flex">
                                                    <label for="email" class="" style="min-width: 200px">Email :</label>
                                                    <input disabled type="text" class="form-control" id="email"
                                                           placeholder="Email" value="{{$user->email}}">
                                                </div>
                                            </div>
                                            <div class="col-dt-6 col-tl-12 col-mb-12">
                                                <div class="form-group mb-5 d-flex">
                                                    <label for="address" class="" style="min-width: 200px">Địa chỉ
                                                        :</label>
                                                    <div class="w-100">
                                                        <input name="address" value="{{old('address',$user->address)}}"
                                                               type="text" class="form-control" id="address"
                                                               placeholder="Địa chỉ">
                                                        @error('address')
                                                        <span
                                                            class="alert alert-danger alert-danger__note ">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group mb-5 d-flex">
                                                    <label for="phone" class="" style="min-width: 200px">Số điện
                                                        thoại :</label>
                                                    <div class="w-100">
                                                        <input name="phone" value="{{old('phone',$user->phone)}}"
                                                               type="text" class="form-control" id="phone"
                                                               placeholder="Số điện thoại">
                                                        @error('phone')
                                                        <span
                                                            class="alert alert-danger alert-danger__note ">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class=" text-center">
                                            <input type="submit" class="btn btn-primary" value="Cập nhật"/>
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
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('div.alert-danger__note').hide();
            }, 3000);
        });
    </script>
@endsection
