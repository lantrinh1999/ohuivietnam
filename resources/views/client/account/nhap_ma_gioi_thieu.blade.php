@extends('client.layout.master')

@section('page_title')
Nhập mã giới thiệu
@endsection

<style>
    .contact-info-content-item.active button:hover {
        cursor: pointer;
        color: #fff;
        background: #000;
    }

    .share_button a {
        color: white;
    }
</style>

@section('content')
<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="{{route('/')}}">TRANG CHỦ</a>
                </li>
                <li class="active">Nhập mã giới thiệu</li>
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
                <div class="contact-info-content" style="margin-bottom: 30px;">
                    <div class="contact-info-content-title mb-30">
                        <h2>Nhập mã giới thiệu</h2>
                    </div>
                    <div class="contact-info-content-title mb-30">
                        <div class="contact-info-share">
                            <div class="lion-referral-widget-main__icon" style="background: url(http://cdn.onlinewebfonts.com/svg/img_284110.png) center/50px no-repeat #fff;width: 80px;
                                    height: 80px;
                                    border-radius: 100px;
                                    box-shadow: 0 0 3px 1px rgba(25, 25, 25, 0.1);
                                    margin: 5px auto 25px auto;">
                            </div>
                            @php
                                $point_introduce = get_option('point_introduce');
                            @endphp
                            <p>Nhập mã từ người giới thiệu bạn. Bạn và người đó sẽ nhận được {{$point_introduce}} điểm thưởng để đổi các voucher có giá trị</p>
                            <p>(Lưu ý: Mỗi người có thể sử dụng chức năng này 1 lần)</p>
                            
                            <div class="form-group">
                                <form id="create_"> 
                                    <div style="font-size:14px">Nhập mã</div>
                                    <input type="text" name="code" style="text-align:center;border-radius: 5px;border: 1px solid gray;">
                                    
                                    <a style="font-size: 14px;color:white;margin-top:10px" class="btn-send btn btn-success">Xác nhận</a>
                                </form>
                            </div>
                            </button>
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
<script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
<script>
   $('.btn-send').on('click',function(){ 
       code = $(this).parent('#create_').find('input').val();
      
        $.ajax({
            type: "POST",
            url: `{{route('use_refferal_code')}}`,
            method:"POST",
            data: {
                user_id: `{{Auth::user()->id}}`,
                code : code,
                _token : `{{csrf_token()}}`
            },
            success: function( msg ) {
                console.log(msg);
                if (msg.err == false) {
                    swal({
                        title: "Chúc mừng!",
                        text: "Điểm đã được cộng!",
                        icon: "success",
                        button: "Ok!",
                    }).then((value) => {
                        if (value == true) {
                            window.location.href = "{{route('history_reward')}}";
                        };
                    }); 
                }else{
                    swal({
                        title: "Thất bại!",
                        text: msg.messages.code[0],
                        icon: "error",
                        button: "Thoát!",
                    });
                }
            }
        });     
    })
</script>
@endsection