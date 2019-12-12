@extends('admin.layout.master')

@section('title')
Danh mục sản phẩm
@endsection
@section('action')
Thêm mới
@endsection
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-colorpicker.min.css') }}">
<style>


textarea.form-control {
    height: auto;
    height: 182px;
}
</style>
@endsection

@section('content')

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"> @yield('title') </h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>

    <!-- ********** -->
    <div class="box-body">
        <div class="col-md-6 ">
            <div class="form-group">
                <label for="">Tiêu đề</label>
            <input class="form-control" type="text" name="title" id="title" placeholder="Tiêu đề">
            </div>
            <div class="form-group">
                <label for="">Slug</label>
                <input class="form-control" type="text" name="slug" id="slug" placeholder="abc-xyz">
            </div>
            <div class="form-group">
                <label for="">Danh mục cha</label>
                <select class="form-control" name="parent_id" id="parent_id">
                    <option value="">Mỹ phẩm</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Giới thiệu danh mục</label>
                <textarea style="" class="description form-control" name="description" id="description" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="col-sm-12">
            <button type="submit" class="btn btn-success">Lưu</button>
            <button type="submit" class="btn btn-danger">Huỷ</button>
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
<script src="{{ asset('assets/plugins/bootstrap-colorpicker.min.js') }}"></script>
@endsection
