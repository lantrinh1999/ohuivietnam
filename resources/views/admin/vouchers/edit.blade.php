@extends('admin.layout.master')

@section('title')
Mã giảm giá
@endsection
@section('action')
Sửa
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-colorpicker.min.css') }}">

<style>
    @media only screen and (max-width: 768px) {

        /* For mobile phones: */
        .modal-dialog {
            width: 90%;
            margin: auto;
            margin-top: 20%;
        }
    }
</style>
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
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-header">
                {{-- <h3 class="box-title">Sửa mã giảm giá</h3> --}}
            </div>


            <div class="box-body col-md-6">
                <form id="create_" method="post" action="">
                    @csrf
                    <div class="form-group">
                        <label for="">Voucher</label>
                        <input class="form-control" type="text" name="name"
                            value="{{!empty(old('name')) ? old('name') : $voucher->name}}" id="name" autocomplete="off">
                        @error('name')
                        <span style="color:red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Điểm quy đổi</label>
                        <input class="form-control" type="number" min="0" name="point"
                            value="{{!empty(old('point')) ? old('point') : $voucher->point}}" id="name">
                        @error('point')
                        <span style="color:red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Giá trị</label>
                        <input class="form-control" type="number" min="0" name="voucher_value"
                            value="{{!empty(old('voucher_value')) ? old('voucher_value') : $voucher->voucher_value}}" id="name">
                        @error('voucher_value')
                        <span style="color:red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Kiểu giảm giá</label>
                        <select name="type" class="form-control">
                            <option value="">Chọn kiểu</option>
                            <option {{$voucher->type == 'percent' ? 'selected' : ''}} value="percent">Phần trăm (%)
                            </option>
                            <option {{$voucher->type == 'total' ? 'selected' : ''}} value="total">Số tiền</option>
                        </select>
                        @error('type')
                        <span style="color:red">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <button class="btn-save btn btn-success">Lưu</button>
                        <button class="btn-save-and-exit btn btn-success">Lưu và thoát</button>
                        <a href="{{route('admin.vouchers.index')}}" class="btn-cancel btn btn-danger">Huỷ</a>
                    </div>
                </form>

            </div>
            <!-- ********** -->
            <!-- ********** -->
            <!-- /.box-body -->
            <div class="box-footer">

            </div>
            <!-- /.box-footer-->
        </div>
    </div>

</div>



@endsection
@section('js')
<script>
    $(function() {
            $('.btn-save').on('click',function(e){
                e.preventDefault();
                $('#create_').attr('action',`{{route('admin.vouchers.saveEdit',['id' => $voucher->id,'action' => 'save'])}}`);
                $('#create_').submit();
            });

            $('.btn-save-and-exit').on('click',function(e){
                e.preventDefault();
                $('#create_').attr('action',`{{route('admin.vouchers.saveEdit',['id' => $voucher->id,'action' => 'save_and_exit'])}}`);
                $('#create_').submit();
            });
        })
</script>
@endsection