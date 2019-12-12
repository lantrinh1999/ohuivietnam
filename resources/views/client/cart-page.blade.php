@extends('client.layout.master')
@section('page_title')
Giỏ hàng
@endsection
@section('content')
<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                <a href="{{route('/')}}">Trang chủ</a>
                </li>
                <li class="active">Giỏ hàng</li>
            </ul>
        </div>
    </div>
</div>
<div class="cart-main-area pt-90 pb-100">
    <div class="container">
        <h3 class="cart-page-title">Giỏ hàng của bạn</h3>
        @if (!empty($carts) > 0 && count($carts) > 0)
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                   
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                {{-- {{dd($carts)}} --}}
                                <thead>
                                    <tr>
                                        <th>Ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Tổng</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $cart)
                                        @php
                                            $id_arr = explode('_',$cart->id);
                                            $id_product = $id_arr[0];
                                            $id_value = $id_arr[1];
                                        @endphp
                                        <tr>
                                            
                                            <td class="product-thumbnail">
                                            <a href="{{route('product_detail',['slug' => get_product_by_id($id_product)->slug])}}">
                                                @if (!empty(get_product_by_id($id_product)->image))
                                                    <img style="max-width:90%" src="{{get_product_by_id($id_product)->image}}" alt="">
                                                @endif
                                            </a>
                                            </td>
                                            <td class="product-name"><a href="{{route('product_detail',['slug' => get_product_by_id($id_product)->slug])}}">{{$cart->name}} {{!empty(get_attribute_value_by_id($id_value)) ? get_attribute_value_by_id($id_value)->name : '' }}</a></td>
                                            <td class="product-price-cart"><span class="amount">{{ohui_number_format($cart->price)}}</span></td>
                                            <td class="product-quantity">
                                                <form action="{{route('cart.updateCart',['rowId' => $cart->rowId])}}" method="POST">
                                                    @csrf
                                                    <div class="cart-plus-minus">
                                                        <input class="cart-plus-minus-box change_qty"type="text" name="qty" value="{{$cart->qty}}">
                                                    </div>
                                                </form>
                                            </td>
                                            <td class="product-subtotal">{{ohui_number_format($cart->price*$cart->qty)}}</td>
                                            
                                            <td class="product-remove"> 
                                                <form action="{{route('cart.removeCart',['rowId' => $cart->rowId])}}" method="POST">
                                                    @csrf
                                                    <a style="cursor:pointer" class="clickDelete"><i class="fa fa-times"></i></a>
                                                </form>
                                            </td>
                                                
                                        </tr>
                                    @endforeach
                                    
            
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-shiping-update">
                                        <a href="#">Tiếp tục mua hàng</a>
                                    </div>

                                    <form action="{{route('cart.clearCart')}}" method="POST">
                                        <div class="cart-clear">
                                        <a >Xóa toàn bộ</a>
                                            @csrf
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                   
                    <div class="row">
                        <div class="col-lg-4 col-md-12"></div>
                        <div class="col-lg-4 col-md-6">
                            <div class="discount-code-wrapper">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gray">Sử dụng mã giảm giá</h4>
                                </div>
                                <div class="discount-code">
                                    <form id="use_discount_code">
                                        
                                    <p style="color:red" class="err_code">{{!empty(getCookieCouPon()) ? getCookieCouPon()['name'] : '' }}</p>
                                        <input type="text" placeholder="Nhập mã giảm giá" width="100%" {{!empty(getCookieCouPon()) ? 'disabled' : ''}} value="{{!empty(getCookieCouPon()) ? getCookieCouPon()['code'] : '' }}" name="code" autocomplete="off">
                                        @if (empty(getCookieCouPon())) 
                                            <button class="cart-btn-2 submit_use_discount" type="submit">Sử dụng</button>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="grand-totall">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gary-cart">Tổng tiền</h4>
                                </div>
                                @if (!empty(getCookieCouPon()))
                                    
                                    @php
                                        $cookieCouPon = getCookieCouPon();
                                        if ($cookieCouPon['type'] == 'total') {
                                            $total_after_use_coupon = Cart::subtotal(0, '', '') - $cookieCouPon['value'];
                                        }else{
                                            $total_after_use_coupon = Cart::subtotal(0, '', '') - (Cart::subtotal(0, '', '') / 100 * $cookieCouPon['value']);
                                        }
                                    @endphp
                                        <h5>Tổng giá trị đơn hàng : <span>{{Cart::subtotal(0, '', ',')}}đ</span></h5>
                                    
                                        <h5> <span>-{{($cookieCouPon['type'] == 'total') ? ohui_number_format($cookieCouPon['value']) : ohui_number_format(Cart::subtotal(0, '', '') / 100 * $cookieCouPon['value'])}}</span></h5><br>
                                        
                                        <h5>Sau khi giảm giá : <span>{{ohui_number_format($total_after_use_coupon)}}</span></h5>
                                    
                                     
                                @else
                                    <h5>Tổng giá trị đơn hàng : <span>{{Cart::subtotal(0, '', ',')}}đ</span></h5>
                                @endif
                               
                                
                                <a href="{{route('checkout')}}">Thanh toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-danger" role="alert">
                Chưa có sản phẩm nào trong giỏ hàng !!!
            </div>
        @endif
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('client/js/sweetalert.js')}}"></script>
<script>
    $(document).on('click','.submit_use_discount',function(e){
        e.preventDefault();
        code = $(this).prev().val();
        $.ajax({
            type:'POST',
            url:`{{route('sendCodeDiscount')}}`,
            data:{
                code:code,
                id: `{{Auth::check() ? Auth::user()->id : ''}}`,
                _token : `{{csrf_token()}}`,
                },
                success:function(data){
                    if (data.errors) {
                        console.log(data);
                        Swal.fire({
                        icon: 'error',
                        title: 'Thất bại',
                        text: data.messages.code[0],
                        })
                    }else{
                       Swal.fire({
                        title: data.messages.name,
                        text: "Chắc chắn sử dụng mã giảm giá này ???",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Thoát',
                        confirmButtonText: 'Sử dụng!'
                        }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                type:'POST',
                                url:`{{route('saveCouponIntoCookie')}}`,
                                data:{
                                    id: `{{Auth::check() ? Auth::user()->id : ''}}`,
                                    code:code,
                                    name: data.messages.name,
                                    type:data.messages.type,
                                    typeCoupon: data.messages.typeCoupon,
                                    value : data.messages.value,
                                    _token : `{{csrf_token()}}`,
                                    },
                                    success:function(data2){
                                        if (!data2.errors) {
                                            $('#use_discount_code > p').html(data.messages.name);
                                            $('#use_discount_code > input[name=code]').prop('disabled', true);
                                            $('#use_discount_code > button').remove();

                                            total = `{{Cart::subtotal()}}`;
                                            total = total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                                            total = total.replace('.00', "");
                                            total = total.replace(',','');
                                            
                                            if (data.messages.type == 'percent') {
                                                amount_deducted = Number(total) / 100 * Number(data.messages.value);
                                                total_after_use_coupon = Number(total) - (Number(total) / 100 * Number(data.messages.value));
                                            }else if(data.messages.type == 'total'){
                                                amount_deducted = Number(data.messages.value);
                                                total_after_use_coupon = Number(total) - Number(data.messages.value);
                                            };
                                            amount_deducted = amount_deducted.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                                            total_after_use_coupon = total_after_use_coupon.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                                            $('.grand-totall').find('h5').after(`<h5><span> - ${amount_deducted}đ</span></h5><br><h5>Sau khi giảm giá: <span>${total_after_use_coupon}đ</span></h5>`);
                                            
                                        }
                                    }
                            });
                        }
                    })
                }
                }
            });
    });

    // $(document).on('click','.acpect_use_discount',function(e){
    //     e.preventDefault();
    //     $.ajax({
    //         type:'POST',
    //         url:`{{route('sendCodeDiscount')}}`,
    //         data:{
    //             code:code,
    //             _token : `{{csrf_token()}}`,
    //             },
    //             success:function(data){
    //                 if (data.errors) {
    //                     typeof data.messages.code != 'undefined' ? $('.err_code').html(data.messages.code[0]) : $('.err_code').html('');
    //                 }else{
    //                     // $(this).remove();
    //                     console.log(data.messages.name);
    //                     typeof data.messages.name != 'undefined' ? $('.err_code').html(data.messages.name) : $('.err_code').html('');
    //                     $('.cart-btn-2').after(`<button style="background:#dc3545" class="cart-btn-2 acpect_use_discount" type="submit">Xác nhận</button>`);
    //                 }
    //             }
    //     });
    // });
</script>
@endsection