@extends('admin.layout.master')

@section('title')
Đơn hàng
@endsection
@section('action')
Chi tiết
@endsection


@section('content')
<section class="invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                Mã đơn hàng : <a style="color:#3c8dbc"> {{$order->code}} </a>
                <small class="pull-right">Thời gian tạo: {{$order->created_at}}</small>
            </h2>
        </div>
        <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            {{-- Đơn hàng --}}
            <address>
                <strong>Mã đơn hàng: {{$order->code}}</strong><br>
                Tổng tiền: {{ohui_number_format($order->total)}}<br>
                Trạng thái thanh toán : {{$order->payment_status == 1 ? 'Chưa thanh toán' : 'Đã thanh toán'}}<br>
                Phương thức thanh toán : {{$order->payment_method == 1 ? 'Thanh toán online' : 'Thanh toán sau khi nhận hàng'}}<br>
                Trạng thái : 
                @if ($order->status == 4)
                    Đơn hàng thành công
                @else
                    <select name="status" id="status" class="form-control" style="width:30%">
                        @foreach ($status as $item)
                        <option {{$item->id == $order->status ? 'selected' : ''}} value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select><br>
                @endif
                
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            Khách hàng
            <address>
                <strong>{{$order->account->name}}</strong><br>
                Số điện thoại: {{$order->account->phone}}<br>
                Địa chỉ: {{$order->account->address}}<br>
            </address>
        </div>
       
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Loại</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($order->order_details))
                    @php $arr = json_decode($order->order_details,true); @endphp 
                        @foreach ($order->order_details as $item)
                           
                            <tr>
                                <td><a target="_blank" href="{{route('product_detail',['slug' => $item->product->slug])}}"> {{$item->product->name}}</a></td>
                                @if ($item->product->is_simple == 1)
                                    <td>{{!empty($item->product->sale_price) ? ohui_number_format($item->product->sale_price) : ohui_number_format($item->product->regular_price)}}
                                    </td>
                                @else
                                    @php
                                        $value_id = $item->value_id;
                                        $arr_var = json_decode($item->product->variants,true);
                                        $price_current = array_filter($arr_var, function ($var) use ($value_id) {
                                            return ($var['value_id'] == $value_id);
                                        });
                                        $price_current = array_values($price_current);
                                    @endphp
                                   
                                    <td>{{!empty($price_current[0]['sale_price']) ? ohui_number_format($price_current[0]['sale_price']) : ohui_number_format($price_current[0]['regular_price'])}}
                                    </td>
                                @endif
                                <td>{{!empty($item->value->name) ? $item->value->name : 'Không'}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{ohui_number_format($item->amount)}}</td>
                            </tr>
                        @endforeach
                    @endif                
                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
            
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
            <p class="lead"></p>

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        @if (!empty($order->discount_id) || !empty($order->voucher))
                            
                        @endif
                        <tr>
                            <th style="width:50%">Giá trị đơn hàng:</th>
                            <td>
                                    {{ ohui_number_format(array_sum(array_column($arr,'amount')))}}
                            </td>
                        </tr>
                        <tr>
                            @if (!empty($order->discount_id) && !empty($order->discount))
                                <th>Giảm giá</th>
                                @if ($order->discount->type == 'total')
                                    <td>{{ '-'.ohui_number_format($order->discount->value) }}</td>    
                                @elseif($order->discount->type == 'percent')
                                    <td>{{ '-'.ohui_number_format(array_sum(array_column($arr,'amount')) / 100 * $order->discount->value) }}</td>
                                @endif
                            @elseif(!empty($order->voucher_id) && !empty($order->voucher))
                                <th>Giảm giá</th>
                                @if ($order->discount->type == 'total')
                                    <td>{{ '-'.ohui_number_format($order->discount->value) }}</td>    
                                @elseif($order->discount->type == 'percent')
                                    <td>{{ '-'.ohui_number_format(array_sum(array_column($arr,'amount')) / 100 * $order->discount->value) }}</td>
                                @endif
                            @endif
                        </tr>
                        <tr>
                            <th>Thành tiền: </th>
                            <td>{{ohui_number_format($order->total)}}</td>
                        </tr> 
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.col -->
    </div>
 <div class="row no-print">
    <div class="col-xs-12">

        <a href="{{route('admin.orders.index')}}" class="btn btn-success pull-right"><i class="fa fa-backward"></i>
            Danh sách đơn hàng
        </a>

    </div>
</div>
</section>

@endsection

@section('js')
<script>

    $('body').on('change','#status',function(e) {
        e.preventDefault();
        value = $(this).val();
        if (confirm('Thay đổi trạng thái đơn hàng ?? ')) {
            $.ajax({
            url: "{{route('admin.orders.saveEdit',['id' => $order->id ])}}",
            method: 'post',
            data: {
                'value' : value
            },
        }).done(
            result => {
                    swal({
                        title: "Thành công!",
                        text: "Sửa sản phẩm thành công!",
                        icon: "success",
                        button: "OK",
                    }).then((willDelete) => {
                    if (willDelete) {
                        window.location.reload();
                    }
                    });
                    
            });
        }else{
            $(this).val(`{{$order->id}}`);
            return false;
        }
    });
        
    
    $(function () {
        $('.select2').select2();
    })
    
</script>
@endsection