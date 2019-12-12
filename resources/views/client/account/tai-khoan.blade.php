@extends('client.layout.master')

@section('page_title')
Tài khoản
@endsection
<style>
.hr_title{
    text-align: left;
    width: 100%;
    border-bottom: 1px solid #d2d2d2;
    color: #6a6a6a;
}
.table td, .table th{
    vertical-align: middle !important;
}
</style>
@section('content')
<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="{{route('/')}}">TRANG CHỦ</a>
                </li>
                <li class="active">Tài khoản</li>
            </ul>
        </div>
    </div>
</div>

{{-- {{dd(Auth::user())}} --}}
<div class="contact-area pt-100 pb-100">
    <div class="container">
        <div class="title-acount" style="margin-bottom: 30px;">
            @if (Auth::check() && Auth::user()->role > 1)
                <a href="{{route('admin.home')}}" target="_blank">Trang quản trị</a>&ensp;|&ensp; 
            @endif
            <a href="{{route('logOut')}}">Đăng xuất</a>
            <h2 class="title-large" style="margin-top:10px;">TÀI KHOẢN CỦA TÔI</h2>
            <p>Chào bạn, <a href="{{route('info_account')}}">{{Auth::check() ? !empty(Auth::user()->name) ? Auth::user()->name : Auth::user()->email : ''}}!</a></p>
        </div>
        
        <div class="custom-row-2">
            <div class="col-lg-9 col-md-8">
                <div class="contact-info-cart">
                    <div class="title">
                        <h3 class="hr_title">Đơn đặt hàng</h3>
                    </div>

                    @if (!empty($orders) && count($orders) > 0)
                        <table class="table" style="border-top: hidden;">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">{{Auth::user()->role >= 300 ? 'Tên khách hàng' : 'Mã đơn hàng'}}</th>
                                    <th scope="col">Tổng</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Đặt lúc</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                        
                                @foreach ($orders as $key => $item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{Auth::user()->role >= 300 ? !empty($item->account->name) ?  $item->account->name : 'Không cập nhập' : $item->code}}
                                    </td>
                                    <td>{{ohui_number_format($item->total)}}</td>
                                    <td>{{$item->order_status->name}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td><button type="button" class="btn btn-info show_detail" data-id="{{$item->id}}" data-toggle="modal"
                                            data-target="#exampleModalCenter">Chi tiết</button></td>
                                </tr>
                                @endforeach
                        
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-danger" role="alert">
                           Chưa có đơn hàng !!! 
                        </div>
                    @endif
                    
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="contact-info-poin">
                    <h3 class="hr_title">Điểm thưởng</h3>
                    {{Auth::user()->point}}
                    <p style="color: #c2a284;font-size: 30px;display: block;">{{Auth::check() ? Auth::user()->point_reward : '0'}} <span>Điểm</span></p>
                    <div class="contact-info-poin-btn">
                        <div class="pro-details-cart btn-hover">
                        <a href="{{route('get_reward')}}">CHI TIẾT TÀI KHOẢN</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter" style="line-height:20 !important" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle">Modal title</h3>        
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="content"></div>
               <table class="table" style="border-top: hidden;">
                <thead>
                    <tr>
                        
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                        {{-- <th scope="col">Trạng thái</th> --}}
                        
                    </tr>
                </thead>
                <tbody class="detail_order">
                    
                </tbody>
            </table>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
        </div>
    </div>
</div>
@endsection
@section('js')

<script>
    $(function(){
        let orders = `<?php echo $orders ?>`;
        orders_decode = JSON.parse(orders);
        
        $(document).on('click','.show_detail',function() {
            id = $(this).attr('data-id');
            small_order = orders_decode.filter((order) => {
                return order.id == id;
            });
            html = '';
            small_order[0].order_details.forEach(element => {
                
                $('#exampleModalCenter').find('.modal-title').html(`Đơn hàng <span style="font-weight: 500;"> #${small_order[0].code} </span>`);
                if (small_order[0].payment_method == 1) {
                    payment_method_text = 'Thanh toán online';
                }else{
                    payment_method_text = 'Thanh toán sau khi nhận hàng';
                };
                if (small_order[0].payment_status == -1) {
                    payment_method_status = 'Chưa thanh toán';
                }else{
                    payment_method_status = 'Đã thanh toán';
                }
                
                small_order[0].note != null ? note = small_order[0].note : note = 'Không';
                
                $('#exampleModalCenter').find('.content').html(
                `<p>Phương thức thanh toán : ${payment_method_text}</p>
                <p>Trạng thái thanh toán : ${payment_method_status}</p>
                <p>Tên khách hàng : ${small_order[0].account.name}</p>
                <p>Số điện thoại : ${small_order[0].account.phone}</p>
                <p>Địa chỉ : ${small_order[0].account.address}</p>
                <p>Ghi chú : ${note}</p>
                `);
                if(element.product.is_simple == -1){
                    attr = element.product.variants.filter((variant) => {
                        return variant.value_id == element.value_id;
                    });
                    if (attr[0].sale_price != null) {
                        price_product = attr[0].sale_price.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                        price_product = price_product.replace('.00', "đ");
                    }else{
                        price_product = attr[0].regular_price.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                        price_product = price_product.replace('.00', "đ");
                    }
                }else{
                    if (element.product.sale_price != null) {
                        price_product = element.product.sale_price.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                        price_product = price_product.replace('.00', "đ");
                    }else{
                        price_product = element.product.regular_price.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                        price_product = price_product.replace('.00', "đ");
                    }
                }
                

                element.value != null ? name_value = element.value.name : name_value ='';
                amount = element.amount.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                amount = amount.replace('.00', "đ");
                html += `<tr> 
                            <td><a href="/${element.product.slug}.html"> ${element.product.name + ' ' + name_value }</a></td>
                            <td>${price_product}</td>
                            <td>${element.quantity}</td>
                            <td>${amount}</td>
                        </tr>`;
                $('.detail_order').html(html);
            });
            // console.log(small_order);
        })        

    })
</script>
@endsection