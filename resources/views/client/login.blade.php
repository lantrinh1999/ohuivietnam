@extends('client.layout.master')
<style>
.hr-sect {
    display: flex;
    flex-basis: 100%;
    align-items: center;
    color: rgba(0, 0, 0, 0.35);
    margin: 0px -7px 8px -8px;
}
.hr-sect::before, .hr-sect::after {
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
Đăng nhập
@endsection
@section('content')
    <div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <ul>
                    <li>
                        <a href="{{route('/')}}">TRANG CHỦ</a>
                    </li>
                    <li class="active"> ĐĂNG NHẬP </li>
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
                                <h4> ĐĂNG NHẬP </h4>
                            </a>
                           
                        </div>
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="{{route('postLogin')}}" method="post">
                                            @csrf
                                            <span class="err_" style="color:red"></span>
                                            <input type="text" name="email" placeholder="Email">
                                            <span class="err_email" style="color:red"></span>
                                            <input type="password" name="password" placeholder="Mật khẩu">
                                            <span class="err_password" style="color:red"></span>
                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    
                                                    <a href="{{route('forget_password')}}">Quên mật khẩu?</a>
                                                </div>
                                                <button type="submit"><span>ĐĂNG NHẬP</span></button>
                                            </div>
                                            <div class="form-group" style="margin-top:20px">
                                                <p>Bạn chưa có tài khoản ? <a href="{{route('register')}}">Đăng ký ngay</a> </p>
                                            </div>
                                            <div class="hr-sect">Hoặc đăng nhập bằng</div>
                                            <div class="form-group row">
                                            
                                                <div class="col-xs-6 col-md-6">
                                                <a id="loginBtn" class="btn btn-primary" style="font-size: 14px; width :100%;color:white" href="{{route('redirectSocial',['social' => 'facebook'])}}"><span class="fa fa-facebook"></span> Facebook</a>
                                                </div>
                                                <div class="col-xs-6 col-md-6">
                                                    <a  class="btn btn-danger" style="cursor: pointer; font-size: 14px ;width :100%;color:white;border-radius: 5px;border-color: #dc3545;" id="googleSignIn" href="{{route('redirectSocial',['social' => 'google'])}}">
                                                        <span class="fa fa-google"></span> Google</a>
                                                </div>
                                            </div>
                                        </form>
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
                    url : "{{route('postLogin')}}",
                    method: 'post',
                    processData: false,
                    contentType: false,
                    data: dataForm,
                    beforeSend : function () {
                        $('#roller_load').css('display','block');
                        $('.ohui_container').css('opacity','0.5');
                        $('#roller_load').css('opacity','1');
                    },
                }).done(
                    result => {
                        $('.ohui_container').css('opacity','1');
                        $('#roller_load').css('display','none');
                    var msg = result.data;
                    if (result.errors) {
                        if (typeof msg.email !== 'undefined') {
                            Form.find('.err_email').html(msg.email[0]);
                        }else{
                            Form.find('.err_email').html('');
                        }
                        
                        if (typeof msg.password !== 'undefined') {
                            Form.find('.err_password').html(msg.password[0]);
                        } else {
                            Form.find('.err_password').html('');
                        }
                        
                        if (typeof msg) {
                            Form.find('.err_').html(msg);
                        }else{
                            Form.find('.err_').html('');
                        }
                    }else{
                        if (msg == 'user') {
                            window.location.href = `{{route('/')}}`;
                        }else if(msg == 'admin'){
                            window.location.href = `{{route('admin.home')}}`;
                        }
                    }
                    
                });
            })
        })
        </script>
@endsection
