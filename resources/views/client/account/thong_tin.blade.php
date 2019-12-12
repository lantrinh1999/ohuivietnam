@extends('client.layout.master')

@section('page_title')
Thông tin
@endsection
@section('css')
<style>
    input[type=text]:disabled {
        background: #f2f4f5 !important;
    }

    .contact-info-detail .form-group label{
        width: 20%;
    }
    .contact-info-detail .form-group input{
        width: 70%;
    }
    input[type=file] {
        width: 1px;
        visibility: hidden;
    }
</style>    
@endsection


@section('content')
<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="{{route('/')}}">TRANG CHỦ</a>
                </li>
                <li class="active">Thông tin tài khoản</li>
            </ul>
        </div>
    </div>
</div>


<div class="contact-area pt-100 pb-100">
    <div class="container">
        <div class="contact-map mb-10"></div>
        <div class="custom-row-2">
            <div class="col-lg-3 col-md-4">
                <div class="contact-info-sidebar">
                    <ul>
                        <li class="{{Request::segment(2) == 'doi-diem' ? 'active' : ''}}"><a href="{{route('get_reward')}}">Đổi điểm</a></li>
                        <li><a href="sanphamyeuthich.php">Sản phẩm yêu thích</a></li>
                        <li class="{{Request::segment(2) == 'thong-tin' ? 'active' : ''}}"><a href="{{route('info_account')}}">Thông tin tài
                                khoản</a></li>
                        @if (Auth::check() && Auth::user()->role == 1)
                        <li class="{{Request::segment(2) == 'don-hang' ? 'active' : ''}}"><a href="{{route('orderUser')}}">Đơn hàng</a></li>
                        @endif
                        <li class="{{Request::segment(2) == 'gioi-thieu-ban-be' ? 'active' : ''}}"><a href="{{route('share_code')}}">Giới thiệu
                                bạn bè</a></li>
                        <li class="{{Request::segment(2) == 'hoat-dong' ? 'active' : ''}}"><a href="{{route('history_reward')}}">Hoạt động</a>
                        </li>
                        @if (Auth::check() && Auth::user()->use_refferal != 1)
                        <li class="{{Request::segment(2) == 'nhap-ma-gioi-thieu' ? 'active' : ''}}"><a
                                href="{{route('enter_refferal_code')}}">Nhập mã giới thiệu</a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="contact-info-content">
                    <div class="contact-info-content-title mb-30">
                        <h2>Thông tin tài khoản</h2>
                    </div>
                    <div class="contact-info-detail" style="font-size:14px">
                        <form id="create_">
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input type="text" name="name" value="{{Auth::check() ? Auth::user()->account->name : ''}}">
                                <p style="margin-left:21%;color:red" class="err_name" ></p>
                            </div>
                            <div class="form-group">
                                <label>Email</label> 
                                <input type="text" name="email" disabled="disabled" value="{{Auth::check() ? Auth::user()->email : '' }}">
                            </div>
                            <div class="form-group">
                                <label>Điểm thưởng</label>
                                <input type="text" name="point" disabled="disabled" value="{{Auth::check() ? Auth::user()->point_reward : '' }}">
                            </div>
                            <div class="form-group">
                                <label>Mã giới thiệu</label>
                                <input type="text" name="refferal_code" disabled="disabled" value="{{Auth::check() ? Auth::user()->refferal_code : '' }}">
                            </div>
                            <div class="form-group">
                                <label>Avatar</label>
                                <img id="blah" style="width:250px;height:250px" src="{{Auth::check() ? Auth::user()->avatar : '' }}" alt="">
                                <input type="button" style="width: 15%;background:#f3f3f3" class="btn" id="clickme" value="Chọn ảnh">
                                <input style="display:none" type="file" accept="image/*" name="avatar" onchange="readURL(this);"  id="uploadme" value="{{Auth::check() ? Auth::user()->avatar : '' }}">
                            </div>
                            <div class="input-wrap margin">
                                <label class="checkbox">
                                    <input type="checkbox" id="is_change_pass" name="is_change_pass">
                                    <span class="ico"></span> Thay đổi mật khẩu
                                </label> 
                            </div>
                            <div class="pass_change" style="display:none">
                                <div class="form-group" style="position: relative;">
                                    <label for="">Mật khẩu cũ</label>
                                    <input type="password" name="old_password" placeholder="Nhập mật khẩu cũ">
                                    <span onclick="showpass(this)" style="position: absolute;right: 11%;top: 24%;"><i class="fa fa-eye"></i>Hiển thị</span>
                                    <p style="margin-left:21%;color:red" class="err_old_password"></p>
                                </div>
                                <div class="form-group" style="position: relative;">
                                    <label for="">Mật khẩu mới</label>
                                    <input type="password" name="new_password" placeholder="Nhập mật khẩu mới">
                                    <span onclick="showpass(this)" style="position: absolute;right: 11%;top: 24%;"><i class="fa fa-eye"></i>Hiển thị</span>
                                    <p style="margin-left:21%;color:red" class="err_new_password"></p>
                                </div>
                            </div>
                            <a class="btn btn btn-success submit_edit_account" style="color:white">Cập nhật</a>
                        </form>
                
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
</div>

@endsection
@section('js')
<script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
<script>
    $('#is_change_pass').on('click',function(){
        checked = $('#is_change_pass:checked').length;
        if (checked == 1) {
            $('.pass_change').css('display','block');
        }else{
            $('.pass_change').css('display','none');
        }
    });

    
    
    function showpass(current){
        // console.log(current);
        if (!$(current).hasClass('show')) {
            jQuery(current).addClass('show');
            jQuery(current).html(`<i class="fa fa-eye-slash"></i>Ẩn`);
            jQuery(current).parent('div.form-group').find('input').attr('type','text');
        }else{
            jQuery(current).removeClass('show');
            jQuery(current).html(`<i class="fa fa-eye"></i>Hiển thị`);
            jQuery(current).parent('div.form-group').find('input').attr('type','password');
        }
        return true;
    };
    


    $(function(){
        $('#clickme').click(function(){
            $('#uploadme').click();
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
            
                     $('#blah')
                    .attr('src', e.target.result)
                    .width(250)
                    .height(250)
                    
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('.submit_edit_account').on('click',function(){
        var formData = new FormData($('#create_')[0]);
        formData.set('_token',`{{csrf_token()}}`);
        formData.set('user_id',`{{Auth::user()->id}}`);
        $.ajax({
            url:"{{ route('save_edit_info_account') }}",
            cache:false,
            contentType: false,
            processData: false,
            method:"POST",
            data: formData,
            success:function(msg){ 
                if (msg.err == false) {
                    swal({
                        title: "Thành công!",
                        text: "Cập nhập thông tin thành công!",
                        icon: "success",
                        button: "Ok!",
                    }).then((value) => {
                        if (value == true) {
                            window.location.reload();
                        };
                    }); 
                }else{
                    console.log(msg.messages.name);
                    typeof msg.messages.name !== 'undefined' ? $('#create_').find('.err_name').html(msg.messages.name[0]) : 
                    $('#create_').find('.err_name').html('');
                    typeof msg.messages.new_password !== 'undefined' ? $('#create_').find('.err_new_password').html(msg.messages.new_password[0]) :
                    $('#create_').find('.err_new_password').html('');
                    typeof msg.messages.old_password !== 'undefined' ? $('#create_').find('.err_old_password').html(msg.messages.old_password[0]) :
                    $('#create_').find('.err_old_password').html(''); 
                }
            }
        });
    });
</script>
@endsection