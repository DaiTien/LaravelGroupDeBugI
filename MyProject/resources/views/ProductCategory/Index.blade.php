@extends('Template.admin_layout')
@section('title')
    <h3 class="textTitle">DANH SÁCH NHÓM SẢN PHẨM</h3>
@endsection
@section('content')
    <div class="card mb-4">
        <div class="mt-2">
            <a href="/create-product-category" class="btn btn-primary">Thêm mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr class="text-center">
                        <th>STT</th>
                        <th>Tiêu đề</th>
                        <th>Mô tả</th>
                        <th>Slug</th>
                        <th>Trạng thái</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center">{{ $i++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->slug }}</td>
                            <td class="text-center">
                                @if ($item->active == 1)
                                    <a href="" onclick="alert('davdjhsa')"><i class="fas fa-eye"></i></a>
                                @else
                                    <a href="" onclick="alert('davdjhsa')"><i class="fas fa-eye-slash"></i></a>
                                @endif
                            </td>
                            <td>
                                <div class="text-center">
                                    <a href="/update-product-category/{{ $item->id }}" class="btn btn-success">Sửa</a>
                                    <a href="/delete-product-category/{{ $item->id }}" class="btn btn-danger">Xóa</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
