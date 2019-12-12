@extends('admin.layout.master')

@section('title')
Danh sách người dùng
@endsection
@section('action')
Thêm
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
{{-- content --}}
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


    <!-- ********** -->
    <div class="box-body">
        <div class="nav-tabs-custom">
            
            <div class="tab-content">
                
                    <div class="row">
                        <div class="col-sm-6">
                        <form method="POST" action="{{route('admin.users.saveAdd')}}">
                            @csrf
                                <div class="form-group">
                                    <label for="name">Tên người dùng</label>
                                    <input class="form-control" type="text" name="name" id="name" {{ !empty(old('name')) ? old('name') : ''}} placeholder="Tên người dùng">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control" type="text" name="email" id="email"
                                    placeholder="Email" value="{{ !empty(old('email')) ? old('email') : ''}}">
                                    @error('email')
                                        <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group" style="position: relative;">
                                    <label for="password">Mật khẩu</label>
                                    <input class="form-control" type="password" name="password" id="password"
                                        placeholder="Mật khẩu" {{ !empty(old('password')) ? old('password') : ''}}>
                                    <span class="show_pass" style="position: absolute;right: 10px;top: 33px"><i class="fa fa-eye" ></i>Hiển thị</span>  
                                    @error('password')
                                        <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="role">Kiểu người dùng</label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="">Chọn kiểu người dùng</option>
                                        <option {{ !empty(old('role')) && old('role') == 300 ? 'selected' : ''}} value="300">Admin</option>
                                        <option {{ !empty(old('role')) && old('role') == 1 ? 'selected' : ''}} value="1">User</option>
                                    </select>
                                    @error('role')
                                        <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="status">Trạng thái</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="0">Không kích hoạt</option>
                                        <option selected="" value="1">Kích hoạt</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Thêm</button>
                                    <button type="submit" class="btn btn-danger">Huỷ</button>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
            <!-- /.tab-content -->
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
    jQuery(function () {
        jQuery('body').on('click','.show_pass',function(){
            if (!$(this).hasClass('show')) {
                jQuery(this).addClass('show');
                jQuery(this).html(`<i class="fa fa-eye-slash"></i>Ẩn`);
                jQuery(this).parent('div.form-group').find('input').attr('type','text');
            }else{
                jQuery(this).removeClass('show');
                jQuery(this).html(`<i class="fa fa-eye"></i>Hiển thị`);
                jQuery(this).parent('div.form-group').find('input').attr('type','password');
            }
        })
    })
</script>
<script src="{{ asset('assets/plugins/bootstrap-colorpicker.min.js') }}"></script>
@endsection