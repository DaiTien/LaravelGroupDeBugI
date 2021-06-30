@extends('admin.Template.admin_layout')
@section('titleForm')
    <div class="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;<a href="/adimin">{{__('Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('movie.index')}}">{{__('TitleLinkMovie')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('TitleUpdateMovie')}}</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="m-auto card pl-3">
        <h3 class="text-center text-uppercase mt-3">{{__('TitleUpdateMovie')}}</h3>
        <form action="{{route('movie.update')}}" method="POST" style="width:95%" enctype="multipart/form-data">
            @csrf
            <div class=row>
                <div class="col-8">
                    <div class="form-group row" hidden>
                        <label class="col-sm-3">ID</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="id" name="id" value="{{$movie->id}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Name</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="name" name="name" class="form-control" value="{{old('name', $movie->name)}}">
                            @error('name')
                            <span class="text-danger font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Loại phim</label>
                        <div class="col-sm-9">
                            <select name="movie_category_id" class="form-control">
                                @foreach($movie_category as $movie_category)
                                    <option value="{{$movie_category->id}}" {{ (old('movie_category_id', $movie->movie_category_id) == $movie_category->id ? "selected":"") }}>{{$movie_category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Directer</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="director" name="director" class="form-control" value="{{old('director',$movie->director)}}"/>
                            @error('director')
                            <span class="text-danger font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Actors</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="actors" name="actors" class="form-control" value="{{old('actors',$movie->actors)}}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Country</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="country" name="country" class="form-control" value="{{old('country',$movie->country)}}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Duration</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="duration" name="duration" class="form-control" value="{{old('duration',$movie->duration)}}"/>
                            @error('duration')
                            <span class="text-danger font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Release date</label>
                        <div class="col-sm-9">
                            <input type="date" placeholder="release_date" name="release_date" class="form-control" value="{{old('release_date',$movie->release_date)}}"/>
                            @error('release_date')
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
                                    <img id="imgPreview1" src="/{{ $movie->image }}" alt="" style="max-width: 100%; height: auto">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=row>
                <div class="col-12">
                    <div class="form-group row">
                        <label class="col-sm-2">Description</label>
                        <div class="col-sm-9">
                            <textarea type="text" placeholder="description" name="description" class="form-control" rows="3">{{old('description', $movie->description)}}</textarea>
                            @error('description')
                            <span class="text-danger font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <label class="col-sm-2">Summary</label>
                        <div class="col-sm-9">
                            <textarea type="text" placeholder="summary" name="summary" class="form-control" rows="3">{{old('summary',$movie->summary)}}</textarea>
                            @error('summary')
                            <span class="text-danger font-weight-bold">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <label class="col-sm-2">Content</label>
                        <div class="col-sm-9">
                            <textarea type="text" placeholder="content" name="contents" id="summernote" class="form-control">{{old('content',$movie->content)}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <label class="col-sm-2">Trạng thái</label>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="0" name="status" {{$movie->status==0?"checked":""}}>Sắp chiếu
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="1" name="status" {{$movie->status==1?"checked":""}}>Đang chiếu
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-primary" value="{{__('textUpdateBT')}}">
                <a href="{{route('movie.index')}}" class="btn btn-warning ml-2">{{__("textCancelBT")}}</a>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('span').hide();
            }, 1500)
        });
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

        function valid_numbers(e) {
            var key = e.which || e.KeyCode;
            if (key >= 48 && key <= 57)
                // to check whether pressed key is number or not
                return true;
            else return false;
        }
    </script>
@endsection