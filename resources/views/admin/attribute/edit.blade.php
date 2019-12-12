@extends('admin.layout.master')

@section('title')
Thuộc tính sản phẩm
@endsection
@section('action')
Sửa
@endsection
@section('style')

<style>
    textarea.form-control {
        height: auto;
        height: 182px;
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
        <form  id="form-edit" action="">
            <div class="col-md-6 ">
            <div class="form-group">
                <label for="">Tên thuộc tính</label>
                <input value="{{ $attribute->name }}" class="form-control" type="text" name="name" id="name" placeholder="">
                <span id="error-name" class="error error-name text-danger text-bold"></span>
            </div>
            <div class="form-group">
                <label for="">Slug</label>
                <input class="form-control" type="text" value="{{ $attribute->slug }}" name="slug" id="slug" placeholder="abc-xyz">
                <span id="error-slug" class="error error-slug text-danger text-bold"></span>
            </div>
        </div>
        <div class="col-sm-12">
            <button type="submit" class="btn btn-success">Cập nhật</button>
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
<script>
     var flag = false;

        function responseFunc(x) {
            flag = x;
        }

        function sendAjax(route) {
            var flag = false;
            var form = $('#form-edit');
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
        $('body').on('submit', '#form-edit', function (e) {
            e.preventDefault();
            sendAjax("{{ route('admin.attribute.saveEdit', ['id' => Request::segment(4)]) }}");
            if (flag === true) {
                swal({
                    title: "Thông báo!",
                    text: "Sửa thuộc tính thành công!",
                    icon: "success",
                    button: "OK",
                }).then(function () {
                    window.location.href = "{{ route('admin.attribute.index') }}";
                });
            }
        });
</script>
<script>
    $(function () {
        $('body').on('keyup', '#name', function () {
            ChangeToSlug('name', 'slug');
        });
    })

</script>
@endsection
