@extends('client.layout.master')
@section('page_title')
Cảm ơn
@endsection
@section('content')
<style>
    .sidebar-widget .sidebar-widget-list ul li .sidebar-widget-list-left input {
        width: 100% !important;
        height: 30px !important;
    }

    .pagination .page-item .page-link {
        background: white;
        color: #a749ff;

    }

    .pagination .active .page-link {
        background: #a749ff;
        color: white;
        border-color: #ddd;
        cursor: context-menu;
    }
</style>
<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="{{ url('/') }}">Trang chủ</a>
                </li>
                <li class="active">Cảm ơn</li>
            </ul>
        </div>
    </div>
</div>
<div class="shop-area pt-95 pb-100">
    <div class="container">
        <div class="dathang product">
            
            <div class="mycartPage">
                <div class="container">
                    <div class="wrap_cart_suscess">
                        <div class="text-center">
                            <h2 class="titleThank"><i class="fa fa-check-circle"></i>&nbsp;QUÝ KHÁCH ĐÃ ĐẶT HÀNG THÀNH CÔNG</h2>
                            <h3 class="thankyouText">
                                Cảm ơn quý khách đã đặt mua sản phẩm của chúng tôi !
                                <br>
                                Đơn hàng của quý khách sẽ được nhân viên kiểm tra và giao hàng trong thời gian sớm nhất.</h3>
                            <div class="flextBet thankyouButton">
                                <a href="{{ url('/') }}" class="btn btnBackBuy btn-lg" rel="nofollow">
                                    Tiếp tục mua hàng&nbsp;<i class="fa fa-angle-double-right"></i>
                                </a>
                            </div>
                        </div>
        
                    </div>
                </div>
        
            </div>
        </div>
    </div>
</div>



@endsection