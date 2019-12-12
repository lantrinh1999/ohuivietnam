@extends('admin.layout.master')

@section('title')
Thuộc tính sản phẩm
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

        .th-slug {
            width: 40% !important;
        }
    }

</style>
@endsection

@section('content')

<div class="row">
    <div class="col-md-5">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Thêm mới</h3>
            </div>

            <!-- ********** -->
            <!-- ********** -->
            <div class="box-body">

                <form id="add-form">
                    <div class="form-group">
                        <label for="">Tên thuộc tính</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="Màu, kích thước,...">
                        <span id="error-name" class="error error-name text-danger text-bold"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Đường dẫn tĩnh</label>
                        <input class="form-control" type="text" name="slug" id="slug" placeholder="">
                        <span id="error-slug" class="error error-slug text-danger text-bold"></span>
                        {{-- <div class="input-group my-colorpicker2">
                        <input type="text" class="form-control">

                        <div class="input-group-addon">
                            <i></i>
                        </div>
                    </div> --}}
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-save">Lưu</button>
                        <button type="reset" class="btn btn-danger">Huỷ</button>
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
    <div class="col-md-7">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách thuộc tính</h3>
            </div>
            <!-- ********** -->
            <!-- ********** -->
            <div class="box-body">




                <div class="table-responsive">
                    <table id="attributeTable" class="table table-active table-active table-striped">
                        <thead>
                            <tr>
                                <th>Tên thuộc tính</th>
                                <th>Chuỗi đường dẫn tĩnh</th>
                                <th style="">Tên chủng loại</th>
                            </tr>
                        </thead>

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

    // $(function () {
    //     $('.my-colorpicker2').colorpicker();
    // })

</script>


<script>
    $(document).ready(function () {
        $(window).keydown(function (event) {
            if (event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });
    });

</script>
<script>
    $(function () {
        $('body').on('keyup', '#name', function () {
            ChangeToSlug('name', 'slug');
        });
    })

</script>


<!------ dataTable ------->
<script>
    $(function () {

        var dataTable = $('#attributeTable').DataTable({
            //processing: true,

            language: configLanguge(),
            //"stateSave": true,
            "lengthMenu": [20, 50, 100],
            serverSide: true,
            keys: true,
            select: true,
            responsive: true,
            ajax: '{!! route('admin.attribute.getData') !!}',
            columnDefs: [

                    {
                        "targets": [0],
                        "searchable": true,
                        "orderable": true
                    },
                    {
                        "targets": [1],
                        "searchable": false,
                        "orderable": false
                    },
                    {
                        "targets": [2],
                        "searchable": false,
                        "orderable": false
                    }

                ],
            columns: [

                {data: null, name : 'name', render: function ( data, type, row ) {

                return `
                <div>${data.name}</div>
                <div class="div-action"><a class="btn-edit"
                    href="{{ url('admin/attribute/edit/') }}/${data.id}">Sửa</a>
                    | <a class="btn-remove" data-id="${data.id}"  href="javascript:;">Xoá</a></div>
                `;
                }
            },
                {
                    data: 'slug',
                    name: 'slug'
                },
                {
                    data: null,
                    "orderable": false,
                    render: function (data, type, row) {
                        var str = '';
                        var count = 1;
                        data.values.forEach(function(item){
                            str += `<span style="margin-right: 5px !important" class="label label-secondary">${ item.name }</span>`;

                        })
                        return `<div>${str}</div>
                        <div class="div-action-abc"><a class="btn-edit"
                    href="{{ url('admin/attribute/') }}/${data.id}">Cấu hình chủng loại</a></div>

                        ` ;
                    }
                },


            ],
            initComplete: function () {
                $('body').on('click', '.btn-remove', function () {
                    var id = $(this).data('id');
                    console.log(id);
                    swal({
                        title: "Opp?",
                        text: "Sau khi xóa, bạn sẽ không thể khôi phục thuộc tính này!",
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
                                        "thuộc tính đã bị xoá.",
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

        var flag = false;

        function responseFunc(x) {
            flag = x;
        }

        function sendAjax(route) {
            var flag = false;
            var form = $('#add-form');
            let dataForm = new FormData(form[0]);
            $.ajax({
                url: route,
                method: 'POST',
                processData: false,
                contentType: false,
                async: false,
                data: dataForm,
                success: function (result) {},
            }).done(
                result => {
                    var msg = result.messages;
                    console.log(msg);
                    console.log(result.errors);
                    if (result.errors) {
                        var msg = result.messages;
                        typeof msg.name[0] == 'string' ? form.find('#error-name').html(msg.name) : form
                            .find('#error-name').html('');
                        typeof msg.slug[0] == 'string' ? form.find('#error-slug').html(msg.slug) : form
                            .find('#error-slug').html('');
                        //typeof msg.parent_id == 'string' ? form.find('#error-parent_id').html(msg.parent_id) : '';
                        responseFunc(false);
                    } else {
                        form.find('#error-name').html('');
                        form.find('#error-slug').html('');
                        responseFunc(true);
                    }
                });
            return flag;
        }
        $('body').on('click', '.btn-save', function (e) {
            e.preventDefault();
            sendAjax("{{ route('admin.attribute.saveAdd') }}");
            console.log(flag)
            if (flag === true) {
                swal({
                    title: "Yeee!",
                    text: "Thêm thuộc tính thành công!",
                    icon: "success",
                    button: "OK",
                }).then(function () {
                    $('#add-form').trigger("reset");
                    dataTable.ajax.reload();
                });
            }
        })
    })

</script>




@endsection
