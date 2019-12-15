@extends('admin.layout.master')

@section('title')
Danh sách liên hệ
@endsection
@section('action')
Danh sách
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
<div class="box">

    <div class="box-body">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="dataTables" class="table dataTable table-active table-striped">

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
    var table;
    $(function () {
    
        var table = $('#dataTables').DataTable({
            serverSide: true,
            processing: true,
            responsive: true,
            stateSave: true,
            "ordering": false,
            ajax: "{{ route('admin.contacts.data') }}",
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
                {data: null,title :'Tên người dùng',name : 'name', render: function ( data, type, row ) {
                    let step = '';            
                    return `
                    <div>${step + data.name}</div>
                    <div class="div-action"> <a class="btn-remove" data-id ="${data.id}"  href="javascript:;">Xoá</a></div>
                    `;
                    }
                },
                {
                    data: 'email',
                    title: "Email",
                    autoWidth: true
                },
                
                {
                    data: 'title',
                    title: "Tiêu đề",
                    autoWidth: true
                },
                {
                    data: 'content',
                    title: "Nội dung",
                    autoWidth: true
                },
                {
                    data: null,
                    title: "Trạng thái",
                    autoWidth: true,
                    render : function(data, type, row){
                        html = '';
                        console.log(data);
                        if (data.status == -1) {
                            html += `<button type="button" class="btn btn-danger change_status" id="${data.id}" status="-1">Chưa xử lý</button>`;
                        }else{
                            html += `<button type="button" class="btn btn-primary change_status" id="${data.id}" status="1">Đã xử lý</button>`;
                        }
                        return html;
                    }
                },
                {
                    data: 'created_at',
                    title: "Thêm ngày",
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

    })
    
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
                text: "Liên hệ bị xóa. Sẽ không thể khôi phục!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    id = $(this).attr('data-id');
                             $.ajax({
                                url: `{{route('admin.contacts.delete')}}`,
                                method: 'POST',
                                data: {
                                    _token: '{{csrf_token()}}',
                                    id : id,
                                }
                            }).done(result => {
                                
                                if (result.err == false) {
                                    swal("Thành công!",
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
                                text: "Liên hệ bị xóa. Sẽ không thể khôi phục!",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                            })
                            .then((willDelete) => {
                                    if (willDelete) {
                                        ajaxFunc2("{{route('admin.contacts.deleteMulti')}}", formData);

                                        swal("Thành công!",
                                            "Xóa thành công.",
                                            "success").then(function() {
                                            $('#dataTables').DataTable().ajax.reload();
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

$(function(){
    $(document).on('click','.change_status',function(){
        id = $(this).attr('id');
        status = $(this).attr('status');
        $.ajax({
            url: `{{route('admin.contacts.saveEdit')}}`,
            method: 'POST',
            data: {
                _token: '{{csrf_token()}}',
                id : id,
                status : status,
            }
        }).done(result => {          
            if (result.errors == false) {
                swal("Thành công!",
                    "Cập nhập thành công.",
                    "success").then(function () {
                    $('#dataTables').DataTable().ajax.reload();
            })
        }    
    })
    })
})
</script>
@endsection