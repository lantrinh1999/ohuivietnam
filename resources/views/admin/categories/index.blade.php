@extends('admin.layout.master')

@section('title')
Danh mục sản phẩm
@endsection
@section('action')
Danh sách
@endsection

@section('style')
<style>
    td:hover .div-action {
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

<div class="box">
    <div class="box-header with-border">
        <div style="margin-right: 30px !important;" class="pull-left ml-4">
            <a class="btn btn-sm btn-primary btn-flat" href="{{ route('admin.categories.add') }}">Thêm sản phẩm</a>
        </div>
        <form class="form-action" id="form-action">
            <div style="margin-right: 5px !important;" class="pull-left">
                <select name="action" id="action" class="form-control input-sm action " field_signature="2473543864">
                    <option value="0">Tác vụ</option>
                    <option value="delete">Xoá</option>
                </select>
            </div>
            <div class="pull-left">
                <button id="btn-action" class="btn btn-secondary btn-sm btn-flat btn-action">Áp dụng</button>
            </div>
        </form>

    </div>

    <!-- ********** -->
    <!-- ********** -->
    <div class="box-body">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table dataTable table-active table-striped" id="categoriesTable">
                    <thead>
                        <tr>
                            <th style="width: 10px !important" class="no-sort">
                                <input id="checkAll" value="all" class="checkAll" type="checkbox" name="checkAll">
                            </th>
                            {{-- <th>STT</th> --}}
                            <th>Tên danh mục</th>
                            <th class="no-sort">Chuỗi đường dẫn tĩnh</th>
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
                    $.ajax({}).done(result => {});
                }
            });
    });

</script>

<!------ dataTable ------->
<script>
    $(function () {

        var dataTable = $('#categoriesTable').DataTable({
            //processing: true,
            "aaSorting": [],
            "order": [],
            language: configLanguge(),
            //"stateSave": true,
            "lengthMenu": [20, 50, 100],
            serverSide: true,
            keys: true,
            select: true,
            responsive: true,
            ajax: '{!! route('admin.categories.data') !!}',
            columns: [
                {
                    data: 'id',
                    "orderable": false,
                    render: function (data, type, row) {
                        return `<input type="checkbox" class="checkbox" value="${data}" name="checkbox">`;
                    }
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
                        return `
                <div>${step + data.name}</div>
                <div class="div-action"><a class="btn-edit"
                    href="{{ url('admin/categories/edit/') }}/${data.id}">Sửa</a>
                    | <a class="btn-remove" data-id="${data.id}"  href="javascript:;">Xoá</a></div>
                `;
                    }
                },
                {
                    data: 'slug',
                    name: 'slug'
                },


            ],
            initComplete: function () {
                $('body').on('click', '.btn-remove', function () {
                    var id = $(this).data('id');
                    console.log(id);
                    swal({
                        title: "Opp?",
                        text: "Sau khi xóa, bạn sẽ không thể khôi phục danh mục này!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: "{{ route('admin.attribute.delete')}}",
                                method: 'POST',
                                data: {
                                    id: id,
                                    _token: '{{csrf_token()}}'
                                }
                            }).done(result => {
                                console.log(result);
                                if (result.errors == false) {
                                    swal("Deleted!",
                                        "Danh Mục đã bị xoá.",
                                        "success").then(function () {
                                        //window.location.reload();
                                        dataTable.ajax.reload();
                                    })
                                }
                                // setTimeout(function () {
                                //  table.ajax.reload();
                                // }, 500);

                            });
                        } else {

                        }
                    })
                })
            },



        });
        $.fn.dataTable.ext.errMode = 'throw';
    });

</script>
<!------ dataTable ------->


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
                            ajaxFunc("{{ route('admin.categories.multiDel') }}", formData);
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
