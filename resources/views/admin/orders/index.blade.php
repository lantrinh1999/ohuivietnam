@extends('admin.layout.master')

@section('title')
Đơn hàng
@endsection
@section('action')
Danh sách
@endsection

@section('style')
<style>
    .total a {
        color: #000;
        line-height: 2;
        padding: .2em;
        text-decoration: none;
    }

    .total {
        margin: 10px 0px 0px 10px;
    }

    tr:hover .div-action {
        display: block;
        visibility: visible;
    }

    .div-action {
        visibility: hidden;
    }

    .td-action a:hover {
        color: #000000;
    }
</style>
@endsection

@section('content')
<div class="total">
    <span><a href="{{route('admin.orders.index')}}"> Tất cả ({{DB::table('orders')->count()}})</a></span>|
    @foreach ($status as $item)
        <span><a href="{{route('admin.orders.index',['status' => $item->id])}}"> {{$item->name}} ({{DB::table('orders')->where('status',$item->id)->count()}})</a></span>|
    @endforeach
    {{-- <span><a href="{{route('admin.users.index',['role' => 'user'])}}"> Người dùng ({{$countUser}}) </a></span>  --}}
</div>
<div class="box">
    <div class="box-header">

        
    </div>

    <!-- ********** -->
    <!-- ********** -->


    <div class="box-body">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="dataTables" class="table dataTable table-active table-striped">
                    <thead>
                        <tr>
                            <th class="sorting_disabled no-sort" rowspan="1" colspan="1" style="width: 129px;">
                                <input id="checkAll" value="all" class="checkAll" type="checkbox" name="checkAll">
                            </th>
                            <th class="no-sort">Mã đơn hàng</th>
                            <th class="no-sort">Tên khách hàng</th>
                            <th >Tổng tiền</th>
                            <th class="no-sort">Trạng thái thanh toán</th>
                            <th class="no-sort">Tình trạng đơn hàng</th>
                            <th>Ngày đặt</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td><input type="checkbox" class="checkbox" value="{{$order->id}}" name="checkbox"></td>
                                <td>
                                    <div><a href="{{route('admin.orders.edit',['id' => $order->id ])}}">{{$order->code}} </a></div>
                                    <div class="div-action"><a class="btn-edit"
                                            href="{{route('admin.orders.edit',['id' => $order->id ])}}">Chi tiết</a>
                                        | <a class="btn-remove" data-id="{{$order->id}}" href="javascript:;">Xoá</a></div>
                                </td>
                                <td>{{$order->account->name}}</td>
                                <td><span>{{ohui_number_format($order->total)}}</span></td>
                                <td>{{$order->payment_status == 1 ? 'Đã thanh toán' : 'Chưa thanh toán'}}</td>
                                <td><span>{{$order->order_status->name}}</span></td>
                                <td>{{$order->created_at}}</td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- ********** -->
    <!-- ********** -->
    <!-- /.box-body -->
    
    <!-- /.box-footer-->
</div>
@endsection

@section('js')
<script>
    $(function () {
       
        $('#dataTables').DataTable({
            // stateSave: true,
            // "ordering": false,/\
            "language": {
                "lengthMenu": "_MENU_",
                "zeroRecords": "Không có dữ liệu để hiển thị",
                "info": "_PAGE_/_PAGES_",
                // "infoEmpty": "No records available",
                "infoEmpty": "Không có dữ liệu để hiển thị",
                // "infoFiltered": "(filtered from _MAX_ total records)",
                "infoFiltered": "(_MAX_/tổng số)",
                "search": "Tìm kiếm: ",
                "paginate": {
                    "first": "Trang đầu",
                    "last": "Trang cuối",
                    "next": "Trang sau",

                    "previous": "Trang trước"
                },
            }
        })

        $(document).find('.content-wrapper').find('.dataTables_wrapper').find('.row:eq(0)').find('.col-sm-6:eq(0)').append(`
        <div style="float: left;margin-left:10px">
            <form class="form-action" id="form-action">
                <div style="margin-right: 5px !important;" class="pull-left">
                    <select name="action" id="action" class="form-control input-sm action ">
                        <option value="0">Tác vụ</option>
                        <option value="delete">Xoá</option>
                    </select>
                </div>
                <div class="pull-left">
                    <button id="btn-action" class="btn btn-secondary btn-sm btn-flat btn-action">Áp dụng</button>
                </div>
            </form>
        </div>`);
    })
    $('body').on('click', '.btn-remove', function (e) {
            // alert('ok');

            var id = $(this).attr('data-id');
            // alert(removeUrl);
            swal({
                    title: "Cảnh báo",
                    text: "Bạn có chắc chắn muốn xoá không?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                         $.ajax({
                                url: "{{ route('admin.orders.delete')}}",
                                method: 'POST',
                                data: {
                                    id: id,
                                    _token: '{{csrf_token()}}'
                                }
                            }).done(result => {
                                console.log(result);
                                if (result.err == false) {
                                    swal("Thành công!",
                                        "Xóa thành công.",
                                        "success").then(function () {
                                                    window.location.reload();
                                                    // dataTable.ajax.reload();
                                                })
                                }else{
                                    swal("Thất bại!",
                                        "Có lỗi xảy ra !!!",
                                        "error").then(function () {
                                                // window.location.reload();
                                    })
                            }
                        });
                    }
        });
    });

</script>
<!------ submit action ------->
<script>
  $(function() {
    $('body').on('click', '#btn-action', function(e) {
            // console.log('a');
            e.preventDefault();
            var action = $('body').find('#action').val();
            if (parseInt(action) != 0) {
                if (action == 'delete') {
                    var data = [];
                    $.each($("input[name='checkbox']:checked"), function() {
                        data.push($(this).val());
                    });
                    var formData = new FormData();

                    formData.append('data', data);
                    if (data.length != 0) {
                        swal({
                                title: "Chắc chắn xóa?",
                                text: "Đơn hàng bị xóa. Sẽ không thể khôi phục!",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                            })
                            .then((willDelete) => {
                                    if (willDelete) {
                                        // console.log()
                                        ajaxFunc2("{{route('admin.orders.deleteMulti')}}", formData);

                                        swal("Thành công!",
                                            "Xóa thành công.",
                                            "success").then(function() {
                                            window.location.reload();
                                        });
                                    
                                };
                            })
                } else {
                    alert('Vui lòng chọn !')
                }
            }
        }
    })
})
</script>
<!------ .end submit action ------->
@endsection