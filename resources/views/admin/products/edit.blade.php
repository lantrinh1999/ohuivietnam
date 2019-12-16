@extends('admin.layout.master')

@section('title')
Sản phẩm
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

    .gallery {
        border: 1px solid #d2d6de;
        width: 100%;
        height: auto;
        padding: 3px;
        margin: 5px 0px;
    }

    select[class=attribute_id] {
        width: 200px !important;
    }

    .is_simple {

        padding-bottom: 0px !important;
        padding-top: 0px !important;
        height: 24px !important;

    }

    .gallery2 {
        border: 1px solid #d2d6de;
        height: auto;
        width: 50%;
        display: flex;
        padding: 3px;
        margin: 5px 0px;
    }

    .gallery .img {
        display: inline-block;
        width: 32%;
        padding: 5px;
        margin-bottom: 10px;
        position: relative;
        height: 65px;
        overflow: hidden;
    }

    .gallery .img img {
        max-width: 100%;
    }

    .panel-heading {
        padding: 2px 3px;
    }

    .gallery .img i {
        position: absolute;
        top: 0;
        right: 0;
        display: inline-block;
        padding: 3px;
        background: #fff;
        color: #000;
        font-weight: bold;
        cursor: pointer;
        border: 1px solid #d2d6de;
        border-radius: 4px;
    }


    .gallery2 .img2 {
        display: inline-block;
        width: 100%;
        padding: 5px;
        margin-bottom: 10px;
        position: relative;
        height: 100px;
        overflow: hidden;
    }

    .gallery2 .img2 img {
        max-width: 100%;
    }

    .gallery2 .img2 i {
        position: absolute;
        top: 0;
        right: 0;
        display: inline-block;
        padding: 3px;
        background: #fff;
        color: #000;
        font-weight: bold;
        cursor: pointer;
        border: 1px solid #d2d6de;
        border-radius: 4px;
    }

    hr {
        border-top: 1px solid #d2d6de !important;
    }


    #product_info {
        display: flex;
    }

    #product_info .tab {
        border: 1px solid #ccc;
        background-color: #f1f1f1;
        width: 20%;
        height: auto;
    }

    /* Style the buttons inside the tab */
    #product_info .tab button {
        display: block;
        background-color: inherit;
        color: black;
        padding: 5px 16px;
        width: 100%;
        border: none;
        outline: none;
        text-align: left;
        cursor: pointer;
        transition: 0.3s;

    }

    /* Change background color of buttons on hover */
    #product_info .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current "tab button" class */
    #product_info .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    #product_info .tabcontent {

        padding: 0px 12px;
        border: 1px solid #ccc;
        width: 80%;
        border-left: none;
        min-height: 300px;
    }

    #product_info .tabcontent {
        padding-top: 10px !important;
    }

    .panel {
        border-radius: 0px !important;
    }

    .panel-default>.panel-heading {
        height: 40px !important;
    }


    @media only screen and (max-width: 768px) {

        /* For mobile phones: */

        #product_info .tab {
            width: 25%;
        }

        #product_info .tabcontent {
            width: 75%;
        }

        .value_id {
            width: 100px;
        }

    }

    @media only screen and (min-width: 768px) {

        /* For mobile phones: */
        .hr {
            display: block !important;
        }

        #product_info .tab {
            width: 20%;
        }

        #product_info .tabcontent {
            width: 80%;
        }


    }

</style>
@endsection

@section('content')

<div class="box">
    <div class="box-header">
        {{-- <h3 class="box-title"> @yield('title') </h3> --}}
    </div>

    <!-- ********** -->
    <div class="box-body">
        <div class="col-md-8">
            <form id="infomation">
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input value="{{ $product->name }}" class="form-control" type="text" name="name" id="name" placeholder="Tên sản phẩm">
                    <span class="errors text-danger text-bold error_name"></span>

                </div>
                <div class="form-group">
                    <label for="">Đường dẫn sản phẩm</label>
                    <input value="{{ $product->slug }}" class="form-control" type="text" name="slug" id="slug" placeholder="">
                    <span class="errors text-danger text-bold error_slug"></span>
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea class="form-control" id="description" name="description" id="" cols="40" rows="20">{{ $product->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Chi tiết sản phẩm</label>
                    <textarea class="form-control" id="content" name="content" id="" cols="50" rows="30">{{ $product->content }}</textarea>
                </div>
            </form>
            <hr>

            <div class="row">

                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-xs-12">
                            <h4 class="pull-left">Dữ liệu sản phẩm —</h4>
                            <div style="margin: 8px 0px;margin-left:5px" class="mr-2 pull-left">
                                <select class="is_simple form-control" name="is_simple" id="is_simple">
                                    <option {{ $product->is_simple == 1 ? 'selected' : '' }} value="1">Sản phẩm đơn giản</option>
                                    <option {{ $product->is_simple == -1 ? 'selected' : '' }} value="-1">Sản phẩm có biến thể</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12" id="product_info">
                    <div class="tab">
                        <button class="tablinks tablink-general" onclick="openCity(event, 'general')"
                            id="defaultOpen">Chung</button>
                        <button class="tablinks tablink-attribute" onclick="openCity(event, 'attribute')">Thuộc
                            tính</button>
                    </div>

                    <div id="general" class="tabcontent">
                        <div>
                            <h4>Thông tin chung:</h4>
                        </div>

                        <div class="form-group">
                            <label for="">Giá</label>
                            <input value="{{  $product->regular_price }}" type="number" class="form-control price" id="g_regular_price" name="g_regular_price">
                            <span class="errors text-danger text-bold error_g_regular_price"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Giá khuyến mãi</label>
                            <input  value="{{ number_format($product->sale_price, 0, ',', ' ')  }}" type="number" class="form-control price" id="g_sale_price" name="g_sale_price">
                            <span class="errors text-danger text-bold error_g_sale_price"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Trạng thái</label>
                            <select name="g_status" id="g_status" class="g_status form-control">
                                <option value="1">Còn hàng</option>
                                <option value="-1">Hết hàng</option>
                            </select>
                            <span class="errors text-danger text-bold error_g_status"></span>
                        </div>
                    </div>

                    <div id="attribute" class="tabcontent">
                        <div>
                            <div>
                                <h4>Chọn thuộc tính:</h4>
                            </div>

                            <div class="form-group">
                                <select style="width: 100% !important" class="form-control " name="choose_attribute"
                                    id="choose_attribute">
                                    <option value="">Chọn thuộc tính</option>
                                    @foreach ($attributes as $attr)
                                    <option value="{{ $attr->id }}">{{ $attr->name }}</option>
                                    @endforeach
                                </select>
                                <br>

                            </div>
                            <button type="submit" class="btn btn-flat btn-bitbucket add_choose_attribute"
                                id="add_choose_attribute">Lưu</button>

                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <hr class="hr hrhr" style="display:none">
            <div class="form-group">
                <label for="">Danh mục sản phẩm</label>
                <select multiple name="category_id[]" id="category_id" class="category_id form-control select2">
                    @forelse ($categories as $category)
                    <optgroup label="{{ $category->name }}">
                        @forelse ($category->getChild as $cate_child)
                        @php

                            $arr = array_column($product->categories->toArray(), 'id');
                        @endphp
                        <option {{ in_array($cate_child->id, $arr) ? 'selected' : '' }} value="{{ $cate_child->id }}">{{ $cate_child->name }}</option>
                        @empty @endforelse
                    </optgroup>
                    @empty @endforelse
                </select>
                <span class="errors text-danger text-bold error_category_id"></span>
            </div>
            <form id="images">
                <div class="form-group">
                    <label for="">Ảnh đại diện</label>
                    <div id="box-img" class="box-img gallery2">
                        @if (!empty($product->image))
                            <div class="img2">
                                    <img src="{{ $product->image }}" alt="image">
                                    <input type="hidden" name="image" value="{{ $product->image }}">
                                    <i class="btn-remove fa fa-times"></i>
                                </div>
                        @else
                        <div class="img2">
                            <i style="border:none;position: absolute;left: 40%;top: 44%;font-size: 23px;"
                                id="choose_image_product" class="choose_image_product glyphicon glyphicon-plus"></i>
                        </div>
                        @endif
                    </div>
                    {{-- <span id="choose_image_product" class="choose_image_product btn btn-sm btn-primary">Thêm ảnh</span> --}}
                </div>
                <div class="form-group">
                    <label>Thư viện ảnh</label>
                    <div class="gallery">
                        @if (!empty($product->galleries))
                            @foreach ($product->galleries as $ga)
                                <div class="img">
                                <img src="{{ $ga->url }}" alt="image">
                                <input type="hidden" name="gallery[]" value="{{ $ga->url }}">
                                <i class="fa fa-times btn-remove"></i>
                            </div>
                            @endforeach
                        @endif
                    </div>
                    <span class="choose_gallery btn btn-sm btn-primary">Add Gallery</span>
                </div>
            </form>
            <div style="margin-top: 40px;" class="mt-2">
                <button type="submit" class="btn btn-success btn-save-all">Lưu</button>
                <button type="submit" class="btn btn-success btn-save-all-exit">Lưu & Thoát</button>
                <a  class="btn btn-danger" href="{{ route('admin.products.index') }}">Huỷ</a>
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
<script>
    $(document).on('click', '.panel-heading span.clickable', function (e) {
        var $this = $(this);
        if (!$this.hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');

        } else {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');

        }
    })

</script>
<script>
    $(function () {
        $('.select2').select2();
        $('#choose_attribute').select2();
    })
    $(function () {
        CKEDITOR.replace('content', {});
    })

</script>

<script>
    CKEDITOR.replace('description', {});
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
    $(function () {
        var is_simple;
        var attributes = '';
        $('body').on('change', '.is_simple', function () {
            is_simple = $(this).val();
            $('body').find('#NOTSIMPLE').remove();
            if (is_simple == -1) {
                $('.tab').append(
                    `<button  class="tablinks tablink-variants" onclick="openCity(event, 'variants')">Biến thể</button>`
                );
                $('#product_info').append(
                    `<div style="display: none;" id="variants" class="tabcontent"></div>`);
            } else {
                $('body').find('.tablink-variants').remove();
                $('body').find('#variants').remove();
                document.getElementById("defaultOpen").click();
            }
        })

        $('body').on('click', '#add_choose_attribute', function (e) {
            e.preventDefault();
            var attr = $('body').find('#choose_attribute').val();
            if (attr.length == 0 || typeof attr == 'undefined') {
                alert('Vui lòng chọn thuộc tính');
                attributes = '';
            } else {
                attributes = attr;
                // if($('body').find('#variants')) {
                //     openCity(event, 'variants');
                //     $('body').find(".tablink-variants").addClass('active');
                // }
                alert('Thêm thuộc tính thành công');
            }
        })
        $('body').on('click', '.tablink-variants', function (e) {
            e.preventDefault();
            var attr = attributes;
            //console.log(attr);
            var NOTSIMPLE = $('body').find('#NOTSIMPLE').val();
            console.log(NOTSIMPLE);
            if (typeof NOTSIMPLE != 'string' || NOTSIMPLE != 'NOTSIMPLE') {
                if (attr.length == 0 || typeof attr == 'undefined') {
                    $('body').find('#variants').html('<h4>Vui lòng chọn thuộc tính!</h4>');
                } else {
                    $('body').find('#variants').html($('body').find('.hidden-div').html());
                    $('body').find('.div-add-var').append(`<input type="hidden" name="NOTSIMPLE" id="NOTSIMPLE" class="NOTSIMPLE" value="NOTSIMPLE">`);

                }
            }

        })



        var count = 0;
        $('body').on('click', '#add-variant', function () {

            $('body').find('#content-variants').prepend(`
        <div class="variant">
            <div class="panel panel-default">
                <div style="display:flex" class="panel-heading">
                    <h3 style="width: 30%" class="panel-title">
                        <input type="hidden" value="${attributes}" name="this_attribute_id">
                        <select name="data[${count}][value_id]" class="form-control value_id" id="v_value_${count}">
                            <option value="">--- Chọn thuộc tính ---</option>
                        </select>
                    </h3>
                    <div style="padding: 8px; width: 60%: display:flex: justify-content: space-around" class="">
                        <span style="cursor: pointer" class="clickable panel-collapsed pull-right"><i
                                class="glyphicon glyphicon-chevron-up"></i></span>
                        <span style="cursor: pointer" class="pull-right"><i class="remove-variant glyphicon glyphicon-remove"></i></span>
                    </div>
                </div>
                <div style="display:none" class="panel-body">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="">Giá <span class="errors text-danger text-bold error_data_${count}_regular_price"></span></label>
                            <input required min="1" type="number" class="regular_price form-control" name="data[${count}][regular_price]" id="v_regular_price_${count}">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="">Giá khuyễn mãi <span class="errors text-danger text-bold error_data_${count}_sale_price"></span></label>
                            <input required min="1" type="number" class="sale_price form-control" name="data[${count}][sale_price]" id="v_sale_price_${count}">


                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="">Trạng thái <span class="errors text-danger text-bold error_data_${count}_status"></span></label>
                            <select name="data[${count}][status]" id="v_status_${count}" class="status form-control">
                                <option value="1">Còn hàng</option>
                                <option value="-1">Hết hàng</option>
                            </select>

                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        `);
            var artists_select2 = $('body').find(".value_id:last-child").select2({
                ajax: {
                    url: "{{ route('admin.attribute.dataValues') }}",
                    type: "post",
                    dataType: 'json',
                    delay: 500,
                    data: function (params) {
                        return {
                            q: $.trim(params.term),
                            s: attributes,
                            _token: "{{csrf_token()}}"
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.name,
                                    id: item.id,
                                    value: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
            count++;
        });

        $('body').on('click', '.remove-variant', function () {
            var c = confirm('Bạn chắc chắn muốn xoá biến thể này?');
            if (c == true) {
                $(this).parents('.variant').remove();
            } else {
                alert('nooooo');
            }
        })















    })

</script>



<script>
    jQuery('body').on('click', '#choose_image_product', function () {
        CKFinder.popup({
            chooseFiles: true,
            onInit: function (finder) {
                finder.on('files:choose', function (evt) {
                    var file = evt.data.files;
                    file.forEach(function (e) {
                        var url = e.getUrl();
                        jQuery('#box-img').html(`
                                <div class="img2">
                                    <img src="${url}" alt="image">
                                    <input type="hidden" name="image"
                                        value="${url}">
                                    <i class="btn-remove fa fa-times"></i>
                                </div>
								`)
                    });
                });
            }
        });
    });
    jQuery('#box-img').on('click', '.img2 .btn-remove', function () {
        jQuery(this).parent().html(`<div class="img2">
                        <i style="border:none;position: absolute;left: 40%;top: 44%;font-size: 23px;" id="choose_image_product" class="choose_image_product glyphicon glyphicon-plus"></i>
                    </div>`);
    });

</script>
<script>
    jQuery('body').on('click', '.choose_gallery', function () {
        CKFinder.popup({
            chooseFiles: true,
            onInit: function (finder) {
                finder.on('files:choose', function (evt) {
                    var file = evt.data.files;
                    file.forEach(function (e) {
                        var url = e.getUrl();
                        jQuery('.gallery').append(`
                            <div class="img">
                                <img src="${url}" alt="image">
                                <input type="hidden" name="gallery[]" value="${url}">
                                <i class="fa fa-times btn-remove"></i>
                            </div>`)
                    });
                });
            }
        });
    });

    jQuery('.gallery').on('click', '.img .btn-remove', function () {
        jQuery(this).parent().remove();
    });

</script>
<script>
    var flag = false;

    function responseFunc(x) {
        flag = x;
    }

    function getflag() {
        return flag;
    }

    function submitForm() {
        var infomation = new FormData($('form#infomation')[0]);
        var images = new FormData($('form#images')[0]);
        var form_variants = $('body').find('form#variants');
        var variants = new FormData(form_variants[0]);
        var allData = new FormData;
        for (var pair of infomation.entries()) {
            allData.append(pair[0], pair[1]);
        }
        for (var pair of images.entries()) {
            allData.append(pair[0], pair[1]);
        }
        for (var pair of variants.entries()) {
            allData.append(pair[0], pair[1]);
        }
        var data_content = CKEDITOR.instances.content.getData();
        allData.append('content', data_content);
        allData.append('is_simple', $('body').find('#is_simple').val());
        allData.append('category_id', $('body').find('#category_id').val());
        allData.append('g_sale_price', $('body').find('#g_sale_price').val());
        allData.append('g_regular_price', $('body').find('#g_regular_price').val());
        allData.append('status', $('body').find('#g_status').val());

        $.ajax({
            url: "{{ route('admin.products.saveEdit', ['id' => $product->id]) }}",
            method: 'post',
            processData: false,
            contentType: false,
            data: allData,
        }).done(
            result => {
                console.log(result);
                if (result.errors == true) {
                    responseFunc(false);
                    var msg = result.messages;

                    var msg_keys = Object.keys(msg);
                    console.log(msg);
                    $('body').find('.errors').html('');
                    msg_keys.forEach(function (item, index) {
                        console.log(item);
                        var ele = 'error_' + item;
                        var ele = ele.replace(new RegExp('\\.', 'g'), '_');
                        console.log(ele);
                        if (typeof msg[item] == "object") {
                            $('body').find('.' + ele).html(msg[item]);

                        } else {
                            $('body').find('.' + ele).html('');
                        }
                        if(typeof msg['g_regular_price'] == "object") {
                            $('body').find('.tablink-general').css({'color': 'red'});
                        } else {
                            $('body').find('.tablink-general').css({'color': 'black'});
                        }
                        if(typeof msg['data'] == "object") {
                            $('body').find('.tablink-variants').css({'color': 'red'});
                        } else {
                            $('body').find('.tablink-variants').css({'color': 'black'});
                        }
                    });

                } else {
                    swal({
                        title: "Yeee!",
                        text: "Thêm danh mục thành công!",
                        icon: "success",
                        button: "OK",
                    }).then(function () {
                        if (getflag() == false) {
                            window.location.reload();
                        } else {
                            window.location.href = "{{ route('admin.products.index') }}";
                        }
                    });
                }
            });
    }
    $('body').on('click', '.btn-save-all', function (e) {
        responseFunc(false);
        submitForm();

    })
    $('body').on('click', '.btn-save-all-exit', function (e) {
        e.preventDefault();
        responseFunc(true);
        submitForm();

    })

</script>


<script>
    // ******
    $(function () {
        $('body').on('keyup', '#name', function () {
            ChangeToSlug('name', 'slug');
        });
    })

    $(function () {
        //$('body').on('click', '.panel-heading', function () {
        //  var $this = $(this).find('span.clickable');
        //if (!$this.hasClass('panel-collapsed')) {
        //  $this.parents('.panel').find('.panel-body').slideUp();
        //       $this.addClass('panel-collapsed');
        //     $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
        //
        //          } else {
        //            $this.parents('.panel').find('.panel-body').slideDown();
        //          $this.removeClass('panel-collapsed');
        //        $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
        //
        //          }
        //    })

        //  /$('body').on('click', '.value_id', function () {
        //     alert('1');
        //  $(this).parents('.panel-heading').unbind();
        //});
    })

    // ******

</script>









<div style="display:none" class="hidden-div">
    <div class="form-group div-add-var">
        <button id="add-variant" class="btn btn-bitbucket btn-flat">Thêm biến thể</button>
    </div>
    <form id="variants">
        <div id="content-variants" class="content-variants">

        </div>
    </form>
</div>






@endsection
