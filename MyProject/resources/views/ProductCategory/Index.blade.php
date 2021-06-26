@extends('Template.admin_layout')
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" /> -->

@section('titleForm')
    <!-- DANH SÁCH NHÓM SẢN PHẨM -->
    <div class="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<a
                    href="/">{{__('Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('PrdCate')}}</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="card mb-4">
        <div class="m-2">
            <h3 class="text-center">{{__('TitleListPrdCate')}}</h3>
            <a href="create-product-category" class="btn btn-primary ml-7">{{__("textCreateBT")}}</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered yajra-datatable" id="myTable" width="100%" cellspacing="0">
                    <tr class="text-center">
                        <th>STT</th>
                        <th>{{ __("Name") }}</th>
                        <th>{{ __("Parent") }}</th>
                        <th>{{ __("Description") }}</th>
                        <!-- <th>Slug</th> -->
                        <th>{{ __("Status") }}</th>
                        <th>{{ __("Action") }}</th>
                    </tr>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center">{{ $i++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->parent_name }}</td>
                            <td>{{ $item->description }}</td>
                        <!-- <td>{{ $item->slug }}</td> -->
                            <td class="text-center">
                                <input class="toggle-class" type="checkbox" data-toggle="toggle" data-id="{{$item->id}}"
                                       data-on="Active" data-off="UnActice" data-onstyle="success" data-height="34"
                                       data-size="mini" {{$item->active ? 'checked' : ''}}/>
                            </td>
                            <td>
                                <div class="text-center">
                                    <a href="/update-product-category/{{ $item->id }}" class="btn btn-success"> <i
                                            class="fas fa-edit"></i></a>
                                    <a onclick="Delete({{$item->id}})" class="btn btn-danger"><i
                                            class="fas fa-trash-alt"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{$data->links()}}
            </div>
        </div>
    </div>
    <!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
    <script>
        //func delete
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
                        // type: 'DELETE',
                        url: '/delete-product-category/' + id,
                        dataType: 'json',
                        success: function (data) {
                            //console.log(data);
                            if (data.success == true) {
                                Swal.fire({
                                    position: 'center',
                                    title: '{{__("DeleteSuccessTitle")}}',
                                    icon: "success",
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(function () {
                                    location = "/list-product-category";
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

        // func update status
        $('.toggle-class').change(function () {
            Swal.fire({
                title: 'Bạn có muốn thay đổi trang thái?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '{{__("confirmButtonText")}}',
                confirmButtonColor: '#007bff',
                cancelButtonText: '{{__("cancelButtonText")}}',
                cancelButtonColor: '#6c757d',
            }).then((result) => {
                console.log(result)
                if (result.value) {
                    var status = $(this).prop('checked') == true ? 1 : 0;
                    var category_id = $(this).data('id');
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: "update-status-product-category",
                        data: {
                            'active': status,
                            'category_id': category_id
                        },
                    }).done(function (data) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: '{{__("UpdateStatusSuccess")}}',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    });
                }
            })
        });
    </script>
@endsection
