@extends('admin.Template.admin_layout')
@section('titleForm')
    <div class="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<a href="/">{{__('Home')}}</a> </li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="m-auto">
        <h3 class="text-center text-uppercase">Create post category</h3>
        <form action="{{route('save-post-category')}}" method="POST" style="width:95%" id="myForm">
            @csrf
            <div class=row>
                <div class="col-12">
                    <div class="form-group row">
                        <label class="col-sm-2">Name</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="name" name="name" class="form-control" onchange="fncSlug(this.value)" value="{{old('name')}}">
                            @error('name')
                            <span class="text-danger font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <label class="col-sm-2">Descriptio</label>
                        <div class="col-sm-9">
                            <textarea type="text" placeholder="Desciption" name="descripiton" class="form-control" rows="3">{{old('introduce')}}</textarea>
                            @error('descripiton')
                            <span class="text-danger font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row" hidden>
                        <label class="col-sm-2">Slug</label>
                        <div class="col-sm-9">
                            <input type="text" id="txtSlug" placeholder="slug" name="slug" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <label class="col-sm-2">Trạng thái</label>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="0" name="active" checked="checked">Ẩn
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="1" name="active">Hiện
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
            <!-- <a href="javascript:void(0)" onclick="checkvalidation()" class="btn btn-primary">{{__("textCreateBT")}}</a> -->
                <input type="submit" class="btn btn-primary" value="{{__('textCreateBT')}}">
                <a href="{{route('list-post-category')}}" class="btn btn-warning ml-2">{{__("textCancelBT")}}</a>
            </div>
        </form>
    </div>
    <script>
        //hidden error message
        $(document).ready(function() {
            $('#myForm').validate({
               rule
            });
        });
        function fncSlug(str) {
            str = str.replace(/^\s+|\s+$/g, ''); // trim
            //str = str.toLowerCase();
            // remove accents, swap ñ for n, etc
            var from = "ñç·/_,:;áàảãạăắằẳẵặâấầẩẫậóòỏõọôồốổỗộơớờởỡợéèẻẽẹêếềểễệíìỉĩịúùủũụưứừửữựýỳỷỹỵđÁÀẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬÓÒỎÕỌÔỐỒỔỖỘƠỞỠỜỚỢÉÈẺẼẸÊỂỄỀẾỆÍÌỈĨỊÚÙỦŨỤƯỨỪỬỮỰÝỲỶỸỴĐ";
            var to = "nc------aaaaaaaaaaaaaaaaaoooooooooooooooooeeeeeeeeeeeiiiiiuuuuuuuuuuuyyyyydAAAAAAAAAAAAAAAAAOOOOOOOOOOOOOOOOOEEEEEEEEEEEIIIIIUUUUUUUUUUUYYYYYD";
            for (var i = 0, l = from.length; i < l; i++) {
                str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }
            str = str.replace(/[^a-zA-Z_0-9/. -]/g, '') // remove invalid chars
                .replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/-+/g, '-'); // collapse dashes
            str = str.toLowerCase();
            document.getElementById('txtSlug').value = str;
        }
    </script>
@endsection
