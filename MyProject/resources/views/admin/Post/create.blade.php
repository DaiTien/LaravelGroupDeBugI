@extends('admin.Template.admin_layout')
@section('titleForm')
<div class="Page breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<a href="/">{{__('Home')}}</a> </li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('list-product')}}">{{__('Post')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('CreatePost')}}</li>
    </ol>
</div>
@endsection
@section('content')
<div class="m-auto">
    <h3 class="text-center text-uppercase">{{__('TitleFormCreatePost')}}</h3>
    <form action="{{route('save-post')}}" method="POST" style="width:95%" enctype="multipart/form-data">
        @csrf
        <div class=row>
            <div class="col-8">
                <div class="form-group row">
                    <label class="col-sm-3">Title</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="name" name="name" class="form-control" onchange="fncSlug(this.value)" value="{{old('name')}}">
                        <span class="text-danger font-weight-bold" id="txtNameError"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3">Nhóm bài viết</label>
                    <div class="col-sm-9">
                        <select name="postcategory_id" class="form-control">
                            @foreach($cate as $cate)
                            <option value="{{$cate->id}}">{{$cate->name}}</option>
                            @endforeach
                        </select>
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
                                <img id="imgPreview1" src="/assets/images/up-img.png" alt="" style="max-width: 100%; height: auto">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=row>
            <div class="col-12">
                <div class="form-group row">
                    <label class="col-sm-2">Summary</label>
                    <div class="col-sm-9">
                        <textarea type="text" placeholder="summary" name="summary" class="form-control" rows="3">{{old('summary')}}</textarea>
                        <span class="text-danger font-weight-bold" id="txtSummaryError"></span>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group row">
                    <label class="col-sm-2">Description</label>
                    <div class="col-sm-9">
                        <textarea type="text" placeholder="description" name="description" class="form-control" rows="3">{{old('description')}}</textarea>

                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group row">
                    <label class="col-sm-2">Content</label>
                    <div class="col-sm-9">
                        <textarea type="text" placeholder="content" name="content" id="summernote" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group row">
                    <label class="col-sm-2">Tag</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="tag" name="tag" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group row">
                    <label class="col-sm-2">Trạng thái</label>
                    <div class="col-sm-9">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" value="0" name="active" checked="checked">Ẩn
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" value="1" name="active">Hiện
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group row" hidden>
                    <label class="col-sm-2">Slug</label>
                    <div class="col-sm-9">
                        <input type="text" id="txtSlug" placeholder="slug" name="slug" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group text-center">
            <a href="javascript:void(0)" onclick="checkvalidation()" class="btn btn-primary">{{__("textCreateBT")}}</a>
            <!-- <input type="submit" class="btn btn-primary" value="{{__('textCreateBT')}}"> -->
            <a href="{{route('list-product')}}" class="btn btn-warning ml-2">{{__("textCancelBT")}}</a>
        </div>
    </form>
</div>
<script>
    function checkvalidation() {
        //get value input
        var name = $('input[name*=name]').val();
        var postcategory_id = $('select[name*=postcategory_id]').val();
        var summary = $('textarea[name*=summary]').val();
        var description = $('textarea[name*=description]').val();
        var content = $('textarea[name*=content]').val();
        var tag = $('input[name*=tag]').val();
        var slug = $('input[name*=slug]').val();
        var active = $('input[name*=active]:checked').val();
        // console.log(name, postcategory_id, summary, description, content, tag, slug, active);
        $.ajax({
            data: {
                name: name,
                postcategory_id: postcategory_id,
                summary: summary,
                description: description,
                content: content,
                tag: tag,
                slug: slug,
                active: active,
                "_token": "{{csrf_token()}}"
            },
            url: "{{route('save-post')}}",
            method: 'POST',
            dataType: 'json',
            success: function(data) {
                console.log(data)
                if (data.error == true) {
                    $("#txtNameError").html('').append(data.name);
                    $("#txtSummaryError").html('').append(data.summary);
                }
            }
        })
    }
    //hidden error message
    // $(document).ready(function() {
    //     setTimeout(function() {
    //         $("span.text-danger").css("display", "none");
    //     }, 3000);
    // });
    function fncSlug(str) {
        str = str.replace(/^\s+|\s+$/g, ''); // trim
        //str = str.toLowerCase();
        // remove accents, swap ñ for n, etc
        var from = "ñç·/_,:;áàảãạăắằẳẵặâấầẩẫậóòỏõọôồốổỗộơớờởỡợéèẻẽẹêếềểễệíìỉĩịúùủũụưứừửữựýỳỷỹỵđÁÀẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬÓÒỎÕỌÔỐỒỔỖỘƠỞỠỜỚỢÉÈẺẼẸÊỂỄỀẾỆÍÌỈĨỊÚÙỦŨỤƯỨỪỬỮỰÝỲỶỸỴĐ";
        var to = "nc------aaaaaaaaaaaaaaaaaoooooooooooooooooeeeeeeeeeeeiiiiiuuuuuuuuuuuyyyyydAAAAAAAAAAAAAAAAAOOOOOOOOOOOOOOOOOEEEEEEEEEEEIIIIIUUUUUUUUUUUYYYYYD";
        for (var i = 0, l = from.length; i < l; i++) {
            str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }
        str = str.replace(/[^a-zA-Z_0-9/. -]/g, '') // remove invalid chars
            .replace(/\s+/g, '-') // collapse whitespace and replace by -
            .replace(/-+/g, '-'); // collapse dashes
        str = str.toLowerCase();
        document.getElementById('txtSlug').value = str;
    }

    function clickavatar1() {
        $("#upload input[type=file]").click();
    }

    function showPreview1(input) {
        if (input.files && input.files[0]) {
            var filerdr = new FileReader();
            filerdr.onload = function(e) {
                $('#imgPreview1').attr('src', e.target.result);
            }
            filerdr.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection