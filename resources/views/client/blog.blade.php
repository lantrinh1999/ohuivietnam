@extends('client.layout.master')
@section('page_title')
    Tin tức
@endsection
@section('content')
<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                <a href="{{route('/')}}">Trang chủ</a>
                </li>
                <li class="active">Tin tức</li>
            </ul>
        </div>
    </div>
</div>
<div class="Blog-area pt-100 pb-100 blog-no-sidebar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    @foreach ($posts as $item)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="blog-wrap-2 mb-30">
                                <div class="blog-img-2">
                                <a href="{{route('detail_post',['slug' => $item->slug])}}"><img src="{{!empty($item->image) ? $item->image : asset('images/default.png')}}" alt=""></a>
                                </div>
                                <div class="blog-content-2">
                                    <div class="blog-meta-2">
                                        <ul>
                                            @php
                                                $date = date_create($item->created_at);
                                                // echo date_format($date);
                                            @endphp
                                            <li>{{date_format($date,"d-m-Y")}}</li>
                                            {{-- <li><a href="#">4 <i class="fa fa-comments-o"></i></a></li> --}}
                                        </ul>
                                    </div>
                                <h4><a href="{{route('detail_post',['slug' => $item->slug])}}">{{$item->name}}</a></h4>
                                @php
                                if (strlen($item->description) > 150) {
                                    $description = substr($item->description,150).'...';
                                }else{
                                    $description = $item->description;
                                }
                                @endphp
                                    <p>{{$description}}</p>
                                    <div class="blog-share-comment">
                                        <div class="blog-btn-2">
                                            <a href="{{route('detail_post',['slug' => $item->slug])}}">Xem tiếp</a>
                                        </div>
                                        <div class="blog-share">
                                            
                                            <div class="share-social">
                                                <ul>
                                                    <li><a class="facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{route('detail_post',['slug' => $item->slug])}}"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a class="twitter" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{route('detail_post',['slug' => $item->slug])}}ttps://www.facebook.com/sharer/sharer.php?u={{route('detail_post',['slug' => $item->slug])}}"><i class="fa fa-twitter"></i></a></li>
                                                    {{-- <li><a class="instagram" target="_blank" href="https://www.instagram.com/sharer.php?u={{route('detail_post',['slug' => $item->slug])}}"><i class="fa fa-instagram"></i></a></li> --}}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach    
                </div>
                {{$posts->links()}}
               
            </div>
        </div>
    </div>
</div>
@endsection