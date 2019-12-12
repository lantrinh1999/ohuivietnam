@extends('admin.layout.master')

@section('title')
Bài viết
@endsection
@section('action')
Chỉnh sửa
@endsection


@section('content')
{{-- alert --}}
@if (session('success'))
<div class="row">
    <div class="col-sm-12">
        <div class="alert alert-success alert-dismissible show" role="alert">
            <strong>Thông báo!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
@endif

@if (session('error'))
<div class="row">
    <div class="col-sm-12">
        <div class="alert alert-warning alert-dismissible show" role="alert">
            <strong>Thông báo!</strong> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
@endif
{{-- end alert --}}
<div class="box">
    <div class="box-header">
        {{-- <h3 class="box-title"> @yield('title') </h3> --}}
    </div>

    <!-- ********** -->
    <div class="box-body">
        <div class="col-md-12">
            <form id="create_" action="" method="post"> 
            @csrf
            <div class="form-group">
                <label for="">Tên bài viết</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Tên bài viết" value="{{!empty(old('name')) ? old('name') : $post->name}}">
                @error('name')
                <span style="color:red">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Đường dẫn</label>
                <input class="form-control" type="text" name="slug" id="slug" placeholder="" value="{{!empty(old('slug')) ? old('slug') : $post->slug}}">
                @error('slug')
                <span style="color:red">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Mô tả</label>
                <textarea style="height: 100px" class="form-control" name="description" id="" cols="20"
            rows="10">{{!empty(old('description')) ? old('description') : $post->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Ảnh</label>
                <input value="{{!empty(old('image')) ? old('image') : $post->image}}" readonly min="0" type="hidden" name="image"
                    class="form-control image" id="thumbnail">
            </div>
            <button class="btn btn-primary choose_image" id="choose_image" type="button">Chọn ảnh</button>
            <div class="text-danger error_image" id="error_image"></div>
            <br>
            <div class=form-group>
                <img style="width: auto; max-height: 400px; padding-top: 10px !important" id="this-img"
                    src="{{!empty(old('image')) ? old('image') : $post->image}}" alt="">
            </div>

            <div class="form-group">
                <label for="">Chi tiết</label>
                <textarea class="form-control" name="content" id="description" cols="40"
                    rows="20">{{!empty(old('content')) ? old('content') : $post->content}}</textarea>
                @error('content')
                <span style="color:red">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Trạng thái</label>
                <select name="status" id="status" class="form-control">
                    <option {{$post->status == -1 ? 'selected' : ''}} value="-1">Ẩn</option>
                    <option {{$post->status == 1 ? 'selected' : ''}} value="1">Kích hoạt</option>
                </select>
            </div>
                <div style="margin-top: 40px;" class="mt-2">
                    <button type="button" class="btn btn-save btn-success">Lưu</button>
                    <button type="button" class="btn btn-save_and_exit btn-success btn-outline-primary">Lưu & Thoát</button>
                    <a href="{{route('admin.posts.index')}}" class="btn btn-danger">Huỷ</a>
                </div>
            </form>
        </div>


    </div>
    <!-- ********** -->
    <!-- /.box-body -->
    <div class="box-footer">

    </div>
    <!-- /.box-footer-->
</div>
@endsection

@section('js')
<script>
    $(function() {
        $('.btn-save').on('click',function(e){
            e.preventDefault();
            $('#create_').attr('action',`{{route('admin.posts.saveEdit',['id' => $post->id , 'action' => 'save'])}}`);
            $('#create_').submit();
        });

        $('.btn-save_and_exit').on('click',function(e){
            console.log('aa');
            e.preventDefault();
            $('#create_').attr('action',`{{route('admin.posts.saveEdit',['id' => $post->id , 'action' => 'save_and_exit'])}}`);
            $('#create_').submit();
        });
    })

    $(function () {
        $('body').on('keyup', '#name', function () {
        ChangeToSlug('name', 'slug');
        });
    })

    $('body').on('click', '#choose_image', function(){
        var choose = $(this);
        CKFinder.popup( {
            chooseFiles: true,
            width: 800,
            height: 600,
            onInit: function( finder ) {
                finder.on( 'files:choose', function( evt ) {
                    var file = evt.data.files.first();
                    
                    var file_name = file.getUrl();
                    $('#thumbnail').val(file_name);

                    $('#this-img').show();
                    $('img#this-img').attr('src',file_name);
                } );
            }
        } );

    })
    
    $(function () {
        CKEDITOR.replace( 'description', {
        } );
    })
</script>
@endsection