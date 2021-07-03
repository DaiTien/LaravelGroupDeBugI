@extends('admin.Template.admin_layout')
@section('titleForm')
    <div class="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<a
                    href="/">{{__('Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a
                    href="{{route('list-product')}}">{{__('User')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('UpdateUser')}}</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="card mb-4">
        <div class="m-auto">
            <h3 class="text-center text-uppercase mt-2">{{__('TitleFormUpdateUser')}}</h3>
            <form action="{{route('save-update-user')}}" method="POST" style="width:95%" enctype="multipart/form-data">
                @csrf
                <div class=row>
                    <div class="col-8 m-auto" hidden>
                        <div class="form-group row">
                            <label class="col-sm-2">id</label>
                            <div class="col-sm-9">
                                <input type="text" name="id" class="form-control" value="{{$user->id}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-8 m-auto">
                        <div class="form-group row">
                            <label class="col-sm-2">First Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="firstname" class="form-control" value="{{$user->firstname}}">
                                <span class="text-danger font-weight-bold " id="txtErrorFirstName"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 m-auto">
                        <div class="form-group row">
                            <label class="col-sm-2">Last Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="lastname" class="form-control" value="{{$user->lastname}}">
                                <span class="text-danger font-weight-bold" id="txtErrorLastName"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 m-auto">
                        <div class="form-group row">
                            <label class="col-sm-2">Date of birth</label>
                            <div class="col-sm-9">
                                <input type="date" name="dob" class="form-control" value="{{$user->dob}}">
                                <span class="text-danger font-weight-bold" id="txtErrorDob"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 m-auto">
                        <div class="form-group row">
                            <label class="col-sm-2">Number phone</label>
                            <div class="col-sm-9">
                                <input type="text" name="phone" class="form-control" value="{{$user->phone}}">
                                <span class="text-danger font-weight-bold" id="txtErrorPhone"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 m-auto">
                        <div class="form-group row">
                            <label class="col-sm-2">Email</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" value="{{$user->email}}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center">
                    <a href="javascript:void(0)" onclick="checkvalidation()"class="btn btn-primary">{{__("textUpdateBT")}}</a>
                    <a href="{{route('usermanager.index')}}" class="btn btn-warning ml-2">{{__("textCancelBT")}}</a>
                </div>
            </form>
        </div>
    </div>
    <script>
        function checkvalidation() {
            let id = $("input[name*='id']").val();
            let firstname = $("input[name*='firstname']").val();
            let lastname = $("input[name*='lastname']").val();
            let dob = $("input[name*='dob']").val();
            let phone = $("input[name*='phone']").val();
            console.log(firstname);
            console.log(lastname);
            console.log(dob);
            console.log(phone);
            $.ajax({
                data: {
                    id: id,
                    firstname: firstname,
                    lastname: lastname,
                    dob: dob,
                    phone: phone,
                    // email: email,
                    // name: name,
                    // password: password,
                    "_token": "{{csrf_token()}}"
                },
                url: "{{route('save-update-user')}}",
                method: "POST",
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    if (data.errors == true) {
                        $("#txtErrorFirstName").html('').append(data.firstname);
                        $("#txtErrorLastName").html('').append(data.lastname);
                        $("#txtErrorDob").html('').append(data.dob);
                        $("#txtErrorPhone").html('').append(data.phone);
                        // $("#txtErrorEmail").html('').append(data.email);
                        // $("#txtErrorName").html('').append(data.name);
                        // $("#txtErrorPassword").html('').append(data.password);
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: '{{__("TextUpdateSuccess")}}',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function () {
                            location = "{{route('list-user')}}";
                        })
                    }
                }
            })
        }
    </script>
@endsection
