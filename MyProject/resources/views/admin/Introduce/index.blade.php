@extends('admin.Template.admin_layout')
@section('titleForm')
    <div class="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<a href="/admin">{{__('Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('Introduce')}}</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="card mb-4 pl-3">
        <h3 class="text-center text-uppercase mt-3">{{__('Introduce')}}</h3>
        <form action="{{route('introduce.update')}}" method="POST" style="width:95%" enctype="multipart/form-data">
            @csrf
            <div class=row>
                <div class="col-8">
                    <div class="form-group row" hidden>
                        <label class="col-sm-3">ID</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="id" name="id" value="{{$introduce->id}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Tiêu đề</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="name" value="{{old('title', $introduce->title)}}" name="title" class="form-control">
                            @error('title')
                            <span class="text-danger font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group row">
                        <label class="col-sm-12">Hình ảnh</label>
                        <div class="col-sm-9">
                            <div id=upload>
                                <input type="file" placeholder="image" name="image" class="form-control hidden-xs-up" onchange="showPreview1(this)">
                                <button type="button" class="btn-change" onclick="clickavatar1()">
                                    <img id="imgPreview1" src="/{{ $introduce->image }}" alt="" style="max-width: 100%; height: auto">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=row>
                <div class="col-12">
                    <div class="form-group row">
                        <label class="col-sm-2">Tóm tắt</label>
                        <div class="col-sm-9">
                            <textarea type="text" placeholder="summary" name="summary" class="form-control" rows="3">{{old('summary',$introduce->summary)}}</textarea>
                            @error('summary')
                            <span class="text-danger font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <label class="col-sm-2">Nội dung</label>
                        <div class="col-sm-9">
                            <textarea type="text" placeholder="content" name="contents" id="summernote" class="form-control">{{old('content',$introduce->content)}}</textarea>
                            @error('contents')
                            <span class="text-danger font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-primary" value="{{__('textUpdateBT')}}">
            </div>
        </form>
    </div>
    <script>

        function clickavatar1() {
            $("#upload input[type=file]").click();
        }

        function showPreview1(input) {
            if (input.files && input.files[0]) {
                var filerdr = new FileReader();
                filerdr.onload = function (e) {
                    $('#imgPreview1').attr('src', e.target.result);
                }
                filerdr.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
