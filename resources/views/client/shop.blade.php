@extends('client.layout.master')
@section('page_title')
Shop
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
<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="{{ url('/') }}">Trang chủ</a>
                </li>
                <li class="active">Cửa hàng </li>
            </ul>
        </div>
    </div>
</div>
<div class="shop-area pt-95 pb-100">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
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
                                <div class="col-xl-4 col-md-6 col-lg-6 col-sm-6">
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
                                                    <a title="Wishlist" class="add_wishlist" product-id="{{$item->id}}" href="javascript:;"><i class="pe-7s-like"></i></a>
                                                </div>
                                                <div class="pro-same-action pro-cart">
                                                    <a title="Xem chi tiết"
                                                        href="{{route('product_detail',['slug' => $item->slug])}}"> Xem
                                                        chi tiết</a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="product-content text-center">
                                            <h3>
                                                <a
                                                    href="{{route('product_detail',['slug' => $item->slug])}}">{{$item->name}}</a>
                                            </h3>
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
            <div class="col-lg-3">
                <div class="sidebar-style mr-30">
                    <div class="sidebar-widget">
                        <h4 class="pro-sidebar-title">Tìm kiếm </h4>
                        <div class="pro-sidebar-search mb-50 mt-25">
                            <form id="filters" class="pro-sidebar-search-form" action="" method="get">
                                <input value="{{ trim(Request::get('search')) }}" form="filters" class="filter"
                                    type="text" name="search" placeholder="tên sản phẩm">
                                <button>
                                    <i class="pe-7s-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    {{-- <div class="sidebar-widget">
                        <h4 class="pro-sidebar-title">Lọc</h4>
                        <div class="sidebar-widget-list mt-30">
                            <ul>
                                <li>
                                    <div class="sidebar-widget-list-left">
                                        <input name="type" type="radio">
                                        <a href="javascript:;">Giảm giá <span>4</span></a>
                                        <span class="checkmark"></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                    {{-- <div class="sidebar-widget mt-45">
                        <h4 class="pro-sidebar-title">Giá </h4>
                        <div class="price-filter mt-10">
                            <div class="price-slider-amount">
                                <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                            </div>
                            <div id="slider-range"></div>
                        </div>
                    </div> --}}

                    <div class="sidebar-widget mt-50">
                        <h4 class="pro-sidebar-title">Danh mục</h4>
                        <div class="sidebar-widget-list mt-20">
                            <ul>
                                <li>
                                    <div class="sidebar-widget-list-left">
                                        <input {{ Request::get('cate') == '' ? 'checked' : '' }} form="filters"
                                            class="filter" name="cate" type="radio" value=""> <a
                                            href="javascript:;">Tất cả sản phẩm
                                            <span style="display:none"></span> </a>
                                        <span class="checkmark"></span>
                                    </div>
                                </li>
                                @foreach ($list_categories as $item)
                                <li>
                                    <div class="sidebar-widget-list-left">
                                        <input {{ Request::get('cate') == $item->slug ? 'checked' : '' }} form="filters"
                                            class="filter" name="cate" type="radio" value="{{ $item->slug }}"> <a
                                            href="javascript:;">{{ $item->name }}
                                            <span style="display:none"></span> </a>
                                        <span class="checkmark"></span>
                                    </div>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>

                    @forelse ($attributes as $attr)
                    <div class="sidebar-widget mt-50">
                        <h4 class="pro-sidebar-title">{{ $attr->name }} </h4>
                        <div class="sidebar-widget-list mt-20">
                            <ul>
                                @forelse ($attr->values as $value)
                                <li>
                                    <div class="sidebar-widget-list-left">
                                        <input {{ Request::get('attr') == $value->slug ? 'checked' : '' }}
                                            form="filters" class="filter" name="attr" type="radio"
                                            value="{{ $value->slug }}"> <a href="javascript:;">{{ $value->name }} <span style="display:none"></span> </a>
                                        <span class="checkmark"></span>
                                    </div>
                                </li>
                                @empty @endforelse
                            </ul>
                        </div>
                    </div>
                    @empty

                    @endforelse


                </div>
            </div>
        </div>
    </div>
</div>





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
