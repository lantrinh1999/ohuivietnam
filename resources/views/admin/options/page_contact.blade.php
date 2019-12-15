@extends('admin.layout.master')

@section('title')
Thiết lập liên hệ
@endsection
@section('action')

@endsection
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-colorpicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/jquery.nestable.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/first.css') }}">
<style>
    textarea.form-control {
        height: auto;
        height: 182px;
    }

    .cke_contents {
        min-height: 100px !important;
    }

    .col-xs-12 {
        margin-top: 10px !important;
    }

    .pull-right {
        margin-left: 5px;
    }

    .dd-empty {
        display: none
    }

    #nestable3 {
        padding: 4px 8px !important;
        border: 1px #e0e0e0 solid;
        min-height: 40px;
    }

</style>
@endsection

@section('content')

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"> @yield('title') </h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>

    <!-- ********** -->
    <div class="box-body">


        <form id="form-contact">
            <div class="">
                <div class="form-group col-md-12">
                    <label for="">Bản đồ</label>
                    <input type="text" class="form-control map" name="map" id="map">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Số điện thoại</label>
                    <input type="text" class="form-control map" name="map" id="map">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Email</label>
                    <input type="text" class="form-control email" name="email" id="email">
                </div>
                <div class="form-group col-md-12">
                    <label for="">Địa chỉ</label>
                    <input type="text" class="form-control address" name="address" id="address">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Lưu</button>
                </div>
            </div>
        </form>
    </div>
    <!-- ********** -->
    <!-- /.box-body -->
    <div class="box-footer">

    </div>
    <!-- /.box-footer-->
</div>
@endsection

@section('js')
{{-- <script src="{{ asset('assets/plugins/bootstrap-colorpicker.min.js') }}"></script> --}}
<script src="{{ asset('assets/plugins/jquery.nestable.js') }}"></script>
<script>
    $(function () {
        //$('body').find('.genmenu').select2({});

        $('.dd').nestable({
            maxDepth: 3,
            group: 2
        });
    })

</script>
<script>
    function buildItem(title, slug) {
        var html = `<li class="dd-item dd3-item" data-slug="${slug}" data-title="${title}">
                        <div class="dd-handle dd3-handle"></div>
                        <div class="dd3-content">${title.length > 50 ? title.substr(0, 50) + '...' : title}</div>
                        <div class="pull-right2">
                            <span style="cursor: pointer" class="btn_edit_element">
                                <button class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></button>
                            </span>
                            <span style="cursor: pointer" class="btn_remove_element">
                                <button class="btn btn-xs btn-danger"><i class="fa fa-close"></i></button>

                            </span>
                        </div>
                    </li>`;
        return html;
    }
    $(function () {
        $('body').on('click', '.btn_add_element', function (e) {
            e.preventDefault();
            let title = $('#title').val();
            let slug = $('#slug').val();
            title = $.trim(title);
            slug = $.trim(slug);
            console.log(title.length);
            console.log(slug);
            if (title.length != 0 && slug.length != 0) {
                $('.dd-list:first-child').append(buildItem(title, slug));
                $('.genmenu').prop('selectedIndex', 0);
                $('body').find('form#form-menu')[0].reset();
                $('body').find('input[name=slug]').val('');
                $('body').find('input[name=title]').val('');
            } else {
                alert('Mời nhập hoặc chọn menu!');
            }
        })
        $('body').on('click', '.btn_remove_element', function (e) {
            e.preventDefault();
            let conf = confirm('Bạn có chắc chắn xoá menu này?');
            if (conf == true) {
                $(this).closest('.dd3-item').remove();
            }
        })
    })

</script>
<script>
    $(function () {
        $('body').on('change', '.genmenu', function (e) {
            title = $(this).find('option:selected').data('title');
            slug = $(this).find('option:selected').data('slug');
            $('input#title').val(title);
            $('input#slug').val(slug);
        })
    })

</script>
<script>
    $(function () {
        $('body').on('click', '#save-menu', function () {
            var menu = $('.dd').nestable('serialize');
            if (typeof menu == 'object' && menu.length > 0) {
                var menu_jt = JSON.stringify(menu);
                console.log(menu);
                $.ajax({
                    url: "{{ route('admin.options.saveMenu') }}",
                    method: 'post',
                    type: 'json',
                    dataType: 'json',
                    data: {
                        menu: menu_jt,
                    },
                }).done(result => {
                    console.log(result);
                    if (result.errors == false) {
                        alert('Thêm menu thành công!');
                    }
                })
            } else {
                alert('Mời chọn menu');
            }

        })
    })

</script>

@endsection
