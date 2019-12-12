<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('page_title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif !important;
        }
        .main-menu nav ul li {
            font-size: 18px;

        }
    </style>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('client')}}/img/favicon.png">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('client')}}/css/bootstrap.min.css">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{asset('client')}}/css/icons.min.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('client')}}/css/plugins.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('client')}}/css/style.css">
    <!-- Modernizer JS -->
    <script src="{{asset('client')}}/js/vendor/modernizr-2.8.3.min.js"></script>
    @yield('css')

</head>

<body>
    <div class="ohui_container">
    @include('client.layout.header')

    @yield('content')

    @include('client.layout.footer')
    </div>
    <div id="roller_load">
        <div class="lds-roller">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
  
    <!-- JS
    ============================================ -->

    <!-- jQuery JS -->
    <script src="{{url('client/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- Popper JS -->
    <script src="{{url('client/js/popper.min.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{url('client/js/bootstrap.min.js')}}"></script>
    <!-- Plugins JS -->
    <script src="{{url('client/js/plugins.js')}}"></script>
    <!-- Ajax Mail -->
    <script src="{{url('client/js/ajax-mail.js')}}"></script>

    <!-- Main JS -->
    <script src="{{url('client/js/main.js')}}"></script>
    <script src="{{url('client/js/custom.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        $(document).on('click','.add_wishlist',function(){
            @if(Auth::check())
                scope = $(this);
                if(scope.hasClass('checked')){
                    scope.removeClass('checked');
                }else{
                    scope.addClass('checked');
                }
                product_id = $(this).attr('product-id');
                $.ajax({
                    type:'POST',
                    url:`{{route('add_wishlist')}}`,
                    data:{
                        product_id : product_id,
                        user_id :  `{{Auth::user()->id}}`,
                        _token : `{{csrf_token()}}`,
                    },
                    success:function(data){
                       if (!data.errors) {
                           Swal.fire(
                            'Thành công',
                            `${data.messages}`,
                            'success',
                            )
                       }
                    }
                });
            @else
                Swal.fire(
                    'Có lỗi?',
                    'Đăng nhập để sử dụng chức năng này !',
                    'error'
                )
            @endif
        })
    </script>
    @yield('js')
    </body>
    
    </html>
