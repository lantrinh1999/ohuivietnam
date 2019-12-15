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
    .error {
        color: red;
        font-weight: bold;
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
@php
    $contact  = get_option('contact');
    if(!empty($contact)){
        $contact = json_decode($contact);
    }

@endphp
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

        <form id="form-contact" method="post" action="{{ route('admin.options.saveContact') }}">
            <div class="">
                <div class="form-group col-md-12">
                    <label for="">Bản đồ</label>
                    <div class="error error_map"></div>
                    <input value="{{ !empty($contact->map) ? $contact->map : '' }}" type="text" class="form-control map" name="map" id="map">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Số điện thoại</label>
                    <div class="error error_phone"></div>
                    <input value="{{ !empty($contact->phone) ? $contact->phone : '' }}" type="text" class="form-control phone" name="phone" id="phone">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Email</label>
                    <div class="error error_email"></div>
                    <input value="{{ !empty($contact->email) ? $contact->email : '' }}" type="text" class="form-control email" name="email" id="email">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Địa chỉ</label>
                    <div class="error error_address"></div>
                    <input value="{{ !empty($contact->address) ? $contact->address : '' }}" type="text" class="form-control address" name="address" id="address">
                </div>
                <div class="form-group  col-md-12">
                    <button type="submit" class="btn btn-success">Lưu</button>
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
        $('body').on('submit', '#form-contact', function (e) {
            e.preventDefault();
            var formData = new FormData($('form#form-contact')[0]);
            $.ajax({
                url: "{{ route('admin.options.saveContact') }}",
                method: 'POST',
                processData: false,
                contentType: false,
                data: formData,
            }).done(
                result => {
                    if (result.errors == true) {

                        $('body').find(".error").html(' ');
                        if (typeof result.messages.map == 'object') {
                            $('body').find(".error_map").html(result.messages.map);
                        }
                        if (typeof result.messages.phone == 'object') {
                            $('body').find(".error_phone").html(result.messages.phone);
                        }
                        if (typeof result.messages.email == 'object') {
                            $('body').find(".error_email").html(result.messages.email);
                        }
                        if (typeof result.messages.address == 'object') {
                            $('body').find(".error_address").html(result.messages.address);
                        }
                        if (typeof result.messages.facebook == 'object') {
                            $('body').find(".error_facebook").html(result.messages.facebook);
                        }
                    } else {
                        $('body').find(".error").html(' ');
                        alert('Lưu thành công');
                    }
                }
            )
        })
    })

</script>
@endsection
