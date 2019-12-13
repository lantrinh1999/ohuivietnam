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
                @if (count($products) > 0 && !empty($products))
                    <form action="#">
                    <div class="table-content table-responsive cart-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Tên</th>
                                    <th>Giá</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($products as $item1)
                                    @php
                                        $item = $item1->product;
                                    @endphp

                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="{{route('product_detail',$item->slug)}}" target="_blank"><img style="width: 100px;" src="{{!empty($item->image) ? $item->image : ''}}" alt=""></a>
                                        </td>
                                        <td class="product-name"><a target="_blank" href="{{route('product_detail',$item->slug)}}">{{!empty($item->name) ? $item->name : '' }}</a></td>
                                        <td class="product-price-cart"><span class="amount">
                                        @if ($item->is_simple == -1)
                                            @if (count($item->variants) > 0)
                                                @if (!empty($item->variants[0]->sale_price))
                                                    <span>{{ohui_number_format($item->variants[0]->sale_price)}}</span>
                                                @else
                                                    <span>{{ohui_number_format($item->variants[0]->regular_price)}}</span>
                                                @endif
                                            @endif
                                        @else
                                            @if (!empty($item->sale_price))
                                                <span >{{ohui_number_format($item->sale_price)}}</span>
                                            @else
                                                <span>{{ohui_number_format($item->regular_price)}}</span>
                                            @endif
                                        @endif
                                        </span></td>

                                        <td class="remove_wishlist" product-id="{{$item->id}}"><i class="fa fa-times"></i></td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </form>
                {{$products->links()}}
                @else
                    <div class="alert alert-danger" role="alert">
                       Bạn chưa thêm sản phẩm yêu thích nào!
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>



@endsection

@section('js')
    <script>
        $(document).on('click','.remove_wishlist',function(){
                @if(Auth::check())

                    product_id = $(this).attr('product-id');
                    $.ajax({
                        type:'POST',
                        url:`{{route('remove_wishlist')}}`,
                        data:{
                            product_id : product_id,
                            user_id :  `{{Auth::user()->id}}`,
                            _token : `{{csrf_token()}}`,
                        },
                        success:function(data){
                            if (!data.errors) {
                                window.location.reload();
                            }
                        }
                    });

                @endif
            })
    </script>
@endsection
