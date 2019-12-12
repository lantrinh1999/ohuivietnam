@extends('admin.layout.master')

@section('title')
Mã giảm giá
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

{{-- alert --}}
@if (session('success'))
<div class="row">
    <div class="col-sm-12">
        <div class="alert alert-success alert-dismissible show" role="alert">
            <strong>Thông báo!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
@endif

@if (session('error'))
<div class="row">
    <div class="col-sm-12">
        <div class="alert alert-warning alert-dismissible show" role="alert">
            <strong>Thông báo!</strong> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
@endif
{{-- end alert --}}
<div class="row">
    <div class="col-md-4">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Thêm mã giảm giá</h3>
            </div>

            <!-- ********** -->
            <!-- ********** -->
            <div class="box-body">
                <form id="create_" method="post"> 
                    @csrf
                    <div class="form-group">
                        <label for="">Mã giảm giá</label>
                        <input class="form-control" type="text" name="code" id="code" autocomplete="off">
                        <span style="color:red" class="err_code"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả</label>
                        <textarea class="form-control" name="description" id="" cols="5" rows="5"></textarea>
                        <span style="color:red" class="err_description"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Giá trị</label>
                        <input class="form-control"  type="number" name="value" id="name" min="0">
                        <span style="color:red" class="err_value"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Kiểu giảm giá</label>
                        <select name="type" class="form-control">
                            <option value="">Chọn kiểu</option>
                            <option value="percent">Phần trăm (%)</option>
                            <option value="total">Số tiền</option>
                        </select>
                        <span style="color:red" class="err_type"></span>
                    </div>
                    <div class="form-group">
                        <label>Ngày hết hạn</label>
                        <input type="date" name="date_end" class="form-control" value="" autocomplete="off">
                        <span style="color:red" class="err_date_end"></span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn-save  btn btn-success">Lưu</button>
                    </div>
                </form>

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
                
                    <h3 class="box-title">Danh sách mã giảm giá</h3>
                
            </div>
            
            <div class="col-sm-12">
                
            </div>
            <!-- ********** -->
            <!-- ********** -->
            <div class="col-sm-12">
                <div class="box-body">

                    <div class="table-responsive">
                        <table id="dataTables" class="table table-active table-active table-striped">

{{--                         
                            <thead>
                                <tr>
                                    <th style="width: 10px !important" class="no-sort">
                                        <input id="checkAll" value="all" class="checkAll" type="checkbox" name="checkAll">
                                    </th>
                                    <th>Mã</th>
                                    <th>Mô tả</th>
                                    <th>Giá trị</th>
                                    <th>Ngày hết hạn</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody> --}}
                           
                        

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
    </div>
</div>



@endsection

@section('js')
<script>
    var table;
    $(function () {
        

        var table = $('#dataTables').DataTable({
            serverSide: true,
            processing: true,
            responsive: true,
            stateSave: true,
            "ordering": false,
            ajax: "{{ route('admin.discounts.data') }}",
            // order: [
            //     [0, 'desc']
            // ],
            lengthMenu: [20, 30, 50, 100],
            iDisplayLength: 20,
           
            columns: [
                {
                    data: 'id',
                    title: `<input id="checkAll" value="all" class="checkAll" type="checkbox" name="checkAll">`,
                    render : function (data) {
                        return `<input type="checkbox" class="checkbox" value="${data}" name="checkbox">`
                    }
                },
                {data: null,title :'Mã giảm giá',name : 'name', render: function ( data, type, row ) {
                    let step = '';            
                    return `
                    <div>${step + data.code}</div>
                    <div class="div-action"><a  class="btn-edit"
                        href="{{ url('admin/discounts/edit/') }}/${data.id}">Sửa</a>
                        | <a class="btn-remove" data-id ="${data.id}"  href="javascript:;">Xoá</a></div>
                    `;
                    }
                },
                {
                    data: 'description',
                    title: "Mô tả",
                    autoWidth: true
                },
                {
                    data: null,
                    title: "Giá trị",
                    render: function(data,type,row){
                        return `${data.value}${data.type == 'percent' ? '%' : 'VNĐ'}`
                    }
                },
                {
                    data: 'date_end',
                    title: "Ngày hết hạn",
                    autoWidth: true
                },

            ],
            "language": {
                "lengthMenu": "_MENU_ ",
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
            },

           
        

        })

    $('body').on('submit','#create_',function(e) {
        e.preventDefault();
        var form = $(this);
        let dataForm = new FormData(form[0]);
        dataForm.set('_token', '{{csrf_token()}}');
        
        $.ajax({
            url: "{{route('admin.discounts.saveAdd')}}",
            // url: window.location.href,
            method: 'post',
            processData: false,
            contentType: false,
            data: dataForm,
            success: function (result) {},
            }).done(
                result => {
                    var msg = result.messages;
                    
                    if (result.err) {
                        var msg = result.messages;
                        typeof msg.code != 'undefined' ? form.find('.err_code').html(msg.code[0]) : form
                            .find('.err_code').html('');
                        typeof msg.type != 'undefined' ? form.find('.err_type').html(msg.type[0]) : form
                            .find('.err_type').html('');
                        typeof msg.value != 'undefined' ? form.find('.err_value').html(msg.value[0]) : form
                        .find('.err_value').html('');
                        typeof msg.date_end != 'undefined' ? form.find('.err_date_end').html(msg.date_end[0]) : form
                        .find('.err_date_end').html('');
                    } else {
                        form.find('.err_code').html('');
                        form.find('.err_type').html('');
                        form.find('.err_value').html('');
                        form.find('.err_date_end').html('');
                        $('#create_').trigger('reset');
                        swal("success!",
                            "Thêm thành công.",
                            "success").then(function () {
                                $('#dataTables').DataTable().ajax.reload();
                        });
                    }
            });
        });
    });
    
    $(function() {
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

        $(document).on('click','.btn-remove',function(e) {
            e.preventDefault();
            swal({
                title: "Chắc chắn xóa?",
                text: "Mã giảm giá bị xóa. Sẽ không thể khôi phục!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    id = $(this).attr('data-id');
                             $.ajax({
                                url: `{{route('admin.discounts.delete')}}`,
                                method: 'POST',
                                data: {
                                    _token: '{{csrf_token()}}',
                                    id : id,
                                }
                            }).done(result => {
                                
                                if (result.err == false) {
                                    swal("Deleted!",
                                        "Xóa thành công.",
                                        "success").then(function () {
                                        $('#dataTables').DataTable().ajax.reload();
                                })
                            }    
                    });
                };
            });
        })
    })
    


    
 
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
                                text: "mã giảm giá bị xóa. Sẽ không thể khôi phục!",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                            })
                            .then((willDelete) => {
                                    if (willDelete) {
                                        ajaxFunc2("{{route('admin.discounts.deleteMulti')}}", formData);

                                        swal("Deleted!",
                                            "Xóa thành công.",
                                            "success").then(function() {
                                            $('#dataTables').DataTable().ajax.reload();
                                        });
                                    
                                };
                            })
                } else {
                    alert('Vui lòng chọn mã giảm giá!')
                }
            }
        }
    })
})

</script>
@endsection