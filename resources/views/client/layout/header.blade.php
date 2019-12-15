<header class="header-area header-in-container clearfix">
    <div class="header-bottom sticky-bar header-res-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-6 col-4">
                    <div class="logo">
                        <a href="{{route('/')}}">
                            <img alt=""
                                src="{{ !empty(get_option('logo')) ? get_option('logo') : asset('client/img/logo/logo.png') }}">
                        </a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 d-none d-lg-block">
                    <div class="main-menu">
                        @include('client.layout.menu.main-menu')
                    </div>g
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-8">
                    <div class="header-right-wrap">
                        @if (Auth::check())
                        <div class="same-style header-wishlist">
                            <a href="{{route('wishlist')}}"><i class="pe-7s-like"></i></a>
                        </div>
                        @endif
                        <div class="same-style cart-wrap">
                            <button class="icon-cart">
                                <i class="pe-7s-shopbag"></i>
                                <span class="count-style">@php
                                    echo Cart::count();
                                    @endphp</span>
                            </button>
                            <div class="shopping-cart-content">
                                @if (Cart::count() != 0)
                                <ul>
                                    @php
                                    $carts = Cart::content();
                                    @endphp
                                    @foreach ($carts as $item)
                                    @php
                                    $id_arr = explode('_',$item->id);
                                    $id_product = $id_arr[0];
                                    $id_value = $id_arr[1];
                                    @endphp
                                    <li class="single-shopping-cart">
                                        <div class="shopping-cart-img">
                                            <a
                                                href="{{route('product_detail',['slug' => get_product_by_id($id_product)->slug])}}">
                                                @if (!empty(get_product_by_id($id_product)->image))
                                                <img style="max-width:100%"
                                                    src="{{get_product_by_id($id_product)->image}}" alt="">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a
                                                    href="{{route('product_detail',['slug' => get_product_by_id($id_product)->slug])}}">{{$item->name}}
                                                    {{!empty(get_attribute_value_by_id($id_value)) ? get_attribute_value_by_id($id_value)->name : '' }}</a>
                                            </h4>
                                            <h6>Số lượng: {{$item->qty}}</h6>
                                            <span>{{ohui_number_format($item->price*$item->qty)}}</span>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <form action="{{route('cart.removeCartHeader',['rowId' => $item->rowId])}}"
                                                method="POST">
                                                @csrf
                                                <a class="clickDeleteHeader" style="cursor:pointer"><i
                                                        class="fa fa-times-circle"></i></a>
                                            </form>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="shopping-cart-total">

                                    <h4>Tổng : <span class="shop-total">{{Cart::subtotal(0, '', ',')}}đ</span></h4>
                                </div>
                                <div class="shopping-cart-btn btn-hover text-center">
                                    <a class="default-btn" href="{{route('cart')}}">Xem giỏ hàng</a>
                                    <a class="default-btn" href="{{route('checkout')}}">Thanh toán</a>
                                </div>
                                @else
                                Không có sản phẩm trong giỏ hàng
                                @endif
                            </div>
                        </div>
                        <div class="same-style account-satting">
                            <a class="account-satting-active" href="#">
                                @if (!Auth::check())
                                <li>
                                    <a href="{{route('login')}}"> Đăng nhập </a> /
                                    <a href="{{route('register')}}"> Đăng ký </a>
                                </li>
                                @else
                                <li>
                                    <a href="{{route('account')}}">{{!empty(Auth::user()->account->name) ? Auth::user()->account->name : Auth::user()->email}}
                                    </a> /
                                    <a href="{{route('logOut')}}"> Đăng xuất </a>
                                </li>
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-area">
                @include('client.layout.menu.mobile-menu')
            </div>
        </div>
    </div>
</header>
