@extends('client.layout.master')
@section('page_title')
Sản phẩm yêu thích
@endsection
@section('content')
<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="{{route('/')}}">Trang chủ</a>
                </li>
                <li class="active"> Sản phẩm yêu thích </li>
            </ul>
        </div>
    </div>
</div>
<div class="cart-main-area pt-90 pb-100">
    <div class="container">
        {{-- <h3 class="cart-page-title">Your cart items</h3> --}}
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="#">
                    <div class="table-content table-responsive cart-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Tên</th>
                                    <th>Giá</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $products = DB::table('wishlists')->where('user_id',Auth::user()->id)->orderBy('id','desc')->limit(5)->get();
                                    
                                @endphp
                                {{-- @foreach ($products as $item1)
                                    @php $item = get_product_by_id($item1->id) @endphp
                                    
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="#"><img src="assets/img/cart/cart-1.png" alt=""></a>
                                        </td>
                                        <td class="product-name"><a href="#">{{!empty($item->name) ? $item->name : '' }}</a></td>
                                        <td class="product-price-cart"><span class="amount">
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
                                        </span></td>
                                    
                                        <td class="product-subtotal">$110.00</td>
                                    
                                    </tr>
                                @endforeach --}}
                                
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection