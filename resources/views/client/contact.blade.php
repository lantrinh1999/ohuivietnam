@extends('client.layout.master')
@section('page_title')
    Liên hệ
@endsection
@section('content')

{{-- {{dd('aaa')}} --}}
<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="{{route('/')}}">Trang chủ</a>
                </li>
                <li class="active">Liên hệ</li>
            </ul>
        </div>
    </div>
</div>
<div class="contact-area pt-100 pb-100">
    <div class="container">
        <div class="contact-map mb-10">
            <div id="map"></div>
        </div>
        <div class="custom-row-2">
            <div class="col-lg-4 col-md-5">
                <div class="contact-info-wrap">
                    <div class="single-contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="contact-info-dec">
                            <p>+012 345 678 102</p>
                            <p>+012 345 678 102</p>
                        </div>
                    </div>
                    <div class="single-contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="contact-info-dec">
                            <p><a href="#">urname@email.com</a></p>
                            <p><a href="#">urwebsitenaem.com</a></p>
                        </div>
                    </div>
                    <div class="single-contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="contact-info-dec">
                            <p>Address goes here, </p>
                            <p>street, Crossroad 123.</p>
                        </div>
                    </div>
                    <div class="contact-social text-center">
                        <h3>Follow Us</h3>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                            <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="contact-form">
                    <div class="contact-title mb-30">
                        <h2>Liên hệ</h2>
                    </div>
                    <form class="contact-form-style" id="contact-form_" action="" method="post">
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <input class="form-control" name="name" placeholder="Tên*" type="text">
                            </div>
                            <div class="col-lg-6 form-group">
                            <input name="email" class="form-control" {{ Auth::check() ? 'readonly' : ''}} value="{{ Auth::check() ? Auth::user()->email : ''}}" placeholder="Email*" type="email">
                            </div>
                            <div class="col-lg-12 form-group">
                                <input name="title" class="form-control" placeholder="Tiêu đề*" type="text">
                            </div>
                            <div class="col-lg-12 form-group">
                                <textarea style="height: 130px !important" name="content" class="form-control" placeholder="Nội dung*"></textarea>
                                <button class="submit" type="submit">Gửi</button>
                            </div>
                        </div>
                    </form>
                    <p class="form-messege"></p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
    <script>
    $(document).on('submit','#contact-form_',function(e) {
		e.preventDefault();
		
		html = '';
		var formData = new FormData($('form#contact-form_')[0]);
		formData.set('_token',`{{csrf_token()}}`);
		$.ajax({
		url : `{{route('submitContact')}}`,
		processData: false,
		contentType: false,
		method: 'POST',
        beforeSend : function () {
            $('#roller_load').css('display','block');
            $('.ohui_container').css('opacity','0.5');
            $('#roller_load').css('opacity','1');
        },
		data: formData,
			success:function(data){ 
                console.log(data);
                $('.ohui_container').css('opacity','1');
                $('#roller_load').css('display','none');
				if (data.errors) {	
                        if (typeof data.messages.name != 'undefined') {
					        html += `<li>${data.messages.name[0]}</li>`;   
                        }
                        if (typeof data.messages.email != 'undefined') {
                            html += `<li>${data.messages.email[0]}</li>`;
                        }
                        if (typeof data.messages.title != 'undefined') {
                            html += `<li>${data.messages.title[0]}</li>`;
                        }
                        if (typeof data.messages.content != 'undefined') {
                            html += `<li>${data.messages.content[0]}</li>`;
                        }
                        
                        Swal.fire({
                            icon: 'error',
                            html:
                                `<ul style="text-decoration: none;line-height: 2;font-size: 15px;">${html}</ul>`,      
                            focusConfirm: false,
                            confirmButtonText:
                                ' Ok!',	
                        })   
                 
				}else{
                    Swal.fire({
                        icon: 'success',
                        html:
                            `<ul style="text-decoration: none;line-height: 2;font-size: 15px;">${data.messages[0]}</ul>`,      
                        focusConfirm: false,
                        confirmButtonText:
                            ' Ok!',	
                        
                    }).then((result) => {
                            window.location.reload();
                        })
                    
				}
			},
		});
	})
    </script>
@endsection