@extends('client.layout.master')
<style>
    .hr-sect {
        display: flex;
        flex-basis: 100%;
        align-items: center;
        color: rgba(0, 0, 0, 0.35);
        margin: 0px -7px 8px -8px;
    }

    .hr-sect::before,
    .hr-sect::after {
        content: "";
        flex-grow: 1;
        background: rgba(0, 0, 0, 0.35);
        height: 1px;
        font-size: 0px;
        line-height: 0px;
        margin: 0px 8px;
    }
</style>
@section('page_title')
Thay đổi mật khẩu
@endsection
@section('content')
<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="index.html">TRANG CHỦ</a>
                </li>
                <li class="active">Thay đổi mật khẩu </li>
            </ul>
        </div>
    </div>
</div>

<div class="login-register-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> THAY ĐỔI MẬT KHẨU </h4>
                        </a>
                    </div>
                    <div class="tab-content">

                        <div id="lg2" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form method="post">
                                        @csrf
                                        <input type="hidden" name="email" value="{{$_GET['email'] ?? ''}}">
                                        <input name="password" placeholder="Mật khẩu" type="password">
                                        <span class="err_password" style="color:red"></span>
                                        <input name="cf_password" placeholder="Xác nhận mật khẩu" type="password">
                                        <span class="err_cf_password" style="color:red"></span>
                                        <div class="button-box">
                                            <button type="submit"><span>THAY ĐỔI MẬT KHẨU</span></button>
                                        </div>

                                    </form>
                                    {{-- <div class="hr-sect">Hoặc đăng nhập bằng</div>
                                    <div class="form-group row">

                                        <div class="col-xs-6 col-md-6">
                                            <a id="loginBtn" class="btn btn-primary"
                                                style="font-size: 14px; width :100%;color:white"
                                                href="{{route('redirectSocial',['social' => 'facebook'])}}"><span
                                                    class="fa fa-facebook"></span>
                                                Facebook</a>
                                        </div>
                                        <div class="col-xs-6 col-md-6">
                                            <a class="btn btn-danger"
                                                style="cursor: pointer; font-size: 14px ;width :100%;color:white;border-radius: 5px;border-color: #dc3545;"
                                                id="googleSignIn"
                                                href="{{route('redirectSocial',['social' => 'google'])}}">
                                                <span class="fa fa-google"></span> Google</a>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('js')
<script>
    jQuery(function(){
            jQuery('.login-register-form > form').find('button[type=submit]').on('click',function(e){
                e.preventDefault();
                var Form = $(this).parents('form');
                let dataForm = new FormData(Form[0]);
                dataForm.set('_token', '{{csrf_token()}}');

                $.ajax({
                    url : "{{route('saveChangePassword')}}",
                    method: 'post',
                    processData: false,
                    contentType: false,
                    data: dataForm,
                }).done(
                     result => {
                    var msg = result.data;
                    if(result.errors){
                        if (typeof msg.passsword !== 'undefined') {
                            Form.find('.err_password').html(msg.passsword[0]);     
                        }else{
                            Form.find('.err_password').html('');
                        }

                        if (typeof msg.cf_password !== 'undefined') {
                            Form.find('.err_cf_password').html(msg.cf_password[0]);     
                        }else{
                            Form.find('.err_cf_password').html('');
                        }

                    }else{
                        $('.login-register-wrapper').html(`
                        <div id="lg2" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">Thay đổi mật khẩu thành công!
                                    <a href="{{route('login')}}">Đăng nhập ngay</a>                             
                                </div>
                            </div>
                        </div>
                        `);
                    }
                });
            })
        })
</script>
@endsection