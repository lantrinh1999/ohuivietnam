@extends('admin.layout.master')

@section('title')
Trang
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
    <div class="box-body">
        <div class="col-md-12">
            <form id="create_" action="" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Tên trang</label>
                    <input class="form-control" type="text" name="name" id="name" placeholder="Tên trang">
                    @error('name')
                    <span style="color:red">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Đường dẫn trang</label>
                    <input class="form-control" type="text" name="slug" id="slug" placeholder="">
                    @error('slug')
                    <span style="color:red">{{$message}}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="">Chi tiết</label>
                    <textarea class="form-control" name="content" id="content" cols="40" rows="20"></textarea>
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
                $('#create_').attr('action',`{{route('admin.pages.saveAdd',['action' => 'save'])}}`);
                $('#create_').submit();
            });

            $('.btn-save_and_exit').on('click',function(e){
                console.log('aa');
                e.preventDefault();
                $('#create_').attr('action',`{{route('admin.pages.saveAdd',['action' => 'save_and_exit'])}}`);
                $('#create_').submit();
            });
    })


    $(function () {
        $('body').on('keyup', '#name', function () {
            ChangeToSlug('name', 'slug');
        });
    })
    
    $(function () {
        CKEDITOR.replace( 'content', {
        } );
    })
</script>
@endsection