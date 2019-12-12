@extends('client.layout.master')

@section('page_title')
Giới thiệu bạn bè
@endsection

<style>
    .contact-info-content-item.active button:hover {
        cursor: pointer;
        color: #fff;
        background: #000;
    }
    .share_button a{
        color:white;
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
                <li class="active">Giới thiệu bạn bè</li>
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
                        <h2>Giới thiệu bạn bè</h2>
                    </div>
                    <div class="contact-info-content-title mb-30">
                        <div class="contact-info-share">
                            <div class="lion-referral-widget-main__icon"
                                style="background: url(https://cdn.shopify.com/s/files/1/0250/1519/files/esq-rewards-program-icons-refer-friend.svg) center/50px no-repeat #fff;width: 80px;
                                    height: 80px;
                                    border-radius: 100px;
                                    box-shadow: 0 0 3px 1px rgba(25, 25, 25, 0.1);
                                    margin: 5px auto 25px auto;">
                            </div>
                            <p>Chia sẻ mã giới thiệu với bạn bè ngay để nhận ưu đãi</p>
                            <div class="share_button" style="margin-top: 30px;margin-bottom: 30px;text-align:center"> 
                                <button><a target="_blank" href="https://twitter.com/intent/tweet?url={{Auth::check() ? Auth::user()->refferal_code : ''}}&amp;text=Tham gia ngay với tôi và nhập mã '{{Auth::check() ? Auth::user()->refferal_code : ''}}' để nhận được 500đ&amp;via={{url('')}}&amp;hashtags=OhuiVietNam"> <i class="fa fa-twitter" aria-hidden="true"></i> TWEET</a></button>
                                <button><a target="_blank" href="https://api.whatsapp.com/send?text={{Auth::check() ? Auth::user()->refferal_code : ''}}"><i target="_blank" class="fa fa-whatsapp"></i> WHATSAPP</a></button>
                                <button><a href="https://www.facebook.com/sharer.php?u={{url('')}}?description=Dialogs%20provide%20a%20simple,%20consistent%20interface%20for%20applications%20to%20interact%20with%20users.&
                                message=Facebook%20Dialogs%20are%20so%20easy!&
                                redirect_uri=http://www.example.com/response" target="_blank"><i class="fa fa-facebook"
                                        aria-hidden="true"></i> FACEBOOK </a></button>
                                <button><i target="_blank" class="fa fa-instagram"></i> INSTAGRAM</button>
                                <button><i target="_blank" class="fa fa-envelope" aria-hidden="true"></i> EMAIL</button>
                            </div>
                            <div class="lion-referral-widget-main__share-link">
                                <div class="lion-referral-widget-main__share-link-text">Sao chép mã giới thiệu bên dưới và chia sẻ nó ở bất cứ đâu</div>
                                <div class="lion-referral-widget-main__share-link-container" style="font-size: 16px;border: 1px solid #dab19d;background-color: #fafafa;text-align: center;padding: 10px 0;">
                                    <div class="lion-referral-widget-main__share-link-url" style="text-transform: none;display: inline-block;font-size: 18px;font-weight:500">{{Auth::check() ? Auth::user()->refferal_code : ''}}</div>
                                        <a class="btn" style="background: #a749ff;color: white;"><i class="fa fa-clipboard" aria-hidden="true" data-code="{{Auth::check() ? Auth::user()->refferal_code : ''}}"></i></a>
                                        <i class="fa fa-check" aria-hidden="true" style="opacity: 0;color:green"></i>
                                   
                                </div>
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
    $('.fa-clipboard').on('click',function(){
        element = $(this).attr('data-code');
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val(element).select();
        document.execCommand("copy");
        $temp.remove();

        $(this).parent('a').next().css('opacity',1);
        setTimeout(() => {
            $(this).parent('a').next().css('opacity',0);
        }, 1000);
    });
</script>
@endsection