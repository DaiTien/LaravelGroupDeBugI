@extends('admin.Template.admin_layout')
@section('titleForm')
    <div class="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<a href="/admin">{{__('Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('TitleLinkPriceTicket')}}</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="card mb-4">
        <div class="m-2">
            <h3 class="text-center">{{__('TitleListPriceTicket')}}</h3>
            <a hidden href="{{route('price_ticket.create')}}" class="btn btn-primary m-7"><i class="fas fa-plus"></i></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr class="text-center">
                        <th>STT</th>
                        <th>Loại vé</th>
                        <th>Giá vé</th>
                        <th>Hành động</th>
                    </tr>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td class="__alignItemtable">{{ $i++ }}</td>
                            <td class="__alignItemtable">{{ $item->name }}</td>
                            <td class="__alignItemtable">{{number_format($item->price,0,',',',') }} VND</td>
                            <td class="__alignItemtable w-150px">
                                <div class="text-center d-flex">
                                    <a  href="{{route('price_ticket.edit', ['id' => $item->id])}}" class="btn btn-success"> <i class="fas fa-edit"></i></a>
                                    <a onclick="Delete({{$item->id}})" class="btn btn-danger ml-2"><i class="fas fa-trash-alt"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
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
                        url: '/admin/price-ticket/delete/' + id,
                        success: function () {
                            Swal.fire({
                                position: 'center',
                                title: '{{__("DeleteSuccessTitle")}}',
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function () {
                                location = "{{route('price_ticket.index')}}";
                            })
                        }
                    })
                }
            })
        }
    </script>
@endsection
