@extends('admin.Template.admin_layout')
@section('titleForm')
    <div class="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<a href="/admin">{{__('Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('price_ticket.index')}}">{{__('TitleLinkPriceTicket')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('TitleCreatePriceTicket')}}</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="m-auto card pl-3">
        <h3 class="text-center text-uppercase mt-3">{{__('TitleCreatePriceTicket')}}</h3>
        <form action="{{route('price_ticket.store')}}" method="POST" style="width:95%" enctype="multipart/form-data" id="myForm">
            @csrf
            <div class=row>
                <div class="col-8 mx-auto">
                    <div class="form-group row">
                        <label class="col-sm-3">Loại vé</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Loại vé" name="name" class="form-control" value="{{old('name')}}">
                            @error('name')
                            <span class="text-danger font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Giá vé</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Giá vé" name="price" class="form-control" value="{{old('price')}}" id="CurrencyInput" onkeypress="return valid_numbers(event)"  />
                            @error('price')
                            <span class="text-danger font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-primary" value="{{__('textCreateBT')}}"/>
                <a href="{{route('price_ticket.index')}}" class="btn btn-secondary ml-2">{{__("textCancelBT")}}</a>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('span.text-danger').hide();
            }, 1500)
        });
        $('#CurrencyInput').on('keyup', function () {
            const value = this.value.replace(/,/g, '');
            if (value != "") {
                this.value = parseFloat(value).toLocaleString('en-US', {
                    style: 'decimal',
                    maximumFractionDigits: 2,
                    minimumFractionDigits: 0
                });
            }
        });

        function clickavatar1() {
            $("#upload input[type=file]").click();
        }

        function showPreview1(input) {
            if (input.files && input.files[0]) {
                var filerdr = new FileReader();
                filerdr.onload = function (e) {
                    $('#imgPreview1').attr('src', e.target.result);
                }
                filerdr.readAsDataURL(input.files[0]);
            }
        }

        function valid_numbers(e) {
            var key = e.which || e.KeyCode;
            if (key >= 48 && key <= 57)
                return true;
            else return false;
        }
    </script>
@endsection
