@extends('client.layout.master')
@section('page_title')
 {{$product->name}}
@endsection
@section('css')
    <style>
    .rate {
    float: left;
    height: 46px;
    padding: 0 10px;
    }
    .rate:not(:checked) > input {
        position:absolute;
        top:-9999px;
    }
    .rate:not(:checked) > label {
        float:right;
        width:1em;
        overflow:hidden;
        white-space:nowrap;
        cursor:pointer;
        font-size:30px;
        color:#ccc;
    }
    .rate:not(:checked) > label:before {
        content: '★ ';
    }
    .rate > input:checked ~ label {
        color: #ffc700;    
    }
    .rate:not(:checked) > label:hover,
    .rate:not(:checked) > label:hover ~ label {
        color: #deb217;  
    }
    .rate > input:checked + label:hover,
    .rate > input:checked + label:hover ~ label,
    .rate > input:checked ~ label:hover,
    .rate > input:checked ~ label:hover ~ label,
    .rate > label:hover ~ input:checked ~ label {
        color: #c59b08;
    }
    .add_wishlist.checked{
        color: #a749ff !important;
    }
    </style>
@endsection
@section('content')
<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="{{route('/')}}">Trang chủ</a>
                </li>
                <li class="active">{{$product->name}}</li>
            </ul>
        </div>
    </div>
</div>
<div class="shop-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-7 col-md-12">
                <div class="product-details-img mr-20 product-details-tab">
                    <div id="gallery" class="product-dec-slider-2">
                        <a data-image="{{$product->image}}" data-zoom-image="{{$product->image}}">
                            <img src="{{$product->image}}" alt="">
                        </a>

                        @if (count($product->galleries) > 0 && !empty($product->galleries))
                            @foreach ($product->galleries as $item)
                                <a data-image="{{$item->url}}"
                                    data-zoom-image="{{$item->url}}">
                                    <img src="{{$item->url}}" alt="">
                                </a>
                            @endforeach
                        @endif
                    </div>
                    <div class="zoompro-wrap zoompro-2 pl-20">
                        <div class="zoompro-border zoompro-span">
                            <img class="zoompro" src="{{$product->image}}"
                                data-zoom-image="{{$product->image}}" alt="" />
                            @if ($product->is_simple == -1)
                                @if (!empty($item->variants[0]->sale_price))
                                @php
                                    $sale = round((($item->variants[0]->sale_price / $item->variants[0]->regular_price) * 100));
                                    $sale2 = 100 - $sale;
                                @endphp
                                    <span>-{{$sale2}}%</span>
                                @endif
                            @else
                                @if (!empty($item->sale_price))
                                @php
                                    $sale = round((($item->sale_price / $item->regular_price) * 100));
                                    $sale2 = 100 - $sale;
                                @endphp
                                    <span>-{{$sale2}}%</span>
                                @endif
                            @endif
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-lg-5 col-md-12">
            <div class="product-details-content" url="{{route('product_detail',['slug' => $product->slug])}}">
                    <h2>{{$product->name}}</h2>
                    <div class="product-details-price">
                        @if ($product->is_simple == -1)
                            @if (!empty($product->variants[0]->sale_price))
                                <span class="price_get" value-price="{{$product->variants[0]->sale_price}}">{{ohui_number_format($product->variants[0]->sale_price)}}</span>
                                <span class="old">{{ohui_number_format($product->variants[0]->regular_price)}}</span>
                            @else
                                <span class="price_get" value-price="{{$product->variants[0]->regular_price}}">{{ohui_number_format($product->variants[0]->regular_price)}}</span>
                            @endif
                        @else
                            @if (!empty($product->sale_price))
                                <span class="price_get" value-price="{{$product->sale_price}}">{{ohui_number_format($product->sale_price)}}</span>
                                <span class="old">{{ohui_number_format($product->regular_price)}}</span>
                            @else
                                <span class="price_get" value-price="{{$product->regular_price}}">{{ohui_number_format($product->regular_price)}}</span>
                            @endif
                        @endif      
                    </div>
                    <div class="pro-details-rating-wrap">
                        <div class="pro-details-rating">
                            @php
                                if(!empty(DB::table('comments')->where('product_id',$product->id)->avg('rate_star'))){
                                    $rate_star = round(DB::table('comments')->where('product_id',$product->id)->avg('rate_star'));
                                }else{
                                    $rate_star = 5;
                                }
                            @endphp
                            @for($i = 0 ; $i < $rate_star ; $i++) <i class="fa fa-star-o yellow"></i></i>  @endfor
                           
                        </div>
                        <span><a>{{DB::table('comments')->where('product_id',$product->id)->count()}} Đánh giá</a></span>
                    </div>
                    <div>
                       @php echo !empty($product->description) ? $product->description : 'Chưa cập nhập' @endphp
                    </div>
                    <div class="pro-details-size-color">
                        <div class="pro-details-color-wrap">
                            @if ($product->is_simple == -1)
                            <span>{{$product->variants[0]->attribute->name}}</span>
                            <div class="pro-details-color-content">
                                <ul>
                                    @foreach ($product->variants as $key => $variant)
                                    <li id-value="{{$variant->value->id}}" class="{{$key == 0 ? 'active' : ''}}"><a class="btn change_value">{{$variant->value->name}}</a></li>
                                    @endforeach  
                                </ul>
                            </div>
                            @endif
                            
                        </div>
                    </div>
                    <div class="pro-details-quality">
                        <div class="cart-plus-minus">
                            <input class="cart-plus-minus-box" type="text" name="qtybutton"  value="1">
                        </div>
                        <div class="pro-details-wishlist">
                            @php
                              if (Auth::check()) {
                                  $check = DB::table('wishlists')->where(['user_id' => Auth::user()->id,'product_id' => $product->id])->first();
                                  if ($check) {
                                      $scope = 'checked';
                                  }else{
                                      $scope = '';
                                  }
                              }else{
                                  $scope = '';
                              }
                            @endphp
                            <a class="add_wishlist {{$scope}}" product-id="{{$product->id}}" href="javascript:;"><i class="fa fa-heart"></i></a>
                        </div>
                        <!-- <div class="pro-details-compare">
                            <a href="#"><i class="pe-7s-shuffle"></i></a>
                        </div> -->
                    </div>
                    <div class="pro-details-meta pro-details-quality">
                        @php
                            if ($product->is_simple == -1) {
                                $id_value = $product->variants[0]->value->id;
                            }else{
                                $id_value = 0;
                            }
                        @endphp
                        <div class="pro-details-cart btn-hover add_to_cart" id="{{$product->id}}" qty="1" id-value="{{$id_value}}">
                            <a style="cursor: pointer;">Thêm vào giỏ hàng</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="description-review-area pb-90">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav">
                <!-- <a data-toggle="tab" href="#des-details1">Additional information</a> -->
                <a class="active" data-toggle="tab" href="#des-details2">Đánh giá chi tiết</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details2" class="tab-pane active">
                    <div class="product-description-wrapper">
                        @php echo !empty($product->content) ? $product->content : 'Chưa cập nhập' @endphp
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="description-review-area pb-90">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav">
                <!-- <a data-toggle="tab" href="#des-details1">Additional information</a> -->
                <a class="active" data-toggle="tab" href="#des-details2">Bình luận</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div class="row">
                    @if(Auth::check())
                    <div class="col-lg-12" style="border-bottom:1px solid #d7d7d7">
                            <div class="ratting-form-wrapper" style="padding-bottom: 20px;margin-bottom: 40px;">
                                <div class="ratting-form">
                                    <form id="submit_comment">
                                        <div class="star-box">
                                            <div class="rate">
                                                <input type="radio" id="star5" name="rate" value="5"/>
                                                <label for="star5" title="5 sao">5 stars</label>
                                                <input type="radio" id="star4" name="rate" value="4"/>
                                                <label for="star4" title="4 sao">4 stars</label>
                                                <input type="radio" id="star3" name="rate" value="3"/>
                                                <label for="star3" title="3 sao">3 stars</label>
                                                <input type="radio" id="star2" name="rate" value="2"/>
                                                <label for="star2" title="2 sao">2 stars</label>
                                                <input type="radio" id="star1" name="rate" value="1"/>
                                                <label for="star1" title="1 sao">1 star</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            
                                            <div class="col-md-12">
                                                <div class="rating-form-style mb-10">
                                                    <input name="email" style="height:40px;width:100%" readonly value="{{Auth::check() ? Auth::user()->email : ''}}" placeholder="Email" type="email" >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="rating-form-style form-submit">
                                                    <textarea name="content" cols="3"  placeholder="Nội dung"></textarea>
                                                    <input type="submit" value="Lưu">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    <div class="col-lg-12" style="margin-top: 20px;">
                        <div class="review-wrapper">
                            @if (count($comments) > 0)
                                @foreach ($comments as $item)
                                    <div class="single-review">
                                        <div class="review-img">
                                    
                                            <img style="width:100%"
                                                src="{{!empty($item->user->avatar)  ? $item->user->avatar : asset('client/img/user-default.jpg')}}" alt="">
                                        </div>
                                        <div class="review-content" style="width: 100%;">
                                            <div class="review-top-wrap">
                                                <div class="review-left">
                                                    <div class="review-name">
                                                        <h4>{{$item->user->email}}</h4>
                                                    </div>
                                                    <div class="review-rating">
                                                        @for($i = 0 ; $i < $item->rate_star ; $i++)
                                                            <i class="fa fa-star"></i>
                                                            @endfor
                                                    </div>
                                                </div>
                                                <div class="pull-right">
                                                    <a><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans() ?></a>
                                                </div>
                                            </div>
                                            <div class="review-bottom">
                                                <p>
                                                    {{$item->content}}.
                                                </p>                        
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div style="width:100%;text-align: center;">
                                    <a class="loadmore" total-current="5" style="width: auto;
                                                                                padding: 12px 50px;
                                                                                font-weight: 500;
                                                                                text-transform: uppercase;
                                                                                height: auto;
                                                                                background-color: #a749ff;
                                                                                color: #fff;
                                                                                border: 1px solid #a749ff;">XEM THÊM</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="clear: both;"></div>
<div class="related-product-area pb-95">
    <div class="container">
        <div class="section-title text-center mb-50">
            <h2>Sản phẩm liên quan</h2>
        </div>
        <div class="related-product-active owl-carousel">
            @if (count($products_relate) > 0 && !empty($products_relate))
                @foreach ($products_relate as $item)
                    <div class="product-wrap">
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
                @endforeach
            @endif            
        </div>
    </div>
</div>


<!-- Modal end -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Thành công: Bạn đã thêm <a class="name_product" href=""> </a> vào giỏ hàng!
            </div>
            <div class="modal-footer" style="justify-content: space-between !important;">
                <button type="button" class="btn btn-danger continue" >TIẾP TỤC MUA HÀNG</button>
                <button type="button" class="btn btn-danger payment">THANH TOÁN</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@if ($product->is_simple == -1)
    <script>
        $(function() {
            product = `<?php echo $json_product  ?>`;
            convert_object_js = JSON.parse(product);
            if (convert_object_js.length > 0) {
                $(document).on('click','.change_value',function () {
                    id = $(this).parent('li').attr('id-value');
                    $(this).parent('li').addClass('active').siblings().removeClass('active');
                    $('.add_to_cart').attr('id-value',id);
                    value_current = convert_object_js.filter(function (convert_object_js) { return convert_object_js.value_id == id });
                    if(value_current[0].sale_price == null){
                        console.log('ko khuyen mai');
                        regular_price = value_current[0].regular_price.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                        regular_price = regular_price.replace('.00', "đ");
                        
                        $('.price_get').attr('value-price',value_current[0].regular_price);
                        $('.product-details-price').find('span:first').html(regular_price);
                    }else{
                        sale_price = value_current[0].sale_price.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                        sale_price = sale_price.replace('.00', "đ");
                        
                        regular_price = value_current[0].regular_price.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                        regular_price = regular_price.replace('.00', "đ");

                        $('.price_get').attr('value-price',value_current[0].sale_price);
                        $('.product-details-price').find('span:first').html(sale_price);
                        $('.product-details-price').find('span:last').html(regular_price);
                    };
            
                })
            }
        });
    </script>
@endif
    <script>
        
        $(function() {
            $('input[name=qtybutton]').on('change',function(){
                value_current = $(this).val();
                if (value_current < 1) {
                    $(this).val(1);
                };

                new_var = $(this).val();
                $('.add_to_cart').attr('qty',new_var);
            })
            $('.dec.qtybutton').on('click',function(){
                value_current = $(this).next().val();
                if (value_current < 1) {
                    $(this).next().val(1);
                };
                new_var = $(this).next().val();
                $('.add_to_cart').attr('qty',new_var);
            });

            $('.inc.qtybutton').on('click',function(){
                value_current = $(this).prev().val();
                $('.add_to_cart').attr('qty',value_current);
            })
        });

        
        $(function(){
            name_product = $('.product-details-content').find('h2').html();
            url = $('.product-details-content').attr('url');
            $('.add_to_cart').on('click',function(e){
                e.preventDefault();
                var id = $(this).attr('id');
                var qty = $(this).attr('qty');
                var id_value = $(this).attr('id-value');
                var price = $('.price_get').attr('value-price');
                $.ajax({
                type:'POST',
                url:`{{route('cart.addCart')}}`,
                data:{
                    id:id,
                    qty:qty,
                    id_value:id_value,
                    price : price,
                    _token : `{{csrf_token()}}`,
                    },
                success:function(data){
                    if (data.errors == false) {
                        $('#exampleModal1').find('.name_product').html(name_product);
                        $('#exampleModal1').find('.name_product').attr('href',url);
                        $('#exampleModal1').modal('show');
                        $('#exampleModal1').find('.continue').on('click',function(){
                            window.location.reload();
                        });

                        $('#exampleModal1').find('.payment').on('click',function(){
                            window.location.href = `{{route('cart')}}`;
                        });
                    }
                }
                });
            })
        });
        // comment
        $(function(){
            $('#submit_comment').on('submit',function(e){
                var content = $(this).find('textarea[name=content]').val();
                var star = $(this).find('input[name=rate]:checked').val();
                e.preventDefault();
                $.ajax({
                    type:'POST',
                    url:`{{route('send_comment')}}`,
                    data:{
                        user_id : `{{Auth::check() ? Auth::user()->id : ''}}`,
                        product_id : `{{$product->id}}`,
                        star : star,
                        content : content,
                        _token : `{{csrf_token()}}`,
                        },
                    success:function(data){
                        if(data.errors){
                            html = '';
                            if (typeof data.messages.star != 'undefined') {
                                html += `<li>${data.messages.star[0]}</li>`;
                            }
                            if (typeof data.messages.content != 'undefined') {
                                html += `<li>${data.messages.content[0]}</li>`;
                            }
                            Swal.fire({
                                icon: 'error',
                                html:
                                    `<ul style="text-decoration: none;line-height: 2;font-size: 15px;">${html}</ul>`,
                                
                                focusConfirm: false,
                                confirmButtonText:
                                    ' Ok!',	
                            })                    
                        } else {
                            Swal.fire({
                                title: 'Thành công',
                                text: "Bình luận thành công",
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Ok'
                                }).then((result) => {
                                if (result.value) {
                                    
                                        window.location.reload();
                                    
                                }
                            })                  
                        }
                    }
                });
            })

            $('.loadmore').on('click',function(){
                scope = $(this);
                var total_current = $(this).attr('total-current');
                $.ajax({
                    type:'POST',
                    url:`{{route('load_more_comment')}}`,
                    data:{
                        product_id : `{{$product->id}}`,
                        total_current : total_current,
                        _token : `{{csrf_token()}}`,
                    },
                    success:function(data){
                        new_total = Number(total_current) + Number(5);
                        
                        $(scope).attr('total-current',new_total);
                        
                        $('.review-wrapper').find('.single-review').last().after(data);
                        if(data.length == 0){
                            $(scope).remove();
                        }
                    }
                });
            })
        })
    </script>
@endsection