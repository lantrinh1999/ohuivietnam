@extends('admin.layout.master')

@section('title')
Sản phẩm
@endsection
@section('action')
Danh sách
@endsection

@section('style')
<style>
    .label-secondary {
        background: #727272 !important;
    }

</style>
@endsection

@section('content')

<div class="box">
    <div class="box-header">
    </div>

    <!-- ********** -->
    <!-- ********** -->
    <div class="box-body">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="dataTables2" class="table dataTable table-active">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Danh mục</th>
                            <th>Trạng thái</th>
                            <th>Ngày</th>
                        </tr>
                    </thead>

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
        var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
    };
        $('#dataTables2').DataTable({
            "ordering": true,
            "searching": false,
            "language": {
                "lengthMenu": "_MENU_ ",
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
            },
            serverSide: true,
            processing: true,
            responsive: true,
            stateSave: true,
            ajax: {
                url : "{{ route('admin.products.getData') }}",
                "data": {
                    "status" : getUrlParameter('status'),
                    "searchs" : getUrlParameter('search'),
                }
            },
            contentType: "application/json",

            cache: false,
            async: false,
            lengthMenu: [20, 30, 50, 100],
            iDisplayLength: 20,
            columnDefs: [{
                    "targets": [0],
                    "searchable": false,
                    "orderable": false,
                },
                {
                    "targets": [1],
                    "searchable": false,
                    "orderable": true,
                },
                {
                    "targets": [2],
                    "searchable": false,
                    "orderable": false,
                },
                {
                    "targets": [3],
                    "searchable": false,
                    "orderable": false,
                },
                {
                    "targets": [4],
                    "searchable": false,
                    "orderable": false,
                },
                {
                    "targets": [5],
                    "searchable": false,
                    "orderable": false,
                },


            ],
            columns: [
                {
                    data: 'id',
                    "orderable": false,
                    render: function (data, type, row) {
                        return `<input type="checkbox" class="checkbox" value="${data}" name="checkbox">`;
                    },
                },
                {
                    data: null,
                    name: 'name',
                    render: function (data, type, row) {
                        let step = '';
                        if (data.step > 0) {
                            for (let i = 0; i < data.step; i++) {
                                step += "----- ";
                            }
                        }
                        return `<div>${step + data.name}</div>
                        <div class="div-action"><a class="btn-edit"
                            href="{{ url('admin/products/edit/') }}/${data.id}">Sửa</a>
                            | <a class="btn-remove" data-id="${data.id}" data-remove="${data.id}"  href="javascript:;">Xoá</a></div>`;
                    },
                },
                {
                    data: 'image',
                    name: 'image',
                    render: function (data, type, row) {
                        if(typeof data == 'string'){
                            return `<img width="40px" height="auto" src="${data}" class="img" alt="">`;
                        } else {
                            return `<img src="https://i.imgur.com/19csGaL.png"  width="40px" height="auto" class="img" alt="">`;
                        }
                    },
                },
                {
                    data: 'categories',
                    title: "Danh mục",
                    autoWidth: true,
                    render: function (data, type, row) {
                        var str = '';
                        if(typeof data == "object") {
                            data.forEach(function (item, index) {
                                str += `<span style="margin-right: 5px !important" class="label label-secondary">${item.name}</span>`;
                            });
                            return str;
                        } else {
                            return str;
                        }
                    },

                },
                {
                    data: 'status',
                    title: "Trạng thái",
                    autoWidth: true,
                    render: function (data, type, row) {
                        var str = '';
                        if( data == 1) {
                            return `<span style="margin-right: 5px !important" class="label label-success">Còn hàng</span>`;
                        } else {
                            return `<span style="margin-right: 5px !important" class="label label-danger">Hết hàng</span>`;
                        }
                    },
                },
                {
                    data: null,
                    title: "Ngày",
                    autoWidth: true,
                    render: function (data, type, row) {
                        return `<div>${ data.created_at}</div>`;
                    },

                },

            ],

            initComplete: function () {
                $('body').on('click', '.btn-remove', function () {
                    var id = $(this).data('remove');
                    swal({
                        title: "Bạn có chắc chắn?",
                        text: "Sau khi xóa, bạn sẽ không thể khôi phục danh mục này!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: "{{ route('admin.products.remove')}}",
                                method: 'POST',
                                data: {
                                    id: id,
                                    _token: '{{csrf_token()}}'
                                }
                            }).done(result => {
                                if (result) {
                                    swal("Deleted!",
                                        "Danh Mục đã bị xoá.",
                                        "success");
                                }
                                setTimeout(function () {
                                    table.ajax.reload();
                                }, 500);

                            });
                        } else {

                        }
                    })
                })
            }

        })
    })

</script>
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
        $('body').find('#dataTables2_wrapper').find('.row:first-child').find('.col-sm-6:last-child').html(`
        <form action="" method="get">
                <div class="search">
                    <div class="pull-right ">
                        <button class="btn btn-flat btn-primary btn-sm" type="submit">Tìm</button>
                    </div>
                    <div class="pull-right">
                        <input style="max-width: 100px !important" value="{{ trim(!empty($_GET['search']) ? $_GET['search'] : '') }}" type="search" name="search" id="search" class="form-control search input-sm" field_signature="4156217922">
                    </div>
                </div>
                <div class="pull-right ">

                    <select name="status" id="status" class="form-control input-sm" field_signature="2044169767">
                        <option  value="">Trạng
                            thái</option>
                        <option {{ !empty($_GET['status']) && $_GET['status']  == 1 ? 'selected' : '' }} value="1">Còn hàng
                        </option>
                        <option {{ !empty($_GET['status']) && $_GET['status']  == 0 ? 'selected' : '' }} value="0">Hết hàng
                        </option>
                    </select>
                </div>
            </form>
        `);
    })

</script>

<script>
    $(function(){
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
</script>
<!------ submit action ------->
<script>
    $(function () {
        $('body').on('submit', '#form-action', function (e) {
            e.preventDefault();
            var action = $('body').find('#action').val();
            if (parseInt(action) != 0) {
                if (action == 'delete') {
                    var products = [];
                    $.each($("input[name='checkbox']:checked"), function () {
                        products.push($(this).val());
                    });
                    if (products.length != 0) {
                        var c = confirm("Bạn có chắc chắn muốn xoá mục đã chọn?");
                        if (c === true) {
                            var formData = new FormData();
                            formData.append('products', products);
                            ajaxFunc("{{ route('admin.products.multiDel') }}", formData);
                        }
                    } else {
                        alert('Vui lòng chọn sản phẩm!')
                    }
                }
            }
        })
    })

</script>


@endsection
