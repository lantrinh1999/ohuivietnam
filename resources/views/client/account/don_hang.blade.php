@extends('client.layout.master')

@section('page_title')
Đổi điểm
@endsection

<style>
    .contact-info-content-item.active button:hover {
        cursor: pointer;
        color: #fff;
        background: #000;
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
                <li class="active">Đổi điểm</li>
            </ul>
        </div>
    </div>
</div>


<div class="contact-area pt-100 pb-100">
    <div class="container">
        <div class="contact-map mb-10">
        </div>
        <div class="custom-row-2">
            <div class="col-lg-3 col-md-4">
                <div class="contact-info-sidebar">
                    <ul>
                        <li class="{{Request::segment(2) == 'doi-diem' ? 'active' : ''}}"><a
                                href="{{route('get_reward')}}">Đổi điểm</a></li>
                        <li><a href="sanphamyeuthich.php">Sản phẩm yêu thích</a></li>
                        <li class="{{Request::segment(2) == 'thong-tin' ? 'active' : ''}}"><a
                                href="{{route('info_account')}}">Thông tin tài khoản</a></li>
                        @if (Auth::check() && Auth::user()->role == 1)
                            <li class="{{Request::segment(2) == 'don-hang' ? 'active' : ''}}"><a href="{{route('orderUser')}}">Đơn hàng</a></li>
                        @endif
                        <li class="{{Request::segment(2) == 'gioi-thieu-ban-be' ? 'active' : ''}}"><a
                                href="{{route('share_code')}}">Giới thiệu bạn bè</a></li>
                        <li class="{{Request::segment(2) == 'hoat-dong' ? 'active' : ''}}"><a
                                href="{{route('history_reward')}}">Hoạt động</a></li>
                        @if (Auth::check() && Auth::user()->use_refferal != 1)
                            <li class="{{Request::segment(2) == 'nhap-ma-gioi-thieu' ? 'active' : ''}}"><a
                                href="{{route('enter_refferal_code')}}">Nhập mã giới thiệu</a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="contact-info-content">
                    <div class="contact-info-content-title mb-30">
                        <h2>Thông tin đơn hàng</h2>
                    </div>
                    <div>
                        @if (!empty($orders) && count($orders) > 0)
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Mã đơn hàng</th>
                                        <th scope="col">Tổng tiền</th>
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
                            {{$orders->links()}}
                        @else
                            <div class="alert alert-danger" role="alert">
                                Chưa có đơn hàng!
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div id="getModal" class="modal fade in" role="dialog" style="margin-top: 10%;">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="float:left">ĐỔI ĐIỂM THƯỞNG</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body"><input type="hidden" id="rgid" value="6">
                    <div class="text-center">

                        <p>Sử dụng <span style="font-weight:bold" class="point_lost"></span> điểm</p>
                        <p>Để nhận <span style="font-weight:bold" class="title_lost"></span></p>
                        <div class="action">
                            <span class="btn btn-md btn-primary btn-access">Xác nhận</span>
                            &ensp;
                            <span class="btn btn-md btn-info btn-cancel">Hủy bỏ</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter" style="line-height:20 !important" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
        let orders = `<?php echo json_encode($orders) ?>`;
        orders_decode = JSON.parse(orders);
        orders_decode = orders_decode.data;
       
        
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
