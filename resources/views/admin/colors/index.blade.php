@extends('admin.layout.master')

@section('title')
Màu sản phẩm
@endsection
@section('action')
Danh sách
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-colorpicker.min.css') }}">

<style>
    @media only screen and (max-width: 768px) {

        /* For mobile phones: */
        .modal-dialog {
            width: 90%;
            margin: auto;
            margin-top: 20%;
        }
    }

</style>
@endsection

@section('content')

<div class="row">
    <div class="col-md-4">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Thêm màu</h3>
            </div>

            <!-- ********** -->
            <!-- ********** -->
            <div class="box-body">

                <div class="form-group">
                    <label for="">Tên màu</label>
                    <input class="form-control" type="text" name="name" id="name" placeholder="Ví dụ: Cam">
                </div>
                <div class="form-group">
                    <label for="">Mã màu</label>
                    <div class="input-group my-colorpicker2">
                        <input type="text" class="form-control">

                        <div class="input-group-addon">
                            <i></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Lưu</button>
                    <button type="submit" class="btn btn-danger">Huỷ</button>
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
    <div class="col-sm-8">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách màu</h3>
            </div>

            <!-- ********** -->
            <!-- ********** -->
            <div class="box-body">




                <div class="table-responsive">
                    <table id="dataTables2" class="table table-active table-active table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Màu sắc</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Đỏ</td>
                                <td>
                                    <div style="width: 40px; height:20px;background-color: rgb(245, 0, 0);border: 1px solid gray"
                                        class="">
                                    </div>
                                </td>
                                <td style="width:100px" class="btn-group-xs">
                                    <a style="display:none" href="#" class="btn btn-primary btn-xs"><i
                                            class="fa fa-info-circle"></i></a>
                                    <a href="#" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                    <button data-remove="11" class="btn btn-danger btn-remove"><i
                                            class="fa fa-remove "></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Vàng</td>
                                <td>
                                    <div style="width: 40px; height:20px;background:#ffe600;border: 1px solid gray"
                                        class="">
                                    </div>
                                </td>
                                <td style="width:100px" class="btn-group-xs">
                                    <a style="display:none" href="#" class="btn btn-primary btn-xs"><i
                                            class="fa fa-info-circle"></i></a>
                                    <a href="#" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                    <button data-remove="11" class="btn btn-danger btn-remove"><i
                                            class="fa fa-remove "></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Xanh lá cây</td>
                                <td>
                                    <div style="width: 40px; height:20px;background:#1cd423;border: 1px solid gray"
                                        class="">
                                    </div>
                                </td>
                                <td style="width:100px" class="btn-group-xs">
                                    <a style="display:none" href="#" class="btn btn-primary btn-xs"><i
                                            class="fa fa-info-circle"></i></a>
                                    <a href="#" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                    <button data-remove="11" class="btn btn-danger btn-remove"><i
                                            class="fa fa-remove "></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Đen</td>
                                <td>
                                    <div style="width: 40px; height:20px;background:#000000;border: 1px solid gray"
                                        class="">
                                    </div>
                                </td>
                                <td style="width:100px" class="btn-group-xs">
                                    <a style="display:none" href="#" class="btn btn-primary btn-xs"><i
                                            class="fa fa-info-circle"></i></a>
                                    <a href="#" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                    <button data-remove="11" class="btn btn-danger btn-remove"><i
                                            class="fa fa-remove "></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Trắng</td>
                                <td>
                                    <div style="width: 40px; height:20px;background:#fffff;border: 1px solid gray"
                                        class="">
                                    </div>
                                </td>
                                <td style="width:100px" class="btn-group-xs">
                                    <a style="display:none" href="#" class="btn btn-primary btn-xs"><i
                                            class="fa fa-info-circle"></i></a>
                                    <a href="#" data-toggle="modal" data-target=".bd-example-modal-sm"
                                        class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                    <button data-remove="11" class="btn btn-danger btn-remove"><i
                                            class="fa fa-remove "></i></button>
                                </td>
                            </tr>
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


<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title"><b>Sửa Màu</b></h4>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Tên màu</label>
                    <input class="form-control" value="Đỏ" type="text" name="name" id="name" placeholder="Ví dụ: Cam">
                </div>
                <div class="form-group">
                    <label for="">Mã màu</label>
                    <div class="input-group my-colorpicker2">
                        <input type="text" value="#ff0808" class="form-control">

                        <div class="input-group-addon">
                            <i></i>
                        </div>
                    </div>
                </div>
                <div class=form-group>
                    <button type="button" class="btn btn-success">Lưu</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Huỷ</button>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('assets/plugins/bootstrap-colorpicker.min.js') }}"></script>
<script>
    
    $('body').on('click', '.btn-remove', function (e) {
                // alert('ok');
    
        var id = $(this).data('remove');
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
                        
                    }).done(result => {
                        

                    });
                }
            });
    });
    $(function () {


        $('.my-colorpicker2').colorpicker();
    })

</script>
@endsection
