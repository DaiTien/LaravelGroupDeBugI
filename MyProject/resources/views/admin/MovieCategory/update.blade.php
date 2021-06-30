@extends('admin.Template.admin_layout')
@section('titleForm')
    <div class="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<a
                        href="/">{{__('Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('moviecategory.index')}}">Movie
                    category</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('CreateProduct')}}</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="m-auto">
        <div class="col-sm-8 m-auto">
            <h3 class="text-center text-uppercase">creat movie category</h3>
            <form action="{{route('moviecategory.update')}}" method="POST" style="width:95%"enctype="multipart/form-data" id="myForm">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="text" value="{{$data->id}}" name="id" hidden>
                <div class="form-group row">
                    <label class="col-sm-3">Name</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="name" name="name" class="form-control" id="txtName" value="{{$data->name}}">
                        <span class="text-danger font-weight-bold" id="txtErrorName"></span>
                    </div>
                </div>
                <div class="form-group text-center">
                    <a href="javascript:void(0)" onclick="checkvalidation()" class="btn btn-primary">{{__("textUpdateBT")}}</a>
                    <a href="{{route('moviecategory.index')}}" class="btn btn-secondary ml-2">{{__("textCancelBT")}}</a>
                </div>
            </form>
        </div>
    </div>
    <script>
        function checkvalidation() {
            var id = $("input[name='id']").val();
            var name = $("#txtName").val();
            $.ajax({
                data: {
                    id: id,
                    name: name,
                    "_token": "{{csrf_token()}}"
                },
                url: '{{route('moviecategory.update')}}',
                method: "POST",
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    if (data.errors == true) {
                        $("#txtErrorName").html('').append(data.name);
                    } else {
                        $("#txtErrorName").html('');
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: '{{__("TextUpdateSuccess")}}',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function () {
                            $('#myForm').trigger("reset");
                            window.location.href = '{{route('moviecategory.index')}}'
                        })
                    }
                }
            })
        }

        // $('#CurrencyInput').on('change', function() {
        //     const value = this.value.replace(/,/g, '');
        //     if (value != "") {
        //         this.value = parseFloat(value).toLocaleString('en-US', {
        //             style: 'decimal',
        //             maximumFractionDigits: 2,
        //             minimumFractionDigits: 0
        //         });
        //     }
        // });
        //hidden error message
        // $(document).ready(function() {
        //     setTimeout(function() {
        //         $("span.text-danger").css("display", "none");
        //     }, 3000);
        // });
        // function fncSlug(str) {
        //     str = str.replace(/^\s+|\s+$/g, ''); // trim
        //     //str = str.toLowerCase();
        //     // remove accents, swap ñ for n, etc
        //     var from = "ñç·/_,:;áàảãạăắằẳẵặâấầẩẫậóòỏõọôồốổỗộơớờởỡợéèẻẽẹêếềểễệíìỉĩịúùủũụưứừửữựýỳỷỹỵđÁÀẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬÓÒỎÕỌÔỐỒỔỖỘƠỞỠỜỚỢÉÈẺẼẸÊỂỄỀẾỆÍÌỈĨỊÚÙỦŨỤƯỨỪỬỮỰÝỲỶỸỴĐ";
        //     var to = "nc------aaaaaaaaaaaaaaaaaoooooooooooooooooeeeeeeeeeeeiiiiiuuuuuuuuuuuyyyyydAAAAAAAAAAAAAAAAAOOOOOOOOOOOOOOOOOEEEEEEEEEEEIIIIIUUUUUUUUUUUYYYYYD";
        //     for (var i = 0, l = from.length; i < l; i++) {
        //         str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        //     }
        //     str = str.replace(/[^a-zA-Z_0-9/. -]/g, '') // remove invalid chars
        //         .replace(/\s+/g, '-') // collapse whitespace and replace by -
        //         .replace(/-+/g, '-'); // collapse dashes
        //     str = str.toLowerCase();
        //     document.getElementById('txtSlug').value = str;
        // }
        //
        // function clickavatar1() {
        //     $("#upload input[type=file]").click();
        // }
        //
        // function showPreview1(input) {
        //     if (input.files && input.files[0]) {
        //         var filerdr = new FileReader();
        //         filerdr.onload = function(e) {
        //             $('#imgPreview1').attr('src', e.target.result);
        //         }
        //         filerdr.readAsDataURL(input.files[0]);
        //     }
        // }
        //
        // function valid_numbers(e) {
        //     var key = e.which || e.KeyCode;
        //     if (key >= 48 && key <= 57)
        //         return true;
        //     else return false;
        // }
    </script>
@endsection