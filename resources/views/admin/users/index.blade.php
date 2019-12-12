@extends('admin.layout.master')

@section('title')
Tài khoản
@endsection
@section('action')
Danh sách
@endsection

@section('style')
<style>
    .total a{
        color:#000;
        line-height: 2;
        padding: .2em;
        text-decoration: none;
    }
    .total{
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
    <span><a href="{{route('admin.users.index')}}"> Tất cả ({{$countAll}})</a></span>|
    <span><a href="{{route('admin.users.index',['role' => 'admin'])}}"> Quản trị ({{$countAdmin}})</a></span>|
    <span><a href="{{route('admin.users.index',['role' => 'user'])}}"> Người dùng ({{$countUser}}) </a></span>
</div>
<div class="box">
    <div class="box-header">
        
        <div class="box-header with-border">
            <div style="margin-right: 30px !important;" class="pull-left ml-4">
            <a class="btn btn-sm btn-primary btn-flat" href="{{route('admin.users.add')}}">Thêm tài khoản</a>
            </div>
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
            
            <form action="{{route('admin.users.index')}}" method="get">
            <input type="hidden" name="role" value="{{!empty($_GET['role']) ? $_GET['role'] : ''}}"> 
                <div class="search">
                    <div class="pull-right ">
                        <button class="btn btn-flat btn-primary" type="submit">Tìm</button>
                    </div>
                    {{-- <div class="pull-right">
                        <input value="" type="search" name="search" id="search" class="form-control search">
                    </div> --}}
                </div> 
                <div class="pull-right">
                    <select name="status" id="status" class="form-control">
                        <option value="">Trạng
                            thái</option>
                        <option value="1">Hoạt động
                        </option>
                        <option value="0">Khóa
                        </option>
                        <option value="-1">Chờ kích hoạt
                        </option>
                    </select>
                </div>
            </form> 
        </div>
    </div>

    <!-- ********** -->
    <!-- ********** -->


    <div class="box-body">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="dataTables" class="table dataTable table-active table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px !important" class="no-sort">
                                <input id="checkAll" value="all" class="checkAll" type="checkbox" name="checkAll">
                            </th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Mã giới thiệu</th>
                            <th>Điểm</th>
                            <th>Quyền</th>
                            <th class="no-sort">Trạng thái</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>
                                    <input type="checkbox" class="checkbox" value="{{$item->id}}" name="checkbox">
                                </td>
                                <td>
                                <div>{{$item->account->name}}</div>
                                    <div class="div-action"><a class="btn-edit" href="{{ route('admin.users.edit',['id' => $item->id ]) }}">Sửa</a>
                                    | <a class="btn-remove" data-id="{{$item->id}}" href="javascript:;">Xoá</a></div>
                                </td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->refferal_code}}</td>
                                <td>{{$item->point_reward}}</td>
                                @php
                                    if ($item->role == 500) {
                                        $role = 'Superadmin';
                                    }elseif($item->role == 300){
                                        $role = 'Admin';
                                    }else{
                                        $role = 'User';
                                    }
                                @endphp
                                <td>{{ $role }}</td>

                                @if ($item->status == 1) 
                                    <td><span class="label label-success">Hoạt động</span></td>
                                @elseif($item->status == 0)
                                    <td><span class="label label-danger">Khóa</span></td>
                                @else
                                    <td><span class="label label-info">Chờ kích hoạt</span></td>
                                @endif
                            
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
    <div class="box-footer">

    </div>
    <!-- /.box-footer-->
</div>
@endsection

@section('js')
<script>


    $(function () {
        $('#dataTables').DataTable({
            "ordering": true,
            "searching": false,
            "language": {
                "lengthMenu": "_MENU_ bản ghi/trang",
                "zeroRecords": "Không có dữ liệu để hiển thị",
                "info": "_PAGE_/_PAGES_",
                // "infoEmpty": "No records available",
                "infoEmpty": "Không có dữ liệu để hiển thị",
                // "infoFiltered": "(filtered from _MAX_ total records)",
                "infoFiltered": "(_MAX_/tổng số)",
                "search": false,
                "paginate": {
                    "first": "Trang đầu",
                    "last": "Trang cuối",
                    "next": "Trang sau",
                    "previous": "Trang trước"
                },
            }
        })
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
                                url: "{{ route('admin.users.delete')}}",
                                method: 'POST',
                                data: {
                                    id: id,
                                    _token: '{{csrf_token()}}'
                                }
                            }).done(result => {
                                console.log(result);
                                if (result.err == false) {
                                    swal("Deleted!",
                                        "Xóa thành công.",
                                        "success").then(function () {
                                                    window.location.reload();
                                                    // dataTable.ajax.reload();
                                                })
                                }else{
                                    swal("Deleted!",
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
    $(function () {
        $('body').on('submit', '#form-action', function (e) {
            e.preventDefault();
            var action = $('body').find('#action').val();
            if (parseInt(action) != 0) {
                if (action == 'delete') {
                    var categories = [];
                    $.each($("input[name='checkbox']:checked"), function () {
                        categories.push($(this).val());
                    });
                    if (categories.length != 0) {
                        var c = confirm("Bạn có chắc chắn muốn xoá mục đã chọn?");
                        if (c === true) {
                            var formData = new FormData();
                            formData.append('categories', categories);
                            ajaxFunc("{{ route('admin.users.multiDel') }}", formData);
                        }
                    } else {
                        alert('Vui lòng chọn danh mục!')
                    }
                }
            }
        })
    })

</script>
<!------ .end submit action ------->
@endsection