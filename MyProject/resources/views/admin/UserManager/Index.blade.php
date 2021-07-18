@extends('admin.Template.admin_layout')
@section('titleForm')
    <div class="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<a
                    href="/admin">{{__('Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('TitleListUser')}}</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="card mb-4">
        <div class="m-2">
            <h3 class="text-center">{{__('TitleListUser')}}</h3>
            <a href="{{route('usermanager.create')}}" class="btn btn-primary m-7"><i class="fas fa-plus"></i></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr class="text-center">
                        <th>STT</th>
                        <th>Họ tên</th>
                        <th>Quyền hạn</th>
                        <th>Điện thoại</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td class="__alignItemtable">{{ $i++ }}</td>
                            <td class="__alignItemtable">{{ $item->name }}</td>
                            <td class="__alignItemtable">{{ $item->user_group->name }}</td>
                            <td class="__alignItemtable">{{ $item->phone }}</td>
                            <td class="__alignItemtable">{{ $item->email }}</td>
                            <td class="__alignItemtable">{{ $item->address }}</td>
                            <td class="__alignItemtable">
                                <div class="text-center d-flex">
                                    <a href="{{route('usermanager.edit', ['id' => $item->id])}}"
                                       class="btn btn-success"
                                       style="pointer-events: {{$item->group_id==1?'default':'none'}}"> <i
                                            class="fas fa-edit"></i></a>
                                    <a onclick="Delete({{$item->id}})" class="btn btn-danger ml-2"><i
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
                        type: 'DELETE',
                        url: '/admin/usermanager/delete/' + id,
                        success: function () {
                            Swal.fire({
                                position: 'center',
                                title: '{{__("DeleteSuccessTitle")}}',
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function () {
                                location = "{{route('usermanager.index')}}";
                            })
                        }
                    })
                }
            })
        }
    </script>
@endsection
