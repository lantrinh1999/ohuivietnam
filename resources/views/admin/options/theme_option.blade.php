@extends('admin.layout.master')

@section('title')
Thiết lập chung
@endsection
@section('action')
@endsection

@section('style')
<style>
    .box-icon {
        padding: 0px !important;
        width: 50px;
        height: 50px;
        border-radius: 0;
        box-shadow: none;
        border: 1px solid #d2d6de;
        position: relative;
    }

    .nav-tabs-custom>.nav-tabs>li.active {
        border-top-color: #ff0000;
        font-weight: bold !important;
    }

    .choose-icon {
        text-align: center;
        margin: 0 auto;
        margin-left: 17px;
        cursor: pointer;
        margin-top: 15px;
    }

    .error {
        font-style: italic;
        color: red;
        font-weight: bold;
    }

    .gallery2 {
        border: 1px solid #d2d6de;
        height: auto;
        width: 300px;
        display: flex;
        padding: 3px;
        margin: 5px 0px;
    }

    .gallery3 {
        border: 1px solid #d2d6de;
        height: auto;
        width: 50px;
        height: 20px;
        padding: 3px;
        margin: 5px 0px;
    }

    .gallery3 .img3 {
        display: inline-block;
        width: 50px;
        padding: 5px;
        margin-bottom: 10px;
        position: relative;
        max-height: 20px;
        overflow: hidden;
    }

    .gallery2 .img2 {
        display: inline-block;
        width: 300px;
        padding: 5px;
        margin-bottom: 10px;
        position: relative;
        min-height: 100px;
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

    .btn-remove-icon {
        position: absolute;
        top: 0;
        right: 0;
        display: inline-block;
        padding: 3px;
        background: #aaa;
        color: #000;
        font-weight: bold;
        cursor: pointer;
        border: 1px solid #d2d6de;
        border-radius: 4px;
        display: none;
    }
    .img-icon:hover .btn-remove-icon {
        display: block;
    }

</style>
@endsection

@section('content')

<div class="row">

    <div class="col-sm-12">
        <div class="box">
            <div class="box-header">
                {{-- <h3 class="box-title">Danh sách màu</h3> --}}
            </div>
            <!-- ********** -->
            <!-- ********** -->
            <div class="box-body">

                <div class="col-md-10">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Logo</a></li>
                            <li><a href="#tab_2" data-toggle="tab">Slideshow</a></li>
                            <li><a href="#tab_3" data-toggle="tab">Điểm thưởng</a></li>
                            <li><a href="#intro_service" data-toggle="tab">Giới thiệu dịch vụ</a></li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="form-group">
                                    <form action="" id="logo" method="post">
                                        <label for="">Logo <span class="error error-logo"></span></label>
                                        <div id="box-img" class="box-img gallery2">
                                            <div class="img2">
                                                @if (!empty(get_option('logo')))
                                                <img src="{{ get_option('logo') }}" alt="image">
                                                <input type="hidden" name="logo" value="{{ get_option('logo') }}">
                                                <i class="btn-remove fa fa-times"></i>

                                                @else
                                                <i style="border:none;position: absolute;left: 40%;top: 44%;font-size: 23px;"
                                                    id="choose_image_product"
                                                    class="choose_image_product glyphicon glyphicon-plus"></i>

                                                @endif
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <button class="btn btn-primary choose_image" id="choose_image" type="button">Chọn
                                    ảnh</button>
                                <button class="btn btn-success" form="logo" id="ghvjhkn" type="submit">Lưu</button>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2" style="margin-left:-15px">
                                <form id="form-slide">
                                    <div class="col-md-10 col-slide">
                                        @php
                                        $slides = get_option('slide');
                                        $count_slide = 0;
                                        if(!empty($slide)){
                                            $slides = json_decode($slides);
                                        }
                                        @endphp
                                        @if (!empty($slides) && is_object($slides))
                                        @php
                                        @endphp
                                        @foreach ($slides as $slide)
                                        <div data-num="{{ $count_slide }}" class="e-slide">
                                            <div class="form-group">
                                                <label for="">Tiêu đề</label>
                                                <input value="{{ $slide->title }}" type="text" class="form-control"
                                                    name="slide[{{ $count_slide }}][title]">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nội dung</label>
                                                {{-- <input value="{{ $slide->content }}" type="text"
                                                class="form-control"
                                                name="slide[{{ $count_slide }}][content]"> --}}
                                                <textarea class="form-control" name="slide[{{ $count_slide }}][content]"
                                                    id="content" cols="30" rows="10">{{ $slide->content }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Link</label>
                                                <input value="{{ $slide->link }}" type="text" class="form-control"
                                                    name="slide[{{ $count_slide }}][link]">
                                            </div>
                                            <div data-num="{{ $count_slide }}" class="form-group form-image-slide">
                                                <label for="image">Chọn ảnh</label>
                                                <div data-num="{{ $count_slide }}" class="box-img-slide gallery2">
                                                    <div class="img2">
                                                        <img src="{{ $slide->image }}" alt="image">
                                                        <input type="hidden" name="slide[{{ $count_slide }}][image]"
                                                            value="{{ $slide->image }}">
                                                        <i class="btn-remove-image fa fa-times"></i>
                                                    </div>
                                                </div>
                                                <br>
                                                <div>
                                                    <a class="btn btn-primary choose_image-slide" type="button">Chọn
                                                        ảnh</a>
                                                </div>
                                                <br>
                                                {{-- <div class="div-actions">
                                                    <a class="btn btn-remove-slide btn-danger">Xoá slide</a>
                                                    <a class="btn btn-more-slide btn-bitbucket">Thêm slide</a>
                                                </div> --}}
                                            </div>
                                            <hr>
                                        </div>
                                        @php
                                        $count_slide++;
                                        break;
                                        @endphp
                                        @endforeach
                                        @else
                                        <div data-num="0" class="e-slide">
                                            <div class="form-group">
                                                <label for="">Tiêu đề</label>
                                                <input type="text" class="form-control" name="slide[0][title]"
                                                    data-abc="1425385370">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nội dung</label>
                                                {{-- <input type="text" class="form-control" name="slide[0][content]"
                                                    data-abc="3226813747"> --}}
                                                <textarea class="form-control" name="slide[0][content]" id="content"
                                                    cols="30" rows="10"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Link</label>
                                                <input type="text" class="form-control" name="slide[0][link]"
                                                    data-abc="1768829876">
                                            </div>
                                            <div data-num="0" class="form-group form-image-slide">
                                                <label for="image">Chọn ảnh</label>
                                                <div data-num="0" class="box-img-slide gallery2">
                                                    <div class="img2">
                                                        <div class="img2">
                                                            <i style="border:none;position: absolute;left: 40%;top: 44%;font-size: 23px;"
                                                                class="choose_image_slide glyphicon glyphicon-plus"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div>
                                                    <a class="btn btn-primary choose_image-slide" type="button">Chọn
                                                        ảnh</a>
                                                </div>
                                                <br>
                                                {{-- <div class="div-actions">
                                                    <a class="btn btn-remove-slide btn-danger">Xoá slide</a>
                                                    <a class="btn btn-more-slide btn-bitbucket">Thêm slide</a>
                                                </div> --}}
                                            </div>
                                            <hr>
                                        </div>
                                        @endif

                                    </div>
                                    <br>
                                    <div class="col-sm-12">
                                        <button form="form-slide" class="btn btn-success" type="submit">Lưu
                                            slide</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3">
                                <form id="point">
                                    <div class="form-group">
                                        <label for="">Điểm thưởng khi giới thiệu <span
                                                class="error error_point_introduce"></span></label>
                                        <input
                                            value="{{ !empty(get_option('point_introduce')) ? get_option('point_introduce') : 0 }}"
                                            type="number" class="form-control" min="0" name="point_introduce">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Điểm thưởng khi mua hàng (Trên mỗi 10000 VNĐ) <span
                                                class="error error_point_bonus"></span></label>
                                        <input type="number"
                                            value="{{ !empty(get_option('point_bonus')) ? get_option('point_bonus') : 0 }}"
                                            class="form-control" min="0" name="point_bonus">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success" type="submit">Lưu</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="intro_service">
                                <form id="form-intro_service">
                                    <br>
                                    <div class="row">
                                        <div class="form-group col-sm-4">
                                            <label for="">Tiêu đề 1</label>
                                            <input type="text" class="form-control service_title"
                                                name="service[1][title]" id="service_title_1">
                                        </div>
                                        <div class="form-group col-sm-5">
                                            <label for="">Giới thiệu 1</label>
                                            <input type="text" class="form-control service_des" name="service[1][des]"
                                                id="service_des_1">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="">Icon 1</label>
                                            <div class="box-icon" data-num="1">
                                                <i class="choose-icon glyphicon glyphicon-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-4">
                                            <label for="">Tiêu đề 2</label>
                                            <input type="text" class="form-control service_title"
                                                name="service[2][title]" id="service_title_2">
                                        </div>
                                        <div class="form-group col-sm-5">
                                            <label for="">Giới thiệu 2</label>
                                            <input type="text" class="form-control service_des" name="service[2][des]"
                                                id="service_des_2">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="">Icon 2</label>
                                            <div class="box-icon" data-num="2">
                                                <i class="choose-icon glyphicon glyphicon-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-4">
                                            <label for="">Tiêu đề 3</label>
                                            <input type="text" class="form-control service_title"
                                                name="service[3][title]" id="service_title_3">
                                        </div>
                                        <div class="form-group col-sm-5">
                                            <label for="">Giới thiệu 3</label>
                                            <input type="text" class="form-control service_des" name="service[3][des]"
                                                id="service_des_3">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="">Icon 3</label>
                                            <div class="box-icon" data-num="3">
                                                <i class="choose-icon glyphicon glyphicon-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-4">
                                            <label for="">Tiêu đề 4</label>
                                            <input type="text" class="form-control service_title"
                                                name="service[4][title]" id="service_title_4">
                                        </div>
                                        <div class="form-group col-sm-5">
                                            <label for="">Giới thiệu 4</label>
                                            <input type="text" class="form-control service_des" name="service[4][des]"
                                                id="service_des_4">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="">Icon 4</label>
                                            <div class="box-icon" data-num="4">
                                                <i class="choose-icon glyphicon glyphicon-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                             <button class="btn btn-success" type="submit">Lưu</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- nav-tabs-custom -->
                </div>
                {{-- <div class="col-md-2">
                    <button class="btn btn-success">Lưu</button>
                </div> --}}
                <!-- /.col -->


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
<script src="http://cosmetic.linhlatin.com/assets/plugins/jquery.nestable.js"></script>



<!-------- LOGO -------->
<script>
    $('body').on('click', '.choose_image', function () {
        $('body').find('#choose_image_product').click();
    })
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
                                    <input type="hidden" name="logo"
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
    $('body').on('submit', '#logo', function (e) {
        e.preventDefault();
        var dataLogo = new FormData($('form#logo')[0]);
        $.ajax({
            url: "{{ route('admin.options.saveLogo') }}",
            method: 'post',
            processData: false,
            contentType: false,
            data: dataLogo,
        }).done(result => {
            console.log(result);
            if (result.errors == true) {
                console.log(result.messages.logo);
                $('body').find('.error-logo').html(result.messages.logo);
            } else {
                $('body').find('.error-logo').html(' ');
                swal({
                    title: "Thông báo",
                    text: "Thêm logo thành công!",
                    icon: "success",
                    button: "OK",
                });
            }
        })
    })

</script>
<!-------- //LOGO -------->


<!-------- Slideshow -------->

<script>
    $('body').on('click', '.choose_image-slide', function () {
        $(this).parents('.form-image-slide').find('.choose_image_slide').click();
    })
    jQuery('body').on('click', '.choose_image_slide', function () {
        console.log('aaaaa');
        var $this = $(this);
        CKFinder.popup({
            chooseFiles: true,
            onInit: function (finder) {
                finder.on('files:choose', function (evt) {
                    var file = evt.data.files;
                    file.forEach(function (e) {
                        var url = e.getUrl();
                        var numb = $($this).parents('.form-image-slide').data(
                            'num');
                        jQuery($this).parents('.form-image-slide').find(
                            '.box-img-slide').html(`
                                <div class="img2">
                                    <img src="${url}" alt="image">
                                    <input type="hidden" name="slide[${numb}][image]"
                                        value="${url}">
                                    <i class="btn-remove-image fa fa-times"></i>
                                </div>
								`)
                    });
                });
            }
        });
    });
    jQuery('body').on('click', '.col-slide .btn-remove-image', function () {
        jQuery(this).parent().html(`<div class="img2">
                        <i style="border:none;position: absolute;left: 40%;top: 44%;font-size: 23px;" class="choose_image_slide glyphicon glyphicon-plus"></i>
                    </div>`);
    });

</script>

<script>
    $(function () {
        var count = 9999999;

        function html(num) {
            var html = `
        <div data-num="${num}" class="e-slide">
                                        <div class="form-group">
                                            <label for="">Tiêu đề</label>
                                            <input type="text" class="form-control" name="slide[${num}][title]"
                                                data-abc="1425385370">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nội dung</label>
                                            <input type="text" class="form-control" name="slide[${num}][content]"
                                                data-abc="3226813747">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Link</label>
                                            <input type="text" class="form-control" name="slide[${num}][link]"
                                                data-abc="1768829876">
                                        </div>
                                        <div data-num="${num}" class="form-group form-image-slide">
                                            <label for="image">Chọn ảnh</label>
                                            <div data-num="${num}" class="box-img-slide gallery2">
                                                <div class="img2">
                                                    <div class="img2">
                                                        <i style="border:none;position: absolute;left: 40%;top: 44%;font-size: 23px;"
                                                            class="choose_image_slide glyphicon glyphicon-plus"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>


                                            <div>
                                                <a class="btn btn-primary choose_image-slide" type="button">Chọn
                                                ảnh</a>
                                            </div>
                                            <br>
                                            <div class="div-actions">
                                                <a class="btn btn-remove-slide btn-danger">Xoá slide</a>
                                                <a class="btn btn-more-slide btn-bitbucket">Thêm slide</a>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
        `;
            return html;
        }
        // thêm slide
        $('body').on('click', '.btn-more-slide', function (e) {
            count++
            $(this).parents('.e-slide').after(html(count));
        })
        // xoá slide
        $('body').on('click', '.btn-remove-slide', function (e) {
            var conf = confirm('Bạn muốn xoá slide này?');
            if (conf == true) {
                $(this).parents('.e-slide').remove();

            }
        })
    })

</script>
{{-- submit slide --}}
<script>
    $('body').on('submit', '#form-slide', function (e) {
        e.preventDefault();
        var dataSlide = new FormData($('form#form-slide')[0]);
        $.ajax({
            url: "{{ route('admin.options.saveSlide') }}",
            method: 'post',
            processData: false,
            contentType: false,
            data: dataSlide,
        }).done(result => {
            console.log(result);
            if (result.errors == true) {
                //console.log(result.messages.logo);
                //$('body').find('.error-logo').html(result.messages.logo);
            } else {
                //$('body').find('.error-logo').html(' ');
                swal({
                    title: "Thông báo",
                    text: "Thêm slide thành công!",
                    icon: "success",
                    button: "OK",
                });
            }
        })
    })

</script>
<!-------- //Slideshow -------->
<script>
    CKEDITOR.replace('content', {});

</script>


<!------ point -------->
<script>
    $('body').on('submit', '#point', function (e) {
        e.preventDefault();
        var dataPoint = new FormData($('form#point')[0]);
        $.ajax({
            url: "{{ route('admin.options.savePoint') }}",
            method: 'post',
            processData: false,
            contentType: false,
            data: dataPoint,
        }).done(result => {
            console.log(result);
            if (result.errors == true) {
                console.log(result.messages.logo);
                if (result.messages.point_introduce) {
                    $('body').find('.error_point_introduce').html(result.messages.point_introduce);
                }
                if (result.messages.point_bonus) {
                    $('body').find('.error_point_bonus').html(result.messages.point_bonus);
                }
            } else {
                $('body').find('.error_point_bonus').html('');
                $('body').find('.error_point_introduce').html('');
                swal({
                    title: "Thông báo",
                    text: "Sửa điểm thành công!",
                    icon: "success",
                    button: "OK",
                });
            }
        });
    })

</script>
<!------ end point -------->

<!------ intro service -------->
<script>
    $(function () {
        $('body').on('click', '.choose-icon', function (e) {
            var $this = $(this);
            var $par = $this.parent();
            var num = $par.data('num');
            console.log(num);
            e.preventDefault();
            CKFinder.popup({
                chooseFiles: true,
                onInit: function (finder) {
                    finder.on('files:choose', function (evt) {
                        var file = evt.data.files;
                        file.forEach(function (e) {
                            var url = e.getUrl();
                            $this.parent().html(`
                                <div style="display:overflow" class="img-icon">
                                    <img style="height: 100%; width:100%" src="${url}" alt="image">
                                    <i class="btn-remove-icon fa fa-times"></i>
                                    <input type="hidden" name="service[${num}][icon]"
                                        value="${url}">
                                </div>
								`);
                        });
                    });
                }
            });

        })
    })

</script>
<script>
    $(function(){
        $('body').on('click', '.btn-remove-icon', function(){
            $(this).parents('.box-icon').html('<i class="choose-icon glyphicon glyphicon-plus"></i>');
        })
    })
</script>
<script>
    $(function(){
        $('body').on('submit', '#form-intro_service', function(e){
            e.preventDefault();
            var formData = new FormData($('form#form-intro_service')[0]);
            $.ajax({
            url: "{{ route('admin.options.saveService') }}",
            method: 'post',
            processData: false,
            contentType: false,
            data: formData,
        }).done(result => {
            console.log(result);
            if (result.errors == true) {
                console.log(result.messages.logo);
                swal({
                    title: "Thông báo",
                    text: "Nhập đầy đủ các mục!",
                    icon: "warning",
                });
            } else {
                swal({
                    title: "Thông báo",
                    text: "Thành công!",
                    icon: "success",
                    button: "OK",
                });
            }
        });

        })
    })
</script>

<!------ end intro service -------->




@endsection
