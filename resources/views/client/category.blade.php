@extends('client.layout.master')
@section('page_title')
Ohui Việt Nam
@endsection
@section('content')
<style>
    .sidebar-widget .sidebar-widget-list ul li .sidebar-widget-list-left input {
        width: 100% !important;
        height: 30px !important;
    }
    .pagination .page-item  .page-link{
        background: white;
        color: #a749ff;

    }
    .pagination .active .page-link{
        background: #a749ff;
        color:white;
        border-color: #ddd;
        cursor: context-menu;
    }


</style>
<form action="" method="get" id="filters"></form>
<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li class="active">Danh mục: {{  $category->name }} </li>
            </ul>
        </div>
    </div>
</div>
<div class="shop-area pt-95 pb-100">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-12">
                <div class="shop-top-bar">
                    <div class="select-shoing-wrap">
                        <div class="shop-select">
                            <select class="filter" id="sort" name="sort" form="filters">
                                <option {{ Request::get('sort') == 'newest'  ? 'selected' : '' }} value="newest">Mới
                                    nhất</option>
                                <option {{ Request::get('sort') == 'az'  ? 'selected' : '' }} value="az">A đến Z
                                </option>
                                <option {{ Request::get('sort') == 'za'  ? 'selected' : '' }} value="za"> Z đến A
                                </option>
                                {{-- <option {{ Request::get('sort') == 'min'  ? 'selected' : '' }} value="min">Rẻ nhất
                                </option>
                                <option {{ Request::get('sort') == 'max'  ? 'selected' : '' }} value="max">Đắt nhất
                                </option> --}}
                            </select>
                        </div>
                        {{-- <p>Showing 1–12 of 20 result</p> --}}
                    </div>
                    {{-- <div style="display:none" class="shop-tab nav">
                        <a class="active" href="#shop-1" data-toggle="tab">
                            <i class="fa fa-table"></i>
                        </a>
                        <a href="#shop-2" data-toggle="tab">
                            <i class="fa fa-list-ul"></i>
                        </a>
                    </div> --}}
                </div>
                <div class="shop-bottom-area mt-35">
                    <div class="tab-content jump">
                        <div id="shop-1" class="tab-pane active">
                            <div class="row">
                                @forelse ($products as $item)
                                <div class="col-xl-3 col-md-4 col-lg-3 col-sm-6">
                                    <div class="product-wrap mb-25 scroll-zoom">
                                        <div class="product-img">
                                            <a href="{{route('product_detail',['slug' => $item->slug])}}">
                                                <img class="default-img" src="{{ $item->image }}" alt="">
                                                <img class="hover-img"
                                                    src="{{!empty($item->galleries) && count($item->galleries) > 0 ? $item->galleries[0]->url : $item->image}}"
                                                    alt="">
                                            </a>
                                            @php
                                            $html = '';
                                            $i = 0;
                                            if ($item->is_simple == -1) {
                                            if (!empty($item->variants[0]->sale_price)) {
                                            $i = $i+20;
                                            $sale = round((($item->variants[0]->sale_price /
                                            $item->variants[0]->regular_price) * 100));
                                            $sale2 = 100 - $sale;
                                            $html .= '<span class="pink"
                                                style="top:'.$i.'px !important">-'.$sale2.'%</span>';
                                            }
                                            }else{
                                            if (!empty($item->sale_price)) {
                                            $i = $i+20;
                                            $sale = round((($item->sale_price / $item->regular_price) * 100));
                                            $sale2 = 100 - $sale;
                                            $html .= '<span class="pink"
                                                style="top:'.$i.'px !important">-'.$sale2.'%</span>';
                                            }
                                            }

                                            @endphp
                                            @php
                                            echo $html;
                                            @endphp
                                            <div class="product-action">
                                                <div class="pro-same-action pro-wishlist">
                                                    <a title="Wishlist" href="#"><i class="pe-7s-like"></i></a>
                                                </div>
                                                <div class="pro-same-action pro-cart">
                                                    <a title="Xem chi tiết"
                                                        href="{{route('product_detail',['slug' => $item->slug])}}"> Xem
                                                        chi tiết</a>
                                                </div>
                                                {{-- <div class="pro-same-action pro-quickview">
                                                    <a title="Quick View" href="#" data-toggle="modal"
                                                        data-target="#exampleModal"><i class="pe-7s-look"></i></a>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="product-content text-center">
                                            <h3>
                                                <a
                                                    href="{{route('product_detail',['slug' => $item->slug])}}">{{$item->name}}</a>
                                            </h3>
                                            {{-- <div class="product-rating">
                                                <i class="fa fa-star-o yellow"></i>
                                                <i class="fa fa-star-o yellow"></i>
                                                <i class="fa fa-star-o yellow"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div> --}}
                                            <div class="product-price">
                                                @if ($item->is_simple == -1)
                                                @if (count($item->variants) > 0)
                                                @if (!empty($item->variants[0]->sale_price))
                                                <span>{{ohui_number_format($item->variants[0]->sale_price)}}</span>
                                                <span
                                                    class="old">{{ohui_number_format($item->variants[0]->regular_price)}}</span>
                                                @else
                                                <span>{{ohui_number_format($item->variants[0]->regular_price)}}</span>
                                                @endif
                                                @endif
                                                @else
                                                @if (!empty($item->sale_price))
                                                <span>{{ohui_number_format($item->sale_price)}}</span>
                                                <span class="old">{{ohui_number_format($item->regular_price)}}</span>
                                                @else
                                                <span>{{ohui_number_format($item->regular_price)}}</span>
                                                @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <h4>Chưa có sản phẩm</h4>
                                @endforelse

                            </div>
                        </div>
                    </div>

                    <div class="//pro-pagination-style text-center mt-30">
                        {{ $products->links() }}
                        {{-- <ul>
                            <li><a class="prev" href="#"><i class="fa fa-angle-double-left"></i></a></li>
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a class="next" href="#"><i class="fa fa-angle-double-right"></i></a></li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <div class="tab-content quickview-big-img">
                            <div id="pro-1" class="tab-pane fade show active">
                                <img src="assets/img/product/quickview-l1.jpg" alt="">
                            </div>
                            <div id="pro-2" class="tab-pane fade">
                                <img src="assets/img/product/quickview-l2.jpg" alt="">
                            </div>
                            <div id="pro-3" class="tab-pane fade">
                                <img src="assets/img/product/quickview-l3.jpg" alt="">
                            </div>
                            <div id="pro-4" class="tab-pane fade">
                                <img src="assets/img/product/quickview-l2.jpg" alt="">
                            </div>
                        </div>
                        <!-- Thumbnail Large Image End -->
                        <!-- Thumbnail Image End -->
                        <div class="quickview-wrap mt-15">
                            <div class="quickview-slide-active owl-carousel nav nav-style-1" role="tablist">
                                <a class="active" data-toggle="tab" href="#pro-1"><img
                                        src="assets/img/product/quickview-s1.jpg" alt=""></a>
                                <a data-toggle="tab" href="#pro-2"><img src="assets/img/product/quickview-s2.jpg"
                                        alt=""></a>
                                <a data-toggle="tab" href="#pro-3"><img src="assets/img/product/quickview-s3.jpg"
                                        alt=""></a>
                                <a data-toggle="tab" href="#pro-4"><img src="assets/img/product/quickview-s2.jpg"
                                        alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div class="product-details-content quickview-content">
                            <h2>Products Name Here</h2>
                            <div class="product-details-price">
                                <span>$18.00 </span>
                                <span class="old">$20.00 </span>
                            </div>
                            <div class="pro-details-rating-wrap">
                                <div class="pro-details-rating">
                                    <i class="fa fa-star-o yellow"></i>
                                    <i class="fa fa-star-o yellow"></i>
                                    <i class="fa fa-star-o yellow"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <span>3 Reviews</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisic elit eiusm tempor incidid ut labore et
                                dolore magna aliqua. Ut enim ad minim venialo quis nostrud exercitation ullamco</p>
                            <div class="pro-details-list">
                                <ul>
                                    <li>- 0.5 mm Dail</li>
                                    <li>- Inspired vector icons</li>
                                    <li>- Very modern style </li>
                                </ul>
                            </div>
                            <div class="pro-details-size-color">
                                <div class="pro-details-color-wrap">
                                    <span>Color</span>
                                    <div class="pro-details-color-content">
                                        <ul>
                                            <li class="blue"></li>
                                            <li class="maroon active"></li>
                                            <li class="gray"></li>
                                            <li class="green"></li>
                                            <li class="yellow"></li>
                                            <li class="white"></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="pro-details-size">
                                    <span>Size</span>
                                    <div class="pro-details-size-content">
                                        <ul>
                                            <li><a href="#">s</a></li>
                                            <li><a href="#">m</a></li>
                                            <li><a href="#">l</a></li>
                                            <li><a href="#">xl</a></li>
                                            <li><a href="#">xxl</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-details-quality">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                                </div>
                                <div class="pro-details-cart btn-hover">
                                    <a href="#">Add To Cart</a>
                                </div>
                                <div class="pro-details-wishlist">
                                    <a href="#"><i class="fa fa-heart-o"></i></a>
                                </div>
                                <div class="pro-details-compare">
                                    <a href="#"><i class="pe-7s-shuffle"></i></a>
                                </div>
                            </div>
                            <div class="pro-details-meta">
                                <span>Categories :</span>
                                <ul>
                                    <li><a href="#">Minimal,</a></li>
                                    <li><a href="#">Furniture,</a></li>
                                    <li><a href="#">Electronic</a></li>
                                </ul>
                            </div>
                            <div class="pro-details-meta">
                                <span>Tag :</span>
                                <ul>
                                    <li><a href="#">Fashion, </a></li>
                                    <li><a href="#">Furniture,</a></li>
                                    <li><a href="#">Electronic</a></li>
                                </ul>
                            </div>
                            <div class="pro-details-social">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->


@endsection

@section('js')
<script>


</script>
<script>
    $(function () {
        $('body').on('change', '.filter', function (e) {
            e.preventDefault();
            $('body').find('#filters').submit();
        })
    })

</script>
@endsection
