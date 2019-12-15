@extends('admin.layout.master')

@section('title')
Đánh giá
@endsection
@section('action')
Danh sách
@endsection

@section('style')

<style>

    .label-dark {
        background: black !important;
    }

    @media only screen and (max-width: 768px) {

        /* For mobile phones: */
        .modal-dialog {
            width: 90%;
            margin: auto;
            margin-top: 20%;
        }
    }
    [class*="fa-star"] {
    color: palevioletred;
  }


</style>
@endsection

@section('content')

<div class="row">

    <div class="col-sm-12">
        <div class="box">


            <!-- ********** -->
            <!-- ********** -->
            <div class="box-body">




                <div class="table-responsive">
                    <table id="dataTables" class="table table-active table-active">
                        <thead>
                            <tr>
                                <th width="5px" class="sorting_disabled no-sort" rowspan="1" colspan="1" style="width: 5px;">
                                    <input id="checkAll" value="all" class="checkAll" type="checkbox" name="checkAll">
                                </th>
                                <th  width="90px" style="width: 90px !important">Khách hàng</th>
                                <th width="70px" style="width: 70px !important">Số sao</th>
                                <th style="width:40% !important">Đánh giá</th>
                                <th>Sản phẩm</th>
                                <th style="width:150px !important">Thêm lúc</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($comments))
                            @foreach ($comments as $item)
                            {{-- {{dd($item)}} --}}
                                <tr>
                                    <td><input type="checkbox" class="checkbox" value="{{$item->id}}" name="checkbox"></td>
                                    <td>{{!empty($item->user->account->name) ? $item->user->account->name :  $item->user->email}}
                                        <div class="div-action">
                                            <a class="btn-remove" data-id="{{$item->id}}" href="javascript:;">Xoá</a>
                                        </div>
                                    </td>
                                    <td>
                                        <i style="display:none">{{ $item->rate_star }}</i>
                                        @for( $i=0;$i < 5;$i++)
                                            @if ($i < $item->rate_star)
                                                <i class="fa fa-star"></i>
                                            @else
                                                <i class="fa fa-star-o"></i>
                                            @endif
                                        @endfor
                                    </td>

                                    <td>{{$item->content}}</td>

                                    <td>
                                        <a href="{{route('product_detail',['slug' => $item->product->slug])}}">{{$item->product->name}}</a>
                                    </td>
                                    <td>{{$item->created_at}}</td>
                                </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- ********** -->
            <!-- ********** -->
            <!-- /.box-body -->
            <div class="box-footer">

            </div>
            <!-- /.box-footer-->
        </div>
    </div>
</div>


@endsection

@section('js')
<script>
    $(function () {
        $('#dataTables').DataTable({
            // "ordering": true,
            // "searching": true,
            "language": {
                "lengthMenu": "_MENU_ ",
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
                                url: "{{ route('admin.comments.delete')}}",
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
                                        ajaxFunc2("{{route('admin.comments.deleteMulti')}}", formData);

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

@endsection
