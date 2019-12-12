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
        <div class="contact-map mb-10"></div>
            <div class="custom-row-2">
                <div class="col-lg-3 col-md-4">
                    <div class="contact-info-sidebar">
                        <ul>
                            <li class="{{Request::segment(2) == 'doi-diem' ? 'active' : ''}}"><a href="{{route('get_reward')}}">Đổi điểm</a></li>
                            <li><a href="sanphamyeuthich.php">Sản phẩm yêu thích</a></li>
                            <li class="{{Request::segment(2) == 'thong-tin' ? 'active' : ''}}"><a href="{{route('info_account')}}">Thông tin tài
                                    khoản</a></li>
                            @if (Auth::check() && Auth::user()->role == 1)
                            <li class="{{Request::segment(2) == 'don-hang' ? 'active' : ''}}"><a href="{{route('orderUser')}}">Đơn hàng</a></li>
                            @endif
                            <li class="{{Request::segment(2) == 'gioi-thieu-ban-be' ? 'active' : ''}}"><a href="{{route('share_code')}}">Giới thiệu
                                    bạn bè</a></li>
                            <li class="{{Request::segment(2) == 'hoat-dong' ? 'active' : ''}}"><a href="{{route('history_reward')}}">Hoạt động</a>
                            </li>
                            @if (Auth::check() && Auth::user()->use_refferal != 1)
                            <li class="{{Request::segment(2) == 'nhap-ma-gioi-thieu' ? 'active' : ''}}"><a
                                    href="{{route('enter_refferal_code')}}">Nhập mã giới thiệu</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="contact-info-content" style="margin-bottom: 30px;">
                        <div class="contact-info-content-title mb-30">
                            <h2>Hoạt động</h2>
                        </div>
                        <div class="contact-info-content-title mb-30">
                            <table class="table table-hover" style="font-size:13px">
                                <thead>
                                    <tr>
                                        <th scope="col">Ngày</th>
                                        <th scope="col">Hành động</th>
                                        <th scope="col">Điểm</th>
                                        <th scope="col">Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($history_reward as $item)
                                        @php
                                            $date = date_create($item->created_at);
                                            $data_format =  date_format($date,"d-m-Y");
                                        @endphp
                                        <tr>
                                            <td>{{$data_format}}</td>
                                        <td>{{$item->action}}</td>
                                        <td>{{$item->point}}</td>
                                        <td><a style="color:white;padding:3px" class="btn-{{$item->status == 1 ? "success" : 'warning'}}">{{$item->status == 1 ? "Chấp nhận" : 'Chờ duyệt'}}</a></td>
                                        </tr>
                                    @endforeach        
                                </tbody>
                            </table>
                        </div>
                        {{$history_reward->links()}}
                    </div>  
                     
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
<script>
  
</script>
@endsection