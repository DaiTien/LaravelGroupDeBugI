@extends('Template.admin_layout')
@section('title')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<h3 class="textTitle">THÊM NHÓM SẢN PHẨM</h3>
@endsection
@section('noidung')
<div class="col-md-6 m-auto">
    <form action="/save-product-category" method="POST" style="width:95%">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label>Name</label>
            <input type="text" placeholder="name" name="name" class="form-control" onchange="fncSlug(this.value)">
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" placeholder="description" name="description" class="form-control">
        </div>
        <div class="form-group">
            <label>Tag</label>
            <input type="text" placeholder="tag" name="tag" class="form-control">
        </div>
        <div class="form-group" hidden>
            <label>Slug</label>
            <input type="text" id="txtSlug" placeholder="slug" name="slug" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="active" id="active" hidden>
            <label>Trạng thái</label>
            <select id="slActive" onchange="getValueSelected()" class="form-control">
                <option value="0">Ẩn</option>
                <option value="1">Hiện</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Thêm">
            <a href="/list-product-category" class="btn btn-warning ml-2">Back to list</a>
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