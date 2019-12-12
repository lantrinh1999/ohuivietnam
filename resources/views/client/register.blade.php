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
    Đăng kí tài khoản
@endsection
@section('content')
<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="{{route('/')}}">TRANG CHỦ</a>
                </li>
                <li class="active"> ĐĂNG KÝ </li>
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
                            <h4> ĐĂNG KÝ </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        
                        <div id="lg2" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="{{route('postRegister')}}" method="post">
                                        @csrf
                                        <input type="text" name="name" placeholder="Họ và tên">
                                       
                                        <span class="err_name" style="color:red"></span>
                                        
                                        <input  name="email" placeholder="Email" type="text">
                                        
                                        <span class="err_email" style="color:red"></span>
                                        
                                        <input type="password" name="password" placeholder="Mật khẩu">
                                        
                                        <span class="err_password" style="color:red"></span>
                                        
                                        {{-- <input type="text" name="refferal_code" placeholder="Mã giới thiệu"> --}}
                                        <div class="button-box">
                                            <button type="submit"><span>ĐĂNG KÝ</span></button>
                                        </div>
                                       
                                    </form>
                                    <div class="hr-sect">Hoặc đăng nhập bằng</div>
                                    <div class="form-group row">
                                    
                                        <div class="col-xs-6 col-md-6">
                                            <a id="loginBtn" class="btn btn-primary" style="font-size: 14px; width :100%;color:white"
                                                href="{{route('redirectSocial',['social' => 'facebook'])}}"><span class="fa fa-facebook"></span>
                                                Facebook</a>
                                        </div>
                                        <div class="col-xs-6 col-md-6">
                                            <a class="btn btn-danger"
                                                style="cursor: pointer; font-size: 14px ;width :100%;color:white;border-radius: 5px;border-color: #dc3545;"
                                                id="googleSignIn" href="{{route('redirectSocial',['social' => 'google'])}}">
                                                <span class="fa fa-google"></span> Google</a>
                                        </div>
                                    </div>
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
                    url : "{{route('postRegister')}}",
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
                        if (typeof msg.name !== 'undefined') {
                            Form.find('.err_name').html(msg.name[0]);     
                        }else{
                            Form.find('.err_name').html('');
                        }
                        
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
                
                    }else{
                        $('.login-register-wrapper').html(`
                        <div id="lg2" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">Cám ơn bạn đã đăng ký thành viên!
                                    <p>Hệ thống đã gửi Email xác thực đến địa chỉ email của bạn.
                                    Nếu không thấy email trong hộp thư đến (Inbox) bạn vui lòng kiểm tra hộp thư Spam.</p>
                                    <p>Tự động chuyển trang đăng nhập trong vòng <span id='countdown'>5</span> giây </p>
                                </div>
                            </div>
                        </div>
                        `);

                        var seconds;
                        var temp;
                        
                        function countdown() {
                            seconds = document.getElementById('countdown').innerHTML;
                            seconds = parseInt(seconds);
                            
                            if (seconds == 0) {
                                window.location.href = `{{route('login')}}`
                            return;
                            }
                            
                            seconds--;
                            temp = document.getElementById('countdown');
                            temp.innerHTML = seconds;
                            timeoutMyOswego = setTimeout(countdown, 1500);
                        }
                        
                        countdown();
                    }
                    
                });
            })
        })
    </script>
@endsection