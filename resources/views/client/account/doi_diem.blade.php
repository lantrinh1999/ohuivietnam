@extends('client.layout.master')

@section('page_title')
Đổi điểm
@endsection

    <style>
        .contact-info-content-item.active button:hover{
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
                        <li class="{{Request::segment(2) == 'doi-diem' ? 'active' : ''}}"><a href="{{route('get_reward')}}">Đổi điểm</a></li>

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
                            <h2>Đổi điểm</h2>
                        </div>
                        {{-- {{dd($get_rewards)}} --}}
                        @foreach ($get_rewards as $item)
                        {{-- {{dd($item)}} --}}
                        <div class="contact-info-content-item {{$item->point <= Auth::user()->point_reward ? 'active' : ''}}">
                                <h3>{{$item->name}}</h3>
                                <p>{{$item->point}} điểm</p>
                                <button data-point="{{$item->point}}" data-value="{{$item->voucher_value}}" data-type="{{$item->type}}" class="{{$item->point <= Auth::user()->point_reward ? 'active' : ''}}">{{$item->point <= Auth::user()->point_reward ? 'ĐỔI NGAY' : 'CHƯA ĐỦ ĐIỂM'}}</button>
                            </div>
                        @endforeach
                    </div>

                    @if (count($vouchers) > 0 && !empty($vouchers))
                        <div class="my-voucher">
                            <h3>Voucher đã đổi</h3>
                            <table class="table" style="font-size: 14px;">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mô tả</th>
                                        <th>Code</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vouchers as $key => $voucher)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$voucher->name}}</td>
                                        <td>
                                            <span class="voucher_code">{{$voucher->code}}</span>
                                            <span class="fa fa-copy" style="color:red"></span>
                                            <span class="fa fa-check" style="color: #41d683;opacity: 0;"></span>
                                        </td>
                                        <td>
                                            {{\Carbon\Carbon::parse($voucher->created_at)->diffForHumans(\Carbon\Carbon::now())}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$vouchers->links()}}
                        </div>
                    @endif


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

@endsection
@section('js')
<script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
<script>
    jQuery('.my-voucher span.fa-copy').on('click',function(){
			var $this = jQuery(this);
			var copyText = $this.prev();
			var textArea = document.createElement("textarea");
            // console.log(textArea);
			textArea.value = copyText.text();
			document.body.appendChild(textArea);
			textArea.select();
			document.execCommand("Copy");
			textArea.remove();
			$this.next().css('opacity',1);
			setTimeout(function(){
				$this.next().css('opacity',0);
			},1000);
		})


    $(document).on('click','.fa-copy',function(e){
        value = $(this).parent('td').find('.voucher_code').html();
        document.execCommand("copy");
    })
    $(document).on('click', 'ul li' , function() {
        $(this).addClass('active').siblings().removeClass('active')
    })

    var title;var point; var type;var value;
    $('.contact-info-content-item.active').find('button.active').on('click',function(){
        title = $(this).parent('div').find('h3').html();
        point = $(this).parent('div').find('button').attr('data-point');
        type = $(this).parent('div').find('button').attr('data-type');

        data_value = $(this).parent('div').find('button').attr('data-value');


        $('.point_lost').html(point);
        $('.title_lost').html(title);

        $('#getModal').modal('show');
    });

    $('.btn-cancel').on('click',function(){
        $('#getModal').modal('hide');
    });

    $('.btn-access').on('click',function(){

        swal("Bạn muốn đổi voucher này ?", {
            buttons: ["Không!", true],
            icon: "warning",
            // buttons: true,
            dangerMode: true,
        }).then((value) => {
            if (value == true) {
                $.ajax({
                    type: "POST",
                    url: `{{route('get_voucher')}}`,
                    data: {
                        user_id: `{{Auth::user()->id}}`,
                        point : point,
                        title : title,
                        type : type,
                        value : data_value,
                        _token : `{{csrf_token()}}`
                        },
                    success: function( msg ) {
                        if (msg.err == false) {
                           swal({
                                title: "Chúc mừng!",
                                text: "Đổi mã voucher thành công!",
                                icon: "success",
                                button: "Ok!",
                            }).then((value) => {
                                if (value == true) {
                                    window.location.reload();
                                };
                            });
                        }else{
                            swal({
                                title: "Sự cố!",
                                text: "Có lỗi xảy ra!",
                                icon: "danger",
                                button: "Thoát!",
                            });
                        }
                    }
                });
            }
        });
    })
 </script>
@endsection
