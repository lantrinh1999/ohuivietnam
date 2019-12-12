@extends('admin.layout.master')

@section('title')
Trang
@endsection
@section('action')
Chỉnh sửa
@endsection


@section('content')

<div class="box">
    <div class="box-header">
        {{-- <h3 class="box-title"> @yield('title') </h3> --}}
    </div>

    <!-- ********** -->
    <div class="box-body">
        <div class="col-md-12">
        <form method="POST" action="" id="create_">
            @csrf
            <div class="form-group">
                <label for="">Tên trang</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Tên trang"
            value="{{!empty(old('name')) ? old('name') : $page->name }}">
                @error('name')
                    <span style="color:red">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Đường dẫn</label>
                <input class="form-control" type="text" name="slug" id="slug" placeholder=""
                    value="{{!empty(old('slug')) ? old('slug') : $page->slug }}">
                @error('slug')
                    <span style="color:red">{{$message}}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="">Chi tiết</label>
                <textarea class="form-control" name="content" id="content" cols="40" rows="20">{{!empty(old('content')) ? old('content') : $page->content}}</textarea>
                @error('content')
                    <span style="color:red">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Trạng thái</label>
                <select name="status" id="status" class="form-control">
                    <option {{$page->status == -1 ? 'selected' : ''}} value="-1">Ẩn</option>
                    <option {{$page->status == 1 ? 'selected' : ''}} selected value="1">Kích hoạt</option>
                </select>
            </div>
            <div style="margin-top: 40px;" class="mt-2">
                <button type="button" class="btn btn-save btn-success">Lưu</button>
                <button type="button" class="btn btn-save_and_exit btn-success btn-outline-primary">Lưu & Thoát</button>
                <a href="{{route('admin.pages.index')}}" class="btn btn-danger">Huỷ</a>
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
            $('#create_').attr('action',`{{route('admin.pages.saveEdit',['id' => $page->id , 'action' => 'save'])}}`);
            $('#create_').submit();
        });

        $('.btn-save_and_exit').on('click',function(e){
            console.log('aa');
            e.preventDefault();
            $('#create_').attr('action',`{{route('admin.pages.saveEdit',['id' => $page->id , 'action' => 'save_and_exit'])}}`);
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