@extends('admin.layout.master')

@section('title')
Bài viết
@endsection
@section('action')
Thêm mới
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
    <form id="create_" method="POST" action="{{route('admin.posts.saveAdd')}}">
        @csrf
        <div class="box-body">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Tên bài viết</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ !empty(old('name')) ? old('name') : ''}}" placeholder="Tên bài viết" autocomplete="off">
                    @error('name')
                        <span style="color:red">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Đường dẫn bài viết</label>
                    <input class="form-control" type="text" name="slug" id="slug" value="{{ !empty(old('slug')) ? old('slug') : ''}}" placeholder="Tên đường dẫn">
                    @error('slug')
                    <span style="color:red">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea style="height: 100px" class="form-control" name="description" cols="20" rows="10">{{ !empty(old('description')) ? old('description') : ''}}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">Ảnh</label>
                    <input value="{{ (old('image') ? old('image') :  '' ) }}" readonly min="0" type="hidden" name="image"
                        class="form-control image" id="thumbnail">
                </div>
                    <button class="btn btn-primary choose_image" id="choose_image" type="button">Chọn ảnh</button>
                    <div class="text-danger error_image" id="error_image"></div>
                    <br>
                <div class=form-group>
                    <img style="width: auto; max-height: 400px; padding-top: 10px !important" id="this-img"
                        src="{{ (old('image') ? old('image') : '' ) }}" alt="">
                </div>
                <div class="form-group">
                    <label for="">Chi tiết</label>
                    <textarea class="form-control" name="content" id="description" cols="40" rows="20">{{ !empty(old('content')) ? old('content') : ''}}</textarea>
                    @error('content')
                    <span style="color:red">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select name="status" id="status" class="form-control">
                        <option value="-1">Ẩn</option>
                        <option selected value="1">Kích hoạt</option>
                    </select>
                </div>

                
                <div style="margin-top: 40px;" class="mt-2">
                    <button type="button" class="btn btn-save btn-success">Lưu</button>
                    <button type="button" class="btn btn-save_and_exit btn-success btn-outline-primary">Lưu & Thoát</button>
                    <a href="{{route('admin.posts.index')}}" class="btn btn-danger">Huỷ</a>
                </div>

                
            </div>
        </div>
    </form>
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
                $('#create_').attr('action',`{{route('admin.posts.saveAdd',['action' => 'save'])}}`);
                $('#create_').submit();
            });

            $('.btn-save_and_exit').on('click',function(e){
                console.log('aa');
                e.preventDefault();
                $('#create_').attr('action',`{{route('admin.posts.saveAdd',['action' => 'save_and_exit'])}}`);
                $('#create_').submit();
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
        });
    })

    $(function () {
        $('body').on('keyup', '#name', function () {
            ChangeToSlug('name', 'slug');
        });
    })
    
    $(function () {
        CKEDITOR.replace( 'description', {
        } );
    })
</script>
@endsection