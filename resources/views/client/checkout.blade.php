@extends('client.layout.master')
@section('page_title')
Thanh toán
@endsection
<script src="https://www.nganluong.vn/webskins/javascripts/jquery_min.js" type="text/javascript"></script>
@section('css')
<style>
    ul.bankList {
        clear: both;
        height: 202px;
        width: 636px;
    }

    ul.bankList li {
        list-style-position: outside;
        list-style-type: none;
        cursor: pointer;
        float: left;
        margin-right: 0;
        padding: 5px 2px;
        text-align: center;
        width: 90px;
    }

    .list-content li {
        list-style: none outside none;
        margin: 0 0 10px;
    }

    .list-content li .boxContent {
        display: none;
        width: 100%;
        /* border: 1px solid #cccccc; */
        /* padding: 10px; */
    }

    .list-content li.active .boxContent {
        display: block;
    }

    .list-content li .boxContent ul {
        height: 280px;
    }

    i.VISA,
    i.MASTE,
    i.AMREX,
    i.JCB,
    i.VCB,
    i.TCB,
    i.MB,
    i.VIB,
    i.ICB,
    i.EXB,
    i.ACB,
    i.HDB,
    i.MSB,
    i.NVB,
    i.DAB,
    i.SHB,
    i.OJB,
    i.SEA,
    i.TPB,
    i.PGB,
    i.BIDV,
    i.AGB,
    i.SCB,
    i.VPB,
    i.VAB,
    i.GPB,
    i.SGB,
    i.NAB,
    i.BAB {
        width: 80px;
        height: 30px;
        display: block;
        background: url(https://www.nganluong.vn/webskins/skins/nganluong/checkout/version3/images/bank_logo.png) no-repeat;
    }

    i.MASTE {
        background-position: 0px -31px
    }

    i.AMREX {
        background-position: 0px -62px
    }

    i.JCB {
        background-position: 0px -93px;
    }

    i.VCB {
        background-position: 0px -124px;
    }

    i.TCB {
        background-position: 0px -155px;
    }

    i.MB {
        background-position: 0px -186px;
    }

    i.VIB {
        background-position: 0px -217px;
    }

    i.ICB {
        background-position: 0px -248px;
    }

    i.EXB {
        background-position: 0px -279px;
    }

    i.ACB {
        background-position: 0px -310px;
    }

    i.HDB {
        background-position: 0px -341px;
    }

    i.MSB {
        background-position: 0px -372px;
    }

    i.NVB {
        background-position: 0px -403px;
    }

    i.DAB {
        background-position: 0px -434px;
    }

    i.SHB {
        background-position: 0px -465px;
    }

    i.OJB {
        background-position: 0px -496px;
    }

    i.SEA {
        background-position: 0px -527px;
    }

    i.TPB {
        background-position: 0px -558px;
    }

    i.PGB {
        background-position: 0px -589px;
    }

    i.BIDV {
        background-position: 0px -620px;
    }

    i.AGB {
        background-position: 0px -651px;
    }

    i.SCB {
        background-position: 0px -682px;
    }

    i.VPB {
        background-position: 0px -713px;
    }

    i.VAB {
        background-position: 0px -744px;
    }

    i.GPB {
        background-position: 0px -775px;
    }

    i.SGB {
        background-position: 0px -806px;
    }

    i.NAB {
        background-position: 0px -837px;
    }

    i.BAB {
        background-position: 0px -868px;
    }

    ul.cardList li {
        cursor: pointer;
        float: left;
        margin-right: 0;
        padding: 5px 4px;
        text-align: center;
        width: 90px;
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
                <li class="active">Thanh toán</li>
            </ul>
        </div>
    </div>
</div>
<div class="checkout-area pt-95 pb-100">
    <div class="container">
        <div class="row">
            <form id="form_order">
            <div class="col-lg-7" style="float: left">
                <div class="billing-info-wrap">
                    <h3>Thông tin khách hàng</h3>
                    <div class="row">
                    @php
                        if (!empty(getCookieCouPon())) {
                            $code_coupon = getCookieCouPon()['code'];
                            $type_coupon = getCookieCouPon()['typeCoupon'];
                        }else{
                            $code_coupon = null;
                            $type_coupon = null;
                        };
                    @endphp
                        <input type="hidden" name="code_coupon" value="{{$code_coupon}}">
                        <input type="hidden" name="type_coupon" value="{{$type_coupon}}">
                        <div class="col-lg-12 col-md-12">
                            <div class="billing-info mb-20">
                                <label>Tên</label>
                            <input type="text" value="{{Auth::check() ? !empty(Auth::user()->account->name) ? Auth::user()->account->name : '' : '' }}" class="form-control" name="name">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="billing-info mb-20">
                                <label>Email</label>
                            <input type="text" class="form-control" {{Auth::check() ? 'readonly' : ''}} name="email" value="{{Auth::check() ? !empty(Auth::user()->email) ? Auth::user()->email : '' : ''}}">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="billing-info mb-20">
                                <label>Số điện thoại</label>
                            <input type="text" name="phone" value="{{Auth::check() ? !empty(Auth::user()->account->phone) ? Auth::user()->account->phone : '' : '' }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="billing-info mb-20">
                                <label>Địa chỉ</label>
                                <input type="text" name="address" value="{{Auth::check() ? !empty(Auth::user()->account->address) ? Auth::user()->account->address : ''  : '' }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="additional-info-wrap">

                        <div class="additional-info">
                            <label>Ghi chú</label>
                            <textarea placeholder="" class="form-control" name="message"></textarea>
                        </div>
                    </div>
                    @if (Auth::check() == false)
                        <div class="form-group" style="margin-top:20px">
                            <p>Tích điểm đơn hàng cho thành viên !!! <a href="{{route('register')}}">Đăng ký ngay</a> </p>
                        </div>
                    @endif
                    

                </div>
            </div>
            <div class="col-lg-5" style="float: right;">
                <div class="your-order-area">
                    <h3>Đơn hàng</h3>
                    <div class="row">
                        <div class="your-order-wrap gray-bg-4">
                            <div class="your-order-product-info">
                                <div class="your-order-top">
                                    <ul>
                                        <li>Sản phẩm</li>
                                        <li>Tổng</li>
                                    </ul>
                                </div>
                                <div class="your-order-middle">
                                    <ul>
                                        @php
                                        $carts = Cart::content();
                                        @endphp
                                        @if (!empty($carts))
                                        @foreach ($carts as $item)
                                        @php
                                        $id_arr = explode('_',$item->id);
                                        $id_product = $id_arr[0];
                                        $id_value = $id_arr[1];
                                        @endphp
                                        <li><a style="width:80%" href="{{route('product_detail',['slug' => get_product_by_id($id_product)->slug])}}"
                                                class="order-middle-left">{{$item->name}}
                                                {{!empty(get_attribute_value_by_id($id_value)) ? get_attribute_value_by_id($id_value)->name : '' }}
                                                X {{$item->qty}}</a> <span
                                                class="order-price">{{ohui_number_format($item->price*$item->qty)}} </span>
                                        </li>

                                        @endforeach
                                        @endif
                                    </ul>
                                </div>

                                <div class="your-order-total">
                                    
                                        @if (!empty(getCookieCouPon()))
                                        <div class="grand-totall" style="background-color: none; border: none; ; padding:0">
                                            @php
                                              $cookieCouPon = getCookieCouPon();
                                                if ($cookieCouPon['type'] == 'total') {
                                                    $total_after_use_coupon = Cart::subtotal(0, '', '') - $cookieCouPon['value'];
                                                }else{
                                                    $total_after_use_coupon = Cart::subtotal(0, '', '') - (Cart::subtotal(0, '', '') / 100 * $cookieCouPon['value']);
                                                }
                                            @endphp
                                            <h5>Giá trị đơn hàng : <span>{{Cart::subtotal(0, '', ',')}}đ</span></h5>
                                        
                                            <h5> <span>-{{($cookieCouPon['type'] == 'total') ? ohui_number_format($cookieCouPon['value']) : ohui_number_format(Cart::subtotal(0, '', '') / 100 * $cookieCouPon['value'])}}</span></h5><br>
                                            
                                            <h5>Tổng đơn hàng : <span>{{ohui_number_format($total_after_use_coupon)}}</span></h5>
                                        </div>    
                                        @else
                                            <div class="grand-totall"
                                                style="background-color: none; border: none; ; padding:0;justify-content: space-between;display:flex">
                                                <h4 class="order-total">Tổng đơn hàng</h4>
                                                <h4>{{Cart::subtotal(0, '', ',')}}đ</h4>
                                            </div>
                                        @endif
                                        @if (Auth::check())
                                            <div> Nhận được {{ Cart::subtotal(0, '', '') / get_option('point_bonus') }} điểm sau khi đơn hàng thành công.</div> 
                                        @endif
                                </div>
                            </div>
                            <div class="payment-method">
                                <div class="payment-accordion element-mrg">
                                    <h3>Chọn phương thức thanh toán</h3>
                                    <form name="NLpayBank" action="#" method="post">
                                        
                                        <ul class="list-content">
                                            <li class="active">
                                                <label><input type="radio" checked value="SHIPPING" name="option_payment"
                                                        selected="true">Thanh toán khi nhận hàng - COD</label>
                                                <div class="boxContent">
                                                    <p>
                                                        Bạn nhận hàng và kiểm tra hàng sau đó mới phải trả tiền
                                                </div>
                                            </li>
                                            <li >
                                                <label><input type="radio" value="ATM_ONLINE" name="option_payment">Chuyển khoản</label>
                                                <div class="boxContent">
                                                    <p><i>
                                                            <span
                                                                style="color:#ff5a00;font-weight:bold;text-decoration:underline;">Lưu
                                                                ý</span>: Bạn cần đăng ký Internet-Banking hoặc dịch vụ
                                                            thanh toán trực tuyến tại ngân hàng trước khi thực hiện.</i></p>

                                                    <ul class="cardList clearfix">
                                                        <li class="bank-online-methods ">
                                                            <label for="vcb_ck_on">
                                                                <i class="BIDV"
                                                                    title="Ngân hàng TMCP Đầu tư &amp; Phát triển Việt Nam"></i>
                                                                <input type="radio" value="BIDV" name="bankcode">

                                                            </label></li>
                                                        <li class="bank-online-methods ">
                                                            <label for="vcb_ck_on">
                                                                <i class="VCB"
                                                                    title="Ngân hàng TMCP Ngoại Thương Việt Nam"></i>
                                                                <input type="radio" value="VCB" name="bankcode">

                                                            </label></li>

                                                        <li class="bank-online-methods ">
                                                            <label for="vnbc_ck_on">
                                                                <i class="DAB" title="Ngân hàng Đông Á"></i>
                                                                <input type="radio" value="DAB" name="bankcode">

                                                            </label></li>

                                                        <li class="bank-online-methods ">
                                                            <label for="tcb_ck_on">
                                                                <i class="TCB" title="Ngân hàng Kỹ Thương"></i>
                                                                <input type="radio" value="TCB" name="bankcode">

                                                            </label></li>

                                                        <li class="bank-online-methods ">
                                                            <label for="sml_atm_mb_ck_on">
                                                                <i class="MB" title="Ngân hàng Quân Đội"></i>
                                                                <input type="radio" value="MB" name="bankcode">

                                                            </label></li>

                                                        <li class="bank-online-methods ">
                                                            <label for="sml_atm_vib_ck_on">
                                                                <i class="VIB" title="Ngân hàng Quốc tế"></i>
                                                                <input type="radio" value="VIB" name="bankcode">

                                                            </label></li>

                                                        <li class="bank-online-methods ">
                                                            <label for="sml_atm_vtb_ck_on">
                                                                <i class="ICB" title="Ngân hàng Công Thương Việt Nam"></i>
                                                                <input type="radio" value="ICB" name="bankcode">

                                                            </label></li>

                                                        <li class="bank-online-methods ">
                                                            <label for="sml_atm_exb_ck_on">
                                                                <i class="EXB" title="Ngân hàng Xuất Nhập Khẩu"></i>
                                                                <input type="radio" value="EXB" name="bankcode">

                                                            </label></li>

                                                        <li class="bank-online-methods ">
                                                            <label for="sml_atm_acb_ck_on">
                                                                <i class="ACB" title="Ngân hàng Á Châu"></i>
                                                                <input type="radio" value="ACB" name="bankcode">

                                                            </label></li>

                                                        <li class="bank-online-methods ">
                                                            <label for="sml_atm_hdb_ck_on">
                                                                <i class="HDB" title="Ngân hàng Phát triển Nhà TPHCM"></i>
                                                                <input type="radio" value="HDB" name="bankcode">

                                                            </label></li>

                                                        <li class="bank-online-methods ">
                                                            <label for="sml_atm_msb_ck_on">
                                                                <i class="MSB" title="Ngân hàng Hàng Hải"></i>
                                                                <input type="radio" value="MSB" name="bankcode">

                                                            </label></li>

                                                        <li class="bank-online-methods ">
                                                            <label for="sml_atm_nvb_ck_on">
                                                                <i class="NVB" title="Ngân hàng Nam Việt"></i>
                                                                <input type="radio" value="NVB" name="bankcode">

                                                            </label></li>

                                                        <li class="bank-online-methods ">
                                                            <label for="sml_atm_vab_ck_on">
                                                                <i class="VAB" title="Ngân hàng Việt Á"></i>
                                                                <input type="radio" value="VAB" name="bankcode">

                                                            </label></li>

                                                        <li class="bank-online-methods ">
                                                            <label for="sml_atm_vpb_ck_on">
                                                                <i class="VPB" title="Ngân Hàng Việt Nam Thịnh Vượng"></i>
                                                                <input type="radio" value="VPB" name="bankcode">

                                                            </label></li>

                                                        <li class="bank-online-methods ">
                                                            <label for="sml_atm_scb_ck_on">
                                                                <i class="SCB" title="Ngân hàng Sài Gòn Thương tín"></i>
                                                                <input type="radio" value="SCB" name="bankcode">

                                                            </label></li>



                                                        <li class="bank-online-methods ">
                                                            <label for="bnt_atm_pgb_ck_on">
                                                                <i class="PGB" title="Ngân hàng Xăng dầu Petrolimex"></i>
                                                                <input type="radio" value="PGB" name="bankcode">

                                                            </label></li>

                                                        <li class="bank-online-methods ">
                                                            <label for="bnt_atm_gpb_ck_on">
                                                                <i class="GPB" title="Ngân hàng TMCP Dầu khí Toàn Cầu"></i>
                                                                <input type="radio" value="GPB" name="bankcode">

                                                            </label></li>

                                                        <li class="bank-online-methods ">
                                                            <label for="bnt_atm_agb_ck_on">
                                                                <i class="AGB"
                                                                    title="Ngân hàng Nông nghiệp &amp; Phát triển nông thôn"></i>
                                                                <input type="radio" value="AGB" name="bankcode">

                                                            </label></li>

                                                        <li class="bank-online-methods ">
                                                            <label for="bnt_atm_sgb_ck_on">
                                                                <i class="SGB" title="Ngân hàng Sài Gòn Công Thương"></i>
                                                                <input type="radio" value="SGB" name="bankcode">

                                                            </label></li>
                                                        <li class="bank-online-methods ">
                                                            <label for="sml_atm_bab_ck_on">
                                                                <i class="BAB" title="Ngân hàng Bắc Á"></i>
                                                                <input type="radio" value="BAB" name="bankcode">

                                                            </label></li>
                                                        <li class="bank-online-methods ">
                                                            <label for="sml_atm_bab_ck_on">
                                                                <i class="TPB" title="Tền phong bank"></i>
                                                                <input type="radio" value="TPB" name="bankcode">

                                                            </label></li>
                                                        <li class="bank-online-methods ">
                                                            <label for="sml_atm_bab_ck_on">
                                                                <i class="NAB" title="Ngân hàng Nam Á"></i>
                                                                <input type="radio" value="NAB" name="bankcode">

                                                            </label></li>
                                                        <li class="bank-online-methods ">
                                                            <label for="sml_atm_bab_ck_on">
                                                                <i class="SHB"
                                                                    title="Ngân hàng TMCP Sài Gòn - Hà Nội (SHB)"></i>
                                                                <input type="radio" value="SHB" name="bankcode">

                                                            </label></li>
                                                        <li class="bank-online-methods ">
                                                            <label for="sml_atm_bab_ck_on">
                                                                <i class="OJB"
                                                                    title="Ngân hàng TMCP Đại Dương (OceanBank)"></i>
                                                                <input type="radio" value="OJB" name="bankcode">

                                                            </label></li>





                                                    </ul>

                                                </div>
                                            </li>              
                                        </ul>
                         
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="Place-order mt-25 col-sm-12">
                            <a class="btn-hover submit_order" href="#">Đặt hàng</a>
                        </div>
                    </div>
                    
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script language="javascript">
        $('input[name="option_payment"]').bind('click', function() {
    		$('.list-content li').removeClass('active');
    		$(this).parent().parent('li').addClass('active');
    		});		
    </script>
    <script>
        
    
	$(document).on('click','.submit_order',function(e) {
		e.preventDefault();
		var product_id = [];
		var amount = [];
		$('#tbl_list_cart').find('.product_current').each(function() {
			product_id.push($(this).attr('id-product'));
			amount.push($(this).attr('amount'));
		})
		html ='';
		var formData = new FormData($('form#form_order')[0]);
		formData.set('_token',`{{csrf_token()}}`);
		$.ajax({
		url : `{{route('cart.saveOrder')}}`,
		processData: false,
		contentType: false,
		method: 'POST',
        beforeSend : function () {
            $('#roller_load').css('display','block');
            $('.ohui_container').css('opacity','0.5');
            $('#roller_load').css('opacity','1');
        },
		data: formData,
			success:function(data){ 
                $('.ohui_container').css('opacity','1');
                $('#roller_load').css('display','none');
				if (data.errors) {	
                    if (data.type == 'errors') {
                        if (typeof data.messages.name != 'undefined') {
					    html += `<li>${data.messages.name[0]}</li>`;   
                        }
                        if (typeof data.messages.phone != 'undefined') {
                            html += `<li>${data.messages.phone[0]}</li>`;
                        }
                        if (typeof data.messages.email != 'undefined') {
                            html += `<li>${data.messages.email[0]}</li>`;
                        }
                        if (typeof data.messages.address != 'undefined') {
                            html += `<li>${data.messages.address[0]}</li>`;
                        }
                        
                        Swal.fire({
                            icon: 'error',
                            html:
                                `<ul style="text-decoration: none;line-height: 2;font-size: 15px;">${html}</ul>`,
                            
                            focusConfirm: false,
                            confirmButtonText:
                                ' Ok!',	
                        })   
                    }else if(data.type == 'checkout_err'){
                        if (typeof data.messages != 'undefined') {
                            html += `<li>${data.messages}</li>`;
                        }
                        Swal.fire({
                            icon: 'error',
                            html:
                                `<ul style="text-decoration: none;line-height: 2;font-size: 15px;">${html}</ul>`,
                            
                            focusConfirm: false,
                            confirmButtonText:
                                ' Ok!',	
                        })   
                    }else if(data.type == 'checkout'){
                        window.location.href = data.url;
                    }
				}else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Đặt hàng thành công',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    setTimeout(() => {
                        window.location.href = "{{route('page_thank')}}";
                    }, 1500);
				}
			},
		});
	})
      
    </script>
@endsection