@extends('admin.layout.master')

@section('title')
Thiết lập menu
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


        <form id="form-menu">
            <div class="col-md-6 ">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Tiêu đề</label>
                            <input class="form-control" type="text" name="title" id="title" placeholder="Tiêu đề">
                        </div>
                        <div class="form-group">
                            <label for="">Slug</label>
                            <input class="form-control" type="text" name="slug" id="slug" placeholder="">
                        </div>
                    </div>
                </div>
                <div style="margin-bottom: 20px" class="container-fluid">
                    <div class="row" style="border: solid 1px #999999; border-radius: 1px; padding: 5px">
                        <div class="col-sm-6 form-group">
                            <label for="">Danh mục</label>
                            <select class="form-control genmenu category" name="category" id="category">
                                <option data-title="" data-slug="" value="-1">-- Chọn --</option>
                                @forelse ($categories as $cate)
                                <option data-title="{{ $cate->name }}"
                                    data-slug="{{ trim(str_replace(url('/'),'',route('category', ['cate' => $cate->slug])), '/') }}"
                                    value="{{ trim(str_replace(url('/'),'',route('category', ['cate' => $cate->slug])), '/') }}">
                                    {{ $cate->name }}</option>
                                @if (count($cate->getChild) > 0)
                                @foreach ($cate->getChild as $child)
                                <option data-title="{{ $child->name }}"
                                    data-slug="{{ trim(str_replace(url('/'),'',route('category', ['cate' => $child->slug])), '/') }}"
                                    value="{{ trim(str_replace(url('/'),'',route('category', ['cate' => $cate->slug])), '/') }}">
                                    --- {{ $child->name }}</option>
                                @endforeach
                                @endif
                                @empty @endforelse
                            </select>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="">Bài viết</label>
                            <select class="form-control genmenu posts" name="post" id="posts">
                                <option data-title="" data-slug="" value="-1">-- Chọn --</option>
                                @forelse ($posts as $post)
                                <option data-title="{{ $post->name }}"
                                    data-slug="{{ trim(str_replace(url('/'),'',route('detail_post', ['slug' => $post->slug])), '/') }}"
                                    value="{{ trim(str_replace(url('/'),'',route('detail_post', ['slug' => $post->slug])), '/') }}">
                                    {{ _substr($post->name) }}
                                </option>

                                @empty @endforelse
                            </select>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="">Trang</label>
                            <select class="form-control genmenu page" name="page" id="page">
                                <option value="">Mỹ phẩm</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div style="margin: 10px 0px">
                        <button style="margin: 5px 0px" class="btn btn-bitbucket btn_add_element">Thêm menu<i
                                style="margin-left: 3px; padding-left: 3px" class="fa fa-long-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </form>


        <div class="col-md-6">
            <label for="">List menu</label>
            <div class="dd" id="nestable3">

                @if (!empty($menu) && count($menu) > 0)
                <ol class="dd-list">
                    @foreach ($menu as $m)
                    <li class="dd-item dd3-item" data-slug="{{ $m->slug }}" data-title="{{ $m->title }}">
                        <div class="dd-handle dd3-handle"></div>
                        <div class="dd3-content">{{ $m->title }}</div>
                        <div class="pull-right2">
                            <span style="cursor: pointer" class="btn_edit_element">
                                <button class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></button>
                            </span>
                            <span style="cursor: pointer" class="btn_remove_element">
                                <button class="btn btn-xs btn-danger"><i class="fa fa-close"></i></button>

                            </span>
                        </div>
                        @if (!empty($m->children) && count($m->children) > 0)
                        @foreach ($m->children as $mchild)
                        <ol class="dd-list">
                            <li class="dd-item dd3-item" data-slug="{{ $mchild->slug }}"
                                data-title="{{ $mchild->title }}">
                                <div class="dd-handle dd3-handle"></div>
                                <div class="dd3-content">{{ $mchild->title }}</div>
                                <div class="pull-right2">
                                    <span style="cursor: pointer" class="btn_edit_element">
                                        <button class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></button>
                                    </span>
                                    <span style="cursor: pointer" class="btn_remove_element">
                                        <button class="btn btn-xs btn-danger"><i class="fa fa-close"></i></button>

                                    </span>
                                </div>
                                @if (!empty($mchild->children) && count($mchild->children) > 0)
                                <ol class="dd-list">
                                @foreach ($mchild->children as $mcchild)
                                    <li class="dd-item dd3-item" data-slug="{{ $mcchild->slug }}"
                                        data-title="{{ $mcchild->title }}">
                                        <div class="dd-handle dd3-handle"></div>
                                        <div class="dd3-content">{{ $mcchild->title }}</div>
                                        <div class="pull-right2">
                                            <span style="cursor: pointer" class="btn_edit_element">
                                                <button class="btn btn-xs btn-warning"><i
                                                        class="fa fa-pencil"></i></button>
                                            </span>
                                            <span style="cursor: pointer" class="btn_remove_element">
                                                <button class="btn btn-xs btn-danger"><i
                                                        class="fa fa-close"></i></button>
                                            </span>
                                        </div>
                                    </li>
                                    @endforeach
                                </ol>
                                @endif
                            </li>
                        </ol>
                        @endforeach
                        @endif
                    </li>
                    @endforeach

                </ol>
                @else
                <ol class="dd-list">
                </ol>
                @endif
            </div>
            <br>
            <div>
                <button id="save-menu" class="btn btn-success save-menu">Lưu menu</button>
            </div>
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
