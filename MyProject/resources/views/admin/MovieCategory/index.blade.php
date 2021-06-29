@extends('admin.Template.admin_layout')
@section('titleForm')
    <div class="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<a
                        href="/">{{__('Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Movie category</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="card mb-4">
        <div class="m-2">
            <h3 class="text-center">Danh sách loại phim</h3>
            <a href="{{route('moviecategory.create')}}" class="btn btn-primary m-7">{{__("textCreateBT")}}</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr class="text-center">
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td class="__alignItemtable">{{ $i++ }}</td>
                            <td class="__alignItemtable">{{ $item->name }}</td>
                            <td class="__alignItemtable">
                                <div class="text-center">
                                    <a href="{{route('moviecategory.edit', ['id' => $item->id])}}" class="btn btn-success"> <i
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
                        url: '/admin/movie-category/delete/'+id,
                        success: function () {
                            Swal.fire({
                                position: 'center',
                                title: '{{__("DeleteSuccessTitle")}}',
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function () {
                                location = "{{route('moviecategory.index')}}";
                            })
                        }
                    })
                }
            })
        }
    </script>
@endsection
