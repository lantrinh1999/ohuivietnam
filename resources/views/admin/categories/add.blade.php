@extends('admin.layout.master')

@section('title')
Danh mục sản phẩm
@endsection
@section('action')
Thêm mới
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
        <form id="add-form" class="form add-form">
            <div class="col-md-6 ">
                <div class="form-group">
                    <label for="">Tiêu đề</label>
                    <input class="form-control" type="text" name="name" id="name" placeholder="Tiêu đề">
                    <span id="error-name" class="error error-name text-danger text-bold"></span>
                </div>
                <div class="form-group">
                    <label for="">Slug</label>
                    <input class="form-control" type="text" name="slug" id="slug" placeholder="abc-xyz">
                    <span id="error-slug" class="error error-slug text-danger text-bold"></span>
                </div>
                <div class="form-group">
                    <label for="">Danh mục cha</label>
                    <select class="form-control" name="parent_id" id="parent_id">
                        <option value="0">----</option>
                        @forelse ($categories as $cate)
                        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                        @empty

                        @endforelse
                    </select>
                    <span id="error-parent_id" class="error error-parent_id text-danger text-bold"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Giới thiệu danh mục</label>
                    <textarea style="" class="description form-control" name="description" id="description" cols="30"
                        rows="10"></textarea>
                </div>
            </div>
            <div class="col-sm-12">
                <button type="button" class="btn btn-save btn-success">Lưu</button>
                <button type="button" class="btn btn-save_and_exit btn-success btn-outline-primary">Lưu & Thoát</button>
                {{-- <button type="reset" class="btn btn-danger">Huỷ</button> --}}
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
    $(function(){
        $('#parent_id').select2()
    })
</script>
<script>
    $(function () {
        // ckeditor
        var options = {
            toolbarGroups: [{
                    name: 'document',
                    groups: ['mode', 'doctools', 'document']
                },
                {
                    name: 'clipboard',
                    groups: ['clipboard', 'undo']
                },
                {
                    name: 'editing',
                    groups: ['find', 'selection', 'spellchecker', 'editing']
                },
                {
                    name: 'forms',
                    groups: ['forms']
                },
                {
                    name: 'styles',
                    groups: ['styles']
                },
                {
                    name: 'basicstyles',
                    groups: ['basicstyles', 'cleanup']
                },
                {
                    name: 'paragraph',
                    groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph']
                },
                {
                    name: 'links',
                    groups: ['links']
                },
                {
                    name: 'insert',
                    groups: ['insert']
                },
                {
                    name: 'colors',
                    groups: ['colors']
                },
                {
                    name: 'others',
                    groups: ['others']
                },
                {
                    name: 'tools',
                    groups: ['tools']
                },
                {
                    name: 'about',
                    groups: ['about']
                }
            ],
            // Remove the redundant buttons from toolbar groups defined above.
            removeButtons: 'Find,Replace,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Flash,HorizontalRule,About,Save,NewPage,Preview,Print,Cut,Copy,Paste,Redo,Undo,SelectAll,Scayt,Form,Radio,Textarea,TextField,Select,Button,ImageButton,HiddenField,Anchor,Font,Templates,Checkbox,BulletedList,NumberedList,Outdent,Indent',
        }
        var content = CKEDITOR.replace('description', options);



        var flag = false;

        function responseFunc(x) {
            flag = x;
        }

        function sendAjax() {
            var flag = false;
            var form = $('#add-form');
            let dataForm = new FormData(form[0]);
            dataForm.set('description', content.getData());
            $.ajax({
                url: "{{ route('admin.categories.saveAdd') }}",
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
                    console.log(msg);
                    console.log(result.errors);
                    form.find('.error').html('');
                    if (result.errors) {
                        var msg = result.messages;
                        typeof msg.name[0] == 'string' ? form.find('#error-name').html(msg.name) : form
                            .find('#error-name').html('');
                        typeof msg.slug[0] == 'string' ? form.find('#error-slug').html(msg.slug) : form
                            .find('#error-slug').html('');
                        //typeof msg.parent_id == 'string' ? form.find('#error-parent_id').html(msg.parent_id) : '';
                        responseFunc(false);
                    } else {
                        form.find('.error').html('');
                        responseFunc(true);
                    }
                });
            return flag;
        }

        $('body').on('click', '.btn-save', function (e) {
            e.preventDefault();
            sendAjax();
            console.log(flag)
            if (flag === true) {
                swal({
                    title: "Yeee!",
                    text: "Thêm danh mục thành công!",
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
                    title: "Yeee!",
                    text: "Thêm danh mục thành công!",
                    icon: "success",
                    button: "OK",
                }).then(function () {
                    window.location.href = "{{ route('admin.categories.index') }}";
                });
            }
        })
    })

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

@endsection
