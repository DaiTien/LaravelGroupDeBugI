@extends('Template.admin_layout')

@section('titleForm')
    <div class="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<a
                    href="/">{{__('Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('UserManager')}}</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="card mb-4">
        <div class="m-2">
            <h3 class="text-center">{{__('TitleListUser')}}</h3>
            <a href="{{route('create-user')}}" class="btn btn-primary ml-7">{{__("textCreateBT")}}</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered yajra-datatable" id="myTable" width="100%" cellspacing="0">
                    <tr class="text-center">
                        <th>STT</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Date of birth</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>{{ __("Action") }}</th>
                    </tr>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center">{{ $i++ }}</td>
                            <td>{{ $item->firstname }}</td>
                            <td>{{ $item->lastname }}</td>
                            <td>{{ $item->dob }}</td>
                            <td>{{ $item->phone }}</td>
                            <td> {{ $item->email }}</td>
                            <td>
                                <div class="text-center">
                                    <a href="/user/update/{{$item->id}}" class="btn btn-success"> <i
                                            class="fas fa-edit"></i></a>
                                    <a onclick="Delete({{$item->id}})" class="btn btn-danger"><i
                                            class="fas fa-trash-alt"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $data->links() }}
            </div>
        </div>
    </div>
    <script>
        {{--function checkvalidation() {--}}
        {{--    let firstname = $("input[name*='firstname']").val();--}}
        {{--    let lastname = $("input[name*='lastname']").val();--}}
        {{--    let dob = $("input[name*='dob']").val();--}}
        {{--    let phone = $("input[name*='phone']").val();--}}
        {{--    let email = $("input[name*='email']").val();--}}
        {{--    // let name = $("input[name*='name']").val();--}}
        {{--    let password = $("input[name*='password']").val();--}}
        {{--    // console.log(firstname);--}}
        {{--    // console.log(lastname);--}}
        {{--    // console.log(dob);--}}
        {{--    // console.log(phone);--}}
        {{--    // console.log(email);--}}
        {{--    $.ajax({--}}
        {{--        data: {--}}
        {{--            firstname: firstname,--}}
        {{--            lastname: lastname,--}}
        {{--            dob: dob,--}}
        {{--            phone: phone,--}}
        {{--            email: email,--}}
        {{--            // name: name,--}}
        {{--            password: password,--}}
        {{--            "_token": "{{csrf_token()}}"--}}
        {{--        },--}}
        {{--        url: "/user/save-create",--}}
        {{--        method: "POST",--}}
        {{--        dataType: "json",--}}
        {{--        success: function(data) {--}}
        {{--            console.log(data);--}}
        {{--            if (data.errors == true) {--}}
        {{--                $("#txtErrorFirstName").html('').append(data.firstname);--}}
        {{--                $("#txtErrorLastName").html('').append(data.lastname);--}}
        {{--                $("#txtErrorDob").html('').append(data.dob);--}}
        {{--                $("#txtErrorPhone").html('').append(data.phone);--}}
        {{--                $("#txtErrorEmail").html('').append(data.email);--}}
        {{--                // $("#txtErrorName").html('').append(data.name);--}}
        {{--                $("#txtErrorPassword").html('').append(data.password);--}}
        {{--            } else {--}}
        {{--                $("#txtErrorFirstName").html('');--}}
        {{--                $("#txtErrorLastName").html('');--}}
        {{--                $("#txtErrorDob").html('');--}}
        {{--                $("#txtErrorPhone").html('');--}}
        {{--                $("#txtErrorEmail").html('');--}}
        {{--                // $("#txtErrorName").html('');--}}
        {{--                $("#txtErrorPassword").html('');--}}
        {{--                Swal.fire({--}}
        {{--                    position: 'center',--}}
        {{--                    icon: 'success',--}}
        {{--                    title: '{{__("TextCreateSuccess")}}',--}}
        {{--                    showConfirmButton: false,--}}
        {{--                    timer: 1500--}}
        {{--                })--}}
        {{--                $('#myForm').trigger("reset");--}}
        {{--            }--}}
        {{--        }--}}
        {{--    })--}}
        {{--}--}}
        {{--//reload page--}}
        {{--$('#UserModal').on('hidden.bs.modal', function() {--}}
        {{--    $(this).find('form').trigger('reset');--}}
        {{--    location.reload();--}}
        {{--});--}}

        function Delete(id) {
            Swal.fire({
                title: '{{__("ConfirmDeleteTitle")}}',
                text: '{{__("ConfirmDeleteText")}}',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '{{__("confirmButtonText")}}',
                confirmButtonColor: '#007bff',
                cancelButtonText: '{{__("cancelButtonText")}}',
                cancelButtonColor: '#6c757d',
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        method: 'GET',
                        type: 'DELETE',
                        url: '/user/delete/' + id,
                        success: function (data) {
                            if (data.success == true) {
                                Swal.fire({
                                    position: 'center',
                                    title: '{{__("DeleteSuccessTitle")}}',
                                    icon: "success",
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(function () {
                                    location = "{{route('list-user')}}";
                                })
                            } else {
                                Swal.fire({
                                    position: 'center',
                                    title: '{{__("DeleteErrorTitle")}}',
                                    text: '{{__("DeleteErrorText")}}',
                                    icon: "warning",
                                    showConfirmButton: false,
                                    timer: 2000
                                })
                            }
                        }
                    })
                }
            })
        }
    </script>
@endsection
