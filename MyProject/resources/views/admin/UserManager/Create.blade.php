@extends('admin.Template.admin_layout')
@section('titleForm')
    <div class="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<a
                    href="/">{{__('Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a
                    href="{{route('list-user')}}">{{__('User')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('CreateteUser')}}</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="card mb-4">
        <div class="m-auto">
            <h3 class="text-center text-uppercase mt-2">{{__('TitleFormCreateUser')}}</h3>
            <form action="{{route('save-user')}}" method="POST" style="width:95%" id="FormTaiKhoan">
                @csrf
                <div class=row>
                    <div class="col-8 m-auto">
                        <div class="form-group row">
                            <label class="col-sm-2">First Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="firstname" class="form-control">
                                <span class="text-danger font-weight-bold " id="txtErrorFirstName"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 m-auto">
                        <div class="form-group row">
                            <label class="col-sm-2">Last Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="lastname" class="form-control">
                                <span class="text-danger font-weight-bold" id="txtErrorLastName"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 m-auto">
                        <div class="form-group row">
                            <label class="col-sm-2">Date of birth</label>
                            <div class="col-sm-9">
                                <input type="date" name="dob" class="form-control">
                                <span class="text-danger font-weight-bold" id="txtErrorDob"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 m-auto">
                        <div class="form-group row">
                            <label class="col-sm-2">Number phone</label>
                            <div class="col-sm-9">
                                <input type="text" name="phone" class="form-control">
                                <span class="text-danger font-weight-bold" id="txtErrorPhone"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 m-auto">
                        <div class="form-group row">
                            <label class="col-sm-2">Email</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}">
                            </div>
                        </div>
                    </div>
                    <div class="col-8 m-auto">
                        <div class="form-group row">
                            <label class="col-sm-2">Mật khẩu</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" id="password" class="form-control">
                                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password text-primary"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center">
                    {{--                <a href="javascript:void(0)" onclick="checkvalidation()"--}}
                    {{--                   class="btn btn-primary">{{__("textUpdateBT")}}</a>--}}
                    <button type="submit" class="btn btn-primary">{{__("textCreateBT")}}</button>
                    <a href="{{route('list-user')}}" class="btn btn-warning ml-2">{{__("textCancelBT")}}</a>
                </div>
            </form>
        </div>
    </div>
    <script>
        // $(document).ready(function() {
        //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
        $("#FormTaiKhoan").validate({
            ignore: [],
            rules: {
                firstname: 'required',
                lastname: 'required',
                dob: 'required',
                email: {
                    required: true,
                    email: true,
                    // regex:'/^([\\w-\\.]+)@((\\[[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\\.)|(([\\w-]+\\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\\]?)$/'
                },
                password:{
                    required:true,
                    minlength:6,
                }
            },
            messages: {
                firstname: 'Họ không được để trống!',
                lastname: 'Tên không được để trống!',
                dob: 'Ngày sinh không được để trống!',
                email: {
                    required: 'Email không được để trống!',
                    email: 'Email không đúng định dạng',
                   // regex : 'Email not Valids'
                },
                password:{
                    required:'Mật khẩu không được để trống!',
                    minlength: 'Độ dài tối thiểu là 6 kí tự!'
                }
            },
            submitHandler: function (form) {
                loading_show();
                form.submit();
            }
        });
        $(".toggle-password").click(function () {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
        {{--function checkvalidation() {--}}
        {{--    let id = $("input[name*='id']").val();--}}
        {{--    let firstname = $("input[name*='firstname']").val();--}}
        {{--    let lastname = $("input[name*='lastname']").val();--}}
        {{--    let dob = $("input[name*='dob']").val();--}}
        {{--    let phone = $("input[name*='phone']").val();--}}
        {{--    console.log(firstname);--}}
        {{--    console.log(lastname);--}}
        {{--    console.log(dob);--}}
        {{--    console.log(phone);--}}
        {{--    $.ajax({--}}
        {{--        data: {--}}
        {{--            id: id,--}}
        {{--            firstname: firstname,--}}
        {{--            lastname: lastname,--}}
        {{--            dob: dob,--}}
        {{--            phone: phone,--}}
        {{--            // email: email,--}}
        {{--            // name: name,--}}
        {{--            // password: password,--}}
        {{--            "_token": "{{csrf_token()}}"--}}
        {{--        },--}}
        {{--        url: "{{route('save-update-user')}}",--}}
        {{--        method: "POST",--}}
        {{--        dataType: "json",--}}
        {{--        success: function(data) {--}}
        {{--            console.log(data);--}}
        {{--            if (data.errors == true) {--}}
        {{--                $("#txtErrorFirstName").html('').append(data.firstname);--}}
        {{--                $("#txtErrorLastName").html('').append(data.lastname);--}}
        {{--                $("#txtErrorDob").html('').append(data.dob);--}}
        {{--                $("#txtErrorPhone").html('').append(data.phone);--}}
        {{--                // $("#txtErrorEmail").html('').append(data.email);--}}
        {{--                // $("#txtErrorName").html('').append(data.name);--}}
        {{--                // $("#txtErrorPassword").html('').append(data.password);--}}
        {{--            } else {--}}
        {{--                Swal.fire({--}}
        {{--                    position: 'center',--}}
        {{--                    icon: 'success',--}}
        {{--                    title: '{{__("TextUpdateSuccess")}}',--}}
        {{--                    showConfirmButton: false,--}}
        {{--                    timer: 1500--}}
        {{--                }).then(function() {--}}
        {{--                    location = "{{route('list-user')}}";--}}
        {{--                })--}}
        {{--            }--}}
        {{--        }--}}
        {{--    })--}}
        {{--}--}}
    </script>
@endsection
