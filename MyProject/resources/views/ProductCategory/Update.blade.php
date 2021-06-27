@extends('Template.admin_layout')
@section('title')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<h3 class="textTitle">CẬP NHẬT NHÓM SẢN PHẨM</h3>
@endsection
@section('noidung')
<div class="col-md-6 m-auto">
    <form action="/save-update-produc-category" method="POST" style="width:95%">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group" hidden>
            <label>ID</label>
            <input type="text" placeholder="name" name="id" value="{{$category->id}}" class="form-control">
        </div>
        <div class="form-group">
            <label>Name</label>
            <input type="text" placeholder="name" name="name" value="{{$category->name}}" class="form-control" onchange="fncSlug(this.value)">
        </div>
        <div class="form-group">
            <label>Danh mục cha</label>
            <select id="slActive" name="parent_id" class="form-control">
                <option value="0">Đây là danh mục chính</option>
                @foreach($categories as $cat)
                    <option 
                    @if($category->parent_id == $cat->id)
                     selected 
                     @endif
                 value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" placeholder="description" value="{{$category->description}}" name="description" class="form-control">
        </div>
        <div class="form-group">
            <label>Tag</label>
            <input type="text" placeholder="tag" name="tag" value="{{$category->tag}}" class="form-control">
        </div>
        <div class="form-group" hidden>
            <label>Slug</label>
            <input type="text" id="txtSlug" placeholder="slug" name="slug" value="{{$category->slug}}" class="form-control">
        </div>
        <!-- <div class="form-group">
            <input type="text" name="active" id="active" hidden>
            <label>Trạng thái</label>
            <select id="slActive" onchange="getValueSelected()" class="form-control">
                <option value="0">Ẩn</option>
                <option value="1">Hiện</option>
            </select>
        </div> -->
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Cập nhật">
            <a href="/list-product-category" class="btn btn-warning">Back to list</a>
        </div>
    </form>
</div>
<script>
    function getValueSelected() {
        var x = document.getElementById("slActive").value;
        document.getElementById("active").value = x;
    }
    $(document).ready(function() {
        getValueSelected();
    })

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
</script>
@endsection