<header class="header-area header-in-container clearfix">
        <div class="header-bottom sticky-bar header-res-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-6 col-4">
                        <div class="logo">
                            <a href="{{route('/')}}">
                                <img alt="" src="{{asset('client')}}/img/logo/logo.png">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 d-none d-lg-block">
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    <li><a href="{{route('/')}}">TRANG CHỦ</a>
                                    </li>
                                    <li><a href="{{route('shop')}}">SHOP</a></li>
                                    {{-- <li><a href="shop.html">Collection <i class="fa fa-angle-down"></i></a>
                                        <ul class="submenu">
                                            <li><a href="about.html">about us</a></li>
                                            <li><a href="cart-page.html">cart page</a></li>
                                            <li><a href="checkout.html">checkout </a></li>
                                            <li><a href="wishlist.html">wishlist </a></li>
                                            <li><a href="my-account.html">my account</a></li>
                                            <li><a href="login-register.html">login / register </a></li>
                                            <li><a href="contact.html">contact us </a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"> Pages <i class="fa fa-angle-down"></i></a>
                                        <ul class="submenu">
                                            <li><a href="about.html">about us</a></li>
                                            <li><a href="cart-page.html">cart page</a></li>
                                        </ul>
                                    </li> --}}
                                    <li><a href="{{route('list_post')}}">TIN TỨC</i></a></li>
                                    {{-- <li><a href="about.html"> About </a></li>
                                    <li><a href="contact.html"> Contact</a></li> --}}
                                </ul>
                            </nav>
                        </div>
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
                                                <a href="{{route('product_detail',['slug' => get_product_by_id($id_product)->slug])}}">
                                                    @if (!empty(get_product_by_id($id_product)->image))
                                                    <img style="max-width:100%" src="{{get_product_by_id($id_product)->image}}" alt="">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="{{route('product_detail',['slug' => get_product_by_id($id_product)->slug])}}">{{$item->name}}
                                                        {{!empty(get_attribute_value_by_id($id_value)) ? get_attribute_value_by_id($id_value)->name : '' }}</a>
                                                </h4>
                                                <h6>Số lượng: {{$item->qty}}</h6>
                                                <span>{{ohui_number_format($item->price*$item->qty)}}</span>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <form action="{{route('cart.removeCartHeader',['rowId' => $item->rowId])}}" method="POST">
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
                                        <a href="{{route('account')}}">{{!empty(Auth::user()->account->name) ? Auth::user()->account->name : Auth::user()->email}} </a> /
                                        <a href="{{route('logOut')}}"> Đăng xuất </a>
                                    </li>     
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu-area">
                    <div class="mobile-menu">
                        <nav id="mobile-menu-active">
                            <ul class="menu-overflow">
                                <li><a href="index.html">HOME</a>
                                    <ul>
                                        <li><a href="index.html">home version 1</a></li>
                                        <li><a href="index-2.html">home version 2</a></li>
                                        <li><a href="index-3.html">home version 3</a></li>
                                        <li><a href="index-4.html">home version 4</a></li>
                                        <li><a href="index-5.html">home version 5</a></li>
                                        <li><a href="index-6.html">home version 6</a></li>
                                        <li><a href="index-7.html">home version 7</a></li>
                                        <li><a href="index-8.html">home version 8</a></li>
                                        <li><a href="index-9.html">home version 9</a></li>
                                        <li><a href="index-10.html">home version 10</a></li>
                                    </ul>
                                </li>
                                <li><a href="shop.html">Shop</a>
                                    <ul>
                                        <li><a href="#">shop layout</a>
                                            <ul>
                                                <li><a href="shop.html">standard style</a></li>
                                                <li><a href="shop-filter.html">Grid filter style</a></li>
                                                <li><a href="shop-grid-2-col.html">Grid 2 column</a></li>
                                                <li><a href="shop-no-sidebar.html">Grid No sidebar</a></li>
                                                <li><a href="shop-grid-fw.html">Grid full wide </a></li>
                                                <li><a href="shop-right-sidebar.html">Grid right sidebar</a></li>
                                                <li><a href="shop-list.html">list 1 column box </a></li>
                                                <li><a href="shop-list-fw.html">list 1 column full wide </a></li>
                                                <li><a href="shop-list-fw-2col.html">list 2 column full wide</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">product details</a>
                                            <ul>
                                                <li><a href="product-details.html">tab style 1</a></li>
                                                <li><a href="product-details-2.html">tab style 2</a></li>
                                                <li><a href="product-details-3.html">tab style 3</a></li>
                                                <li><a href="product-details-4.html">sticky style</a></li>
                                                <li><a href="product-details-5.html">gallery style </a></li>
                                                <li><a href="product-details-slider-box.html">Slider style</a></li>
                                                <li><a href="product-details-affiliate.html">affiliate style</a></li>
                                                <li><a href="product-details-6.html">fixed image style </a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="shop.html">Collection</a></li>
                                <li><a href="#">Pages</a>
                                    <ul>
                                        <li><a href="about.html">about us</a></li>
                                        <li><a href="cart-page.html">cart page</a></li>
                                        <li><a href="checkout.html">checkout </a></li>
                                        <li><a href="wishlist.html">wishlist </a></li>
                                        <li><a href="my-account.html">my account</a></li>
                                        <li><a href="login-register.html">login / register </a></li>
                                        <li><a href="contact.html">contact us </a></li>
                                    </ul>
                                </li>
                                <li><a href="blog.html">Blog</a>
                                    <ul>
                                        <li><a href="blog.html">blog standard</a></li>
                                        <li><a href="blog-no-sidebar.html">blog no sidebar</a></li>
                                        <li><a href="blog-right-sidebar.html">blog right sidebar</a></li>
                                        <li><a href="blog-details.html">blog details 1</a></li>
                                        <li><a href="blog-details-2.html">blog details 2</a></li>
                                        <li><a href="blog-details-3.html">blog details 3</a></li>
                                    </ul>
                                </li>
                                <li><a href="about.html">About us</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>