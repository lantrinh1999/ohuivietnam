@extends('client.layout.master')
@section('page_title')
    Ohui Việt Nam
@endsection
@section('content')
@php
    $slides = get_option('slide');
    if(!empty($slides)){
        $slides = json_decode($slides);
    }
    //dd($slides);
@endphp
<div class="slider-area">
    <div class="slider-active owl-carousel nav-style-1">
        <div class="single-slider slider-height-1 bg-purple">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                        <div class="slider-content slider-animated-1">
                            <h3 class="animated">{{ !empty($slides[0]->title) ? $slides[0]->title : '' }}</h3>
                            <h1 class="animated">
                                @php
                                    echo !empty($slides[0]->content) ? preg_replace('%<p(.*?)>|</p>%s','',$slides[0]->content) : '';
                                @endphp
                            </h1>

                            @if (!empty($slides[0]->link) && $slides[0]->link != '#' && filter_var($slides[0]->link, FILTER_VALIDATE_URL) !== false)
                            <div class="slider-btn btn-hover">
                                <a class="animated" href="{{ $slides[0]->link }}">Xem thêm</a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                        <div class="slider-single-img slider-animated-1">
                            <img class="animated" style="width: 730px;height: 600px;margin-left: 50px;padding-bottom: 30px;padding-top: 30px" src="{{ $slides[0]->image }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="suppoer-area pt-100 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="support-wrap mb-30 support-1">
                    <div class="support-icon">
                        <img class="animated" src="{{asset('client')}}/img/icon-img/support-1.png" alt="">
                    </div>
                    <div class="support-content">
                        <h5>Miễn phí giao hàng</h5>
                        <p>Miễn phí giao hàng cho tất cả đơn hàng</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="support-wrap mb-30 support-2">
                    <div class="support-icon">
                        <img class="animated" src="{{asset('client')}}/img/icon-img/support-2.png" alt="">
                    </div>
                    <div class="support-content">
                        <h5>Hỗ trợ 24/7</h5>
                        <p>Hỗ trợ mọi lúc</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="support-wrap mb-30 support-3">
                    <div class="support-icon">
                        <img class="animated" src="{{asset('client')}}/img/icon-img/support-3.png" alt="">
                    </div>
                    <div class="support-content">
                        <h5>Hoàn tiền</h5>
                        <p>Nếu phát hiện hàng giả</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="support-wrap mb-30 support-4">
                    <div class="support-icon">
                        <img class="animated" src="{{asset('client')}}/img/icon-img/support-4.png" alt="">
                    </div>
                    <div class="support-content">
                        <h5>Tích điểm</h5>
                        <p>Tích điểm khi mua hàng</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-area pb-60">
    <div class="container">
        <div class="section-title text-center">
            <h2>Sản phẩm của chúng tôi</h2>
        </div>
        <div class="product-tab-list nav pt-30 pb-55 text-center">
             <a href="#product-1" data-toggle="tab" >
                <h4>Sản phẩm mới</h4>
            </a>
             <a class="active" href="#product-2" data-toggle="tab">
                <h4>Sản phẩm</h4>
            </a>
             <a href="#product-3" data-toggle="tab">
                <h4>Sản phẩm giảm giá</h4>
            </a>
        </div>
        <div class="tab-content jump">
            <div class="tab-pane" id="product-1">
                <div class="row">
                    @if (count($productsNew) > 0 && !empty($productsNew))
                    @foreach ($productsNew as $item)
                        <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                            <div class="product-wrap mb-25 scroll-zoom">
                                <div class="product-img">
                                    <a href="{{route('product_detail',['slug' => $item->slug])}}">
                                    <img class="default-img" src="{{$item->image}}" alt="">
                                        <img class="hover-img" src="{{!empty($item->galleries) && count($item->galleries) > 0 ? $item->galleries[0]->url : $item->image}}" alt="">
                                    </a>

                                    <span class="blue">Mới</span>
                                    @if ($item->is_simple == -1)
                                        @if (!empty($item->variants[0]->sale_price))
                                        @php
                                            $sale = round((($item->variants[0]->sale_price / $item->variants[0]->regular_price) * 100));
                                            $sale2 = 100 - $sale;
                                        @endphp
                                            <span class="pink">-{{$sale2}}%</span>
                                        @endif
                                    @else
                                        @if (!empty($item->sale_price))
                                        @php
                                            $sale = round((($item->sale_price / $item->regular_price) * 100));
                                            $sale2 = 100 - $sale;
                                        @endphp
                                            <span class="pink">-{{$sale2}}%</span>
                                        @endif
                                    @endif


                                    <div class="product-action">
                                        <div class="pro-same-action pro-wishlist">
                                            <a title="Wishlist" class="add_wishlist" product-id="{{$item->id}}" href="javascript:;"><i class="pe-7s-like"></i></a>
                                        </div>
                                        <div class="pro-same-action pro-cart">
                                            <a title="Xem chi tiết" href="{{route('product_detail',['slug' => $item->slug])}}"> Xem chi tiết</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h3><a href="{{route('product_detail',['slug' => $item->slug])}}">{{$item->name}}</a></h3>
                                    <div class="product-rating">
                                        @php
                                            if(!empty(DB::table('comments')->where('product_id',$item->id)->avg('rate_star'))){
                                                $rate_star = round(DB::table('comments')->where('product_id',$item->id)->avg('rate_star'));
                                            }else{
                                                $rate_star = 5;
                                            }
                                        @endphp
                                        @for($i = 0 ; $i < 5 ; $i++)
                                            @if ($i < $rate_star)
                                                <i class="fa fa-star-o yellow"></i></i>
                                            @else
                                                <i class="fa fa-star-o"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <div class="product-price">
                                        @if ($item->is_simple == -1)
                                            @if (count($item->variants) > 0)
                                            @if (!empty($item->variants[0]->sale_price))
                                                <span>{{ohui_number_format($item->variants[0]->sale_price)}}</span>
                                                <span class="old">{{ohui_number_format($item->variants[0]->regular_price)}}</span>
                                            @else
                                                <span>{{ohui_number_format($item->variants[0]->regular_price)}}</span>
                                            @endif
                                            @endif
                                        @else
                                            @if (!empty($item->sale_price))
                                                <span >{{ohui_number_format($item->sale_price)}}</span>
                                                <span class="old">{{ohui_number_format($item->regular_price)}}</span>
                                            @else
                                                <span>{{ohui_number_format($item->regular_price)}}</span>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @endif


                </div>
            </div>
            <div class="tab-pane active" id="product-2">
                <div class="row">
                    @if (count($productsRandom) > 0 && !empty($productsRandom))
                    @foreach ($productsRandom as $item)
                    <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                        <div class="product-wrap mb-25 scroll-zoom">
                            <div class="product-img">
                                <a href="{{route('product_detail',['slug' => $item->slug])}}">
                                    <img class="default-img" src="{{ $item->image }}" alt="">
                                    <img class="hover-img" src="{{!empty($item->galleries) && count($item->galleries) > 0 ? $item->galleries[0]->url : $item->image}}" alt="">
                                </a>
                                @php
                                $html = '';
                                $date=date_create($item->created_at);
                                $dateFormat = date_format($date,"Y/m/d");
                                $dateCurrent = date("Y/m/d");
                                $i = 0;
                                if ($dateFormat == $dateCurrent) {
                                    $i = $i+20;
                                    $html .= '<span class="blue" style="top:'.$i.'px !important">Mới</span>';
                                }
                                if ($item->is_simple == -1) {
                                    if (!empty($item->variants[0]->sale_price)) {
                                        $i = $i+20;
                                        $sale = round((($item->variants[0]->sale_price / $item->variants[0]->regular_price) * 100));
                                        $sale2 = 100 - $sale;
                                        $html .= '<span class="pink" style="top:'.$i.'px !important">-'.$sale2.'%</span>';
                                    }
                                }else{
                                    if (!empty($item->sale_price)) {
                                        $i = $i+20;
                                        $sale = round((($item->sale_price / $item->regular_price) * 100));
                                        $sale2 = 100 - $sale;
                                        $html .= '<span class="pink" style="top:'.$i.'px !important">-'.$sale2.'%</span>';
                                    }
                                }

                                @endphp
                                    @php
                                        echo $html;
                                    @endphp
                                <div class="product-action">
                                    <div class="pro-same-action pro-wishlist">
                                    <a title="Wishlist" class="add_wishlist" product-id="{{$item->id}}" href="javascript:;"><i class="pe-7s-like"></i></a>
                                    </div>
                                    <div class="pro-same-action pro-cart">
                                        <a title="Xem chi tiết" href="{{route('product_detail',['slug' => $item->slug])}}"> Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content text-center">
                                <h3><a href="{{route('product_detail',['slug' => $item->slug])}}">{{$item->name}}</a></h3>
                                <div class="product-rating">
                                    @php
                                        if(!empty(DB::table('comments')->where('product_id',$item->id)->avg('rate_star'))){
                                            $rate_star = round(DB::table('comments')->where('product_id',$item->id)->avg('rate_star'));
                                        }else{
                                            $rate_star = 5;
                                        }
                                    @endphp
                                    @for($i = 0 ; $i < 5 ; $i++)
                                        @if ($i < $rate_star)
                                            <i class="fa fa-star-o yellow"></i></i>
                                        @else
                                            <i class="fa fa-star-o"></i>
                                        @endif
                                    @endfor
                                </div>
                                <div class="product-price">
                                    @if ($item->is_simple == -1)
                                            @if (count($item->variants) > 0)
                                            @if (!empty($item->variants[0]->sale_price))
                                                <span>{{ohui_number_format($item->variants[0]->sale_price)}}</span>
                                                <span class="old">{{ohui_number_format($item->variants[0]->regular_price)}}</span>
                                            @else
                                                <span>{{ohui_number_format($item->variants[0]->regular_price)}}</span>
                                            @endif
                                            @endif
                                        @else
                                            @if (!empty($item->sale_price))
                                                <span >{{ohui_number_format($item->sale_price)}}</span>
                                                <span class="old">{{ohui_number_format($item->regular_price)}}</span>
                                            @else
                                                <span>{{ohui_number_format($item->regular_price)}}</span>
                                            @endif
                                        @endif

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="tab-pane" id="product-3">
                <div class="row">
                    @if (count($productsNotNull) > 0 && !empty($productsNotNull))
                    @foreach ($productsNotNull as $item)
                    <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6">
                        <div class="product-wrap mb-25 scroll-zoom">
                            <div class="product-img">
                                <a href="{{route('product_detail',['slug' => $item->slug])}}">
                                    <img class="default-img" src="{{$item->image}}" alt="">
                                    <img class="hover-img" src="{{!empty($item->galleries) && count($item->galleries) > 0 ? $item->galleries[0]->url : $item->image}}" alt="">
                                </a>
                                @php
                                $html = '';
                                $date=date_create($item->created_at);
                                $dateFormat = date_format($date,"Y/m/d");
                                $dateCurrent = date("Y/m/d");
                                $i = 0;
                                if ($dateFormat == $dateCurrent) {
                                    $i = $i+20;
                                    $html .= '<span class="blue" style="top:'.$i.' !important">Mới</span>';
                                }

                                if ($item->is_simple == -1) {
                                    if (!empty($item->variants[0]->sale_price)) {
                                        $i = $i+20;
                                        $sale = round((($item->variants[0]->sale_price / $item->variants[0]->regular_price) * 100));
                                        $sale2 = 100 - $sale;
                                        $html .= '<span class="pink" style="top:'.$i.'px !important">-'.$sale2.'%</span>';
                                    }
                                }else{
                                    if (!empty($item->sale_price)) {
                                        $i = $i+20;
                                        $sale = round((($item->sale_price / $item->regular_price) * 100));
                                        $sale2 = 100 - $sale;
                                        $html .= '<span class="pink" style="top:'.$i.'px !important">-'.$sale2.'%</span>';
                                    }
                                }
                                @endphp
                                @php
                                    echo $html;
                                @endphp
                                <div class="product-action">
                                    <div class="pro-same-action pro-wishlist">
                                        <a title="Wishlist" class="add_wishlist" product-id="{{$item->id}}" href="javascript:;"><i class="pe-7s-like"></i></a>
                                    </div>
                                    <div class="pro-same-action pro-cart">
                                        <a title="Xem chi tiết" href="{{route('product_detail',['slug' => $item->slug])}}"> Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content text-center">
                                <h3><a href="{{route('product_detail',['slug' => $item->slug])}}">{{$item->name}}</a></h3>
                                <div class="product-rating">
                                    @php
                                        if(!empty(DB::table('comments')->where('product_id',$item->id)->avg('rate_star'))){
                                            $rate_star = round(DB::table('comments')->where('product_id',$item->id)->avg('rate_star'));
                                        }else{
                                            $rate_star = 5;
                                        }
                                    @endphp
                                    @for($i = 0 ; $i < 5 ; $i++)
                                        @if ($i < $rate_star)
                                            <i class="fa fa-star-o yellow"></i></i>
                                        @else
                                            <i class="fa fa-star-o"></i>
                                        @endif
                                    @endfor
                                </div>
                                <div class="product-price">
                                    @if ($item->is_simple == -1)
                                            @if (count($item->variants) > 0)
                                            @if (!empty($item->variants[0]->sale_price))
                                                <span>{{ohui_number_format($item->variants[0]->sale_price)}}</span>
                                                <span class="old">{{ohui_number_format($item->variants[0]->regular_price)}}</span>
                                            @else
                                                <span>{{ohui_number_format($item->variants[0]->regular_price)}}</span>
                                            @endif
                                            @endif
                                        @else
                                            @if (!empty($item->sale_price))
                                                <span >{{ohui_number_format($item->sale_price)}}</span>
                                                <span class="old">{{ohui_number_format($item->regular_price)}}</span>
                                            @else
                                                <span>{{ohui_number_format($item->regular_price)}}</span>
                                            @endif
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blog-area pb-55">
    <div class="container">
        <div class="section-title text-center mb-55">
            <h2>Tin tức</h2>
        </div>
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog-wrap mb-30 scroll-zoom">
                        <div class="blog-img">
                            <a href="{{route('detail_post',['slug'=> $post->slug])}}"><img src="{{$post->image}}" alt=""></a>
                            {{-- <span class="purple">Lifestyle</span> --}}
                        </div>
                        <div class="blog-content-wrap">
                            <div class="blog-content text-center">

                                @php
                                $name_post = '';
                                if (strlen($post->name) > 65) {
                                    $name_post = substr($post->name,0,65).'...';
                                }else{
                                    $name_post = $post->name;
                                }

                                @endphp

                                <h3><a href="{{route('detail_post',['slug'=> $post->slug])}}">{{$name_post}}</a></h3>
                                <span>Admin</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


@endsection
