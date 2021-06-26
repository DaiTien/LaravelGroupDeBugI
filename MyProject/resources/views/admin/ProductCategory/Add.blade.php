@extends('admin.Template.admin_layout')
@section('titleForm')
    <div class="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<a
                    href="/">{{__('Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a
                    href="/list-product-category">{{__('PrdCate')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('CreatePrdCate')}}</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="card mb-4">
        <div class="col-md-8 m-auto">
            <h3 class="text-center text-uppercase mt-2">{{__('TitleFormCreatePrdCate')}}</h3>
            <form action="/save-product-category" method="POST" style="width:95%" id="myForm">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-3">Name</label>
                    <div class="col-sm-9">
                        <input type="text" id="txtName" placeholder="name" name="name" class="form-control"
                               onchange="fncSlug(this.value)">
                        <span class="text-danger font-weight-bold" id="txtErrorName"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3">Danh mục cha</label>
                    <div class="col-sm-9">
                        <select name="parent_id" id="parent_id" class="form-control">
                            <option value="0">Là danh mục chính</option>
                            @foreach($parent as $parent)
                                <option value="{{$parent->id}}">{{$parent->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3">Description</label>
                    <div class="col-sm-9">
                        <input type="text" id="txtDescription" placeholder="description" name="description"
                               class="form-control">
                        <span class="text-danger font-weight-bold" id="txtErrorDescription"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3">Tag</label>
                    <div class="col-sm-9">
                        <input type="text" id="txtTag" placeholder="tag" name="tag" class="form-control">
                    </div>
                </div>
                <div class="form-group row" hidden>
                    <label class="col-sm-3">Slug</label>
                    <div class="col-sm-9">
                        <input type="text" id="txtSlug" placeholder="slug" name="slug" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3">Trạng thái</label>
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
                <div class="form-group text-center">
                    <a href="javascript:void(0)" onclick="checkvalidation()"
                       class="btn btn-primary">{{__("textCreateBT")}}</a>
                    <a href="/list-product-category" class="btn btn-warning ml-2">{{__("textCancelBT")}}</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous"></script>
    <script>
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

        function checkvalidation() {
            // alert('dasdas');
            var name = $("#txtName").val();
            var desc = $("#txtDescription").val();
            var tag = $("#txtTag").val();
            var slug = $("#txtSlug").val();
            var parent_id = $("#parent_id").val();
            var radioValue = $("input[name='active']:checked").val();
            // console.log(radioValue);
            $.ajax({
                data: {
                    name: name,
                    description: desc,
                    tag: tag,
                    slug: slug,
                    parent_id: parent_id,
                    active: radioValue,
                    "_token": "{{csrf_token()}}"
                },
                url: "save-product-category",
                method: "POST",
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    if (data.errors == true) {
                        $("#txtErrorName").html('').append(data.name);
                        $("#txtErrorDescription").html('').append(data.description);
                    } else {
                        $("#txtErrorName").html('');
                        $("#txtErrorDescription").html('');
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: '{{__("TextCreateSuccess")}}',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('#myForm').trigger("reset");
                    }
                }
            })
        }
    </script>
@endsection
