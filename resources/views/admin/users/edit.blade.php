@extends('admin.layout.master')

@section('title')
Danh sách người dùng
@endsection
@section('action')
Xem / Cập nhập
@endsection
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-colorpicker.min.css') }}">
<style>
    textarea.form-control {
        height: auto;
        height: 182px;
    }
</style>
@endsection

@section('content')

<div class="box">


    <!-- ********** -->
    <div class="box-body">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Thông tin</a></li>
                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Lịch sử mua hàng</a></li>
                <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Lịch sử tích điểm</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">                       
                    <div class="row">
                        <div class="col-sm-6">
                        <form method="POST" action="{{route('admin.users.saveEdit',['id' => $user->id ])}}" id="add-form"> 
                            @csrf          
                            <div class="form-group">
                                <label for="name">Tên người dùng</label>
                                <input class="form-control" type="text" name="name" id="name" value="{{$user->account->name}}">
                                <span class="err_name" style="color:red"></span>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" type="text" name="email" id="email" value="{{$user->email}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="point">Điểm thưởng</label>
                                <input class="form-control" type="number" name="point" id="point" value="{{$user->point_reward}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="refferal_code">Mã giới thiệu</label>
                                <input class="form-control" type="text" name="refferal_code" id="refferal_code" value="{{$user->refferal_code}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="role">Kiểu người dùng</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="">Chọn kiểu người dùng</option>
                                    <option {{$user->role == 300 ? 'selected' : ''}} value="300">Admin</option>
                                    <option {{$user->role == 1 ? 'selected' : ''}} value="1">User</option>
                                </select>
                                <span class="err_role" style="color:red"></span>
                            </div>

                            
                            <div class="form-group">
                                <label for="status">Trạng thái</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Chọn trạng thái</option>
                                    <option {{$user->status == -1 ? 'selected' : ''}} value="-1">Chưa kích hoạt</option>
                                    <option {{$user->status == 0 ? 'selected' : ''}} value="0">Khóa</option>
                                    <option {{$user->status == 1 ? 'selected' : ''}} value="1">Kích hoạt</option>
                                </select>
                                <span class="err_status" style="color:red"></span>
                            </div>

                            <div class="form-group">
                                <button type="button" class="btn btn-save btn-success">Lưu</button>
                                <button type="button" class="btn btn-save_and_exit btn-success btn-outline-primary">Lưu & Thoát</button>
                                <a href="{{route('admin.users.index')}}" class="btn btn-danger">Huỷ</a>
                            </div>
                            </form>
                        </div> 
                        <div class="col-sm-5" style="text-align:center;margin-top:3%">
                            <img src="{{!empty($user->avatar) ? $user->avatar : 'https://icon-library.net/images/default-user-icon/default-user-icon-4.jpg' }}" class="img-thumbnail" alt="">    
                        </div> 
                                        
                    </div>
                   
                </div>
               
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                
                    <table id="dataTables" class="table dataTable table-active table-striped">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Đơn hàng</th>
                                <th scope="col">Tổng tiền</th>
                                <th scope="col">Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Abc</td>
                                <td>100.000đ</td>
                                <td><span class="badge badge-success">Thành công</span> </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Abc</td>
                                <td>100.000đ</td>
                                <td><span class="badge badge-info">Chờ duyệt</span> </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Abc</td>
                                <td>100.000đ</td>
                                <td><span class="badge badge-danger">Hủy đơn </span> </td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Abc</td>
                                <td>100.000đ</td>
                                <td><span class="badge badge-success">Thành công</span> </td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Abc</td>
                                <td>100.000đ</td>
                                <td><span class="badge badge-info">Chờ duyệt</span> </td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>Abc</td>
                                <td>100.000đ</td>
                                <td><span class="badge badge-danger">Hủy đơn </span> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                    
                    <table id="dataTables1" class="table dataTable table-active table-striped" >
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Hành động</th>
                                <th scope="col">Điểm thưởng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Hoàn thành đơn hàng #123</td>
                                <td>100</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Hoàn thành đơn hàng #123</td>
                                <td>100</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Hoàn thành đơn hàng #123</td>
                                <td>100</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
            <!-- /.tab-content -->
        </div>
        



    </div>
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
            "info" : false,
            "language": {
                "lengthMenu": "_MENU_ bản ghi/trang",
                "zeroRecords": "Không có dữ liệu để hiển thị",
                "info": "_PAGE_/_PAGES_",
                // "infoEmpty": "No records available",
                "infoEmpty": "Không có dữ liệu để hiển thị",
                // "infoFiltered": "(filtered from _MAX_ total records)",
                "infoFiltered": "(_MAX_/tổng số)",
                "search": 'Tìm kiếm: ',
                "paginate": {
                    "first": "Trang đầu",
                    "last": "Trang cuối",
                    "next": "Trang sau",
                    "previous": "Trang trước"
                },
            }
        })
    })

    $(function () {
        $('#dataTables1').DataTable({
            "ordering": true,
            "searching": false,
            "info" : false,
            "language": {
                "lengthMenu": "_MENU_ bản ghi/trang",
                "zeroRecords": "Không có dữ liệu để hiển thị",
                "info": "_PAGE_/_PAGES_",
                // "infoEmpty": "No records available",
                "infoEmpty": "Không có dữ liệu để hiển thị",
                // "infoFiltered": "(filtered from _MAX_ total records)",
                "infoFiltered": "(_MAX_/tổng số)",
                "search": 'Tìm kiếm: ',
                "paginate": {
                    "first": "Trang đầu",
                    "last": "Trang cuối",
                    "next": "Trang sau",
                    "previous": "Trang trước"
                },
            }
        })
    })
    
    var flag = false;
    function responseFunc(x) {
        console.log('aaa');
        flag = x;
    }
     function sendAjax() {
            var flag = false;
            var form = $('#add-form');
            let dataForm = new FormData(form[0]);
            $.ajax({
                url: "{{ route('admin.users.saveEdit', ['id' => Request::segment(4)]) }}",
                method: 'POST',
                processData: false,
                contentType: false,
                async: false,
                data: dataForm,
                success: function (result) {
                },
            }).done(
                result => {
                    var msg = result.messages;
                    // console.log(msg);
                    // console.log(result.errors);
                    if (result.errors) {
                        // console.log(typeof msg.name);
                        if (typeof msg.name != 'undefined') {
                            form.find('.err_name').html(msg.name[0]);        
                        }else{
                            form.find('.err_name').html('');
                        };

                        if (typeof msg.role != 'undefined') {
                            form.find('.err_role').html(msg.role[0]);        
                        }else{
                            form.find('.err_role').html('');
                        };

                        if (typeof msg.status != 'undefined') {
                            form.find('.err_status').html(msg.status[0]);
                        } else {
                            form.find('.err_status').html('');
                        }
                        
                        responseFunc(false);
                        
                    } else {
                        form.find('.err_name').html('');
                        form.find('.err_role').html('');
                        form.find('.err_status').html('');
                        responseFunc(true);
                    }
                });
            return flag;
        }
        
        $('body').on('click', '.btn-save', function(e) {
            e.preventDefault();
            sendAjax();
                console.log(flag);
                 if (flag === true) {
                swal({
                    title: "Thành công!",
                    text: "Sửa thành viên thành công!",
                    icon: "success",
                    button: "OK",
                }).then(function () {
                        window.location.reload();
                    });
                }
           
            
           
        })

        $('body').on('click', '.btn-save_and_exit', function (e) {
            e.preventDefault();
            sendAjax();
            console.log(flag)
            if (flag === true) {
                swal({
                    title: "Thành công!",
                    text: "Sửa thành viên thành công!",
                    icon: "success",
                    button: "OK",
                }).then(function () {
                    window.location.href = "{{ route('admin.users.index') }}";
                });
            }
        })
</script>

@endsection