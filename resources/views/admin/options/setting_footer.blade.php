@extends('admin.layout.master')

@section('title')
Thiết lập chân trang
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
                            
                            <li class="active"><a href="#tab_2" data-toggle="tab">Thiết lập chân trang</a></li>
                           

                        </ul>
                        <div class="tab-content">
                           
                            <!-- /.tab-pane -->
                            <div class="tab-pane active" id="tab_2" style="margin-left:-15px">
                            <form id="form-slide" method="POST" action="{{route('admin.options.setting_footer')}}">
                                @csrf
                                    <div class="col-md-10 col-slide">
                                    
                                        <div data-num="0" class="e-slide">               
                                            <div class="form-group">
                                                <label for="">Nội dung</label>
                                                <textarea class="form-control" name="setting_footer" id="content"
                                            cols="30" rows="10">{{!empty(get_option('setting_footer')) ? get_option('setting_footer') : '' }}</textarea>
                                            </div>
                                        </div>
                                      
                                    </div>
                                    <br>
                                    <div class="col-sm-12">
                                        <button form="form-slide" class="btn btn-success" type="submit">Lưu</button>
                                    </div>
                                </form>
                            </div>
                           
                          
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- nav-tabs-custom -->
                </div>
             


            </div>
            
        </div>
    </div>
</div>


@endsection

@section('js')



<script>
    CKEDITOR.replace('content', {});

</script>


@endsection