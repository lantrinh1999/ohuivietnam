@extends('client.layout.master')
@section('page_title')
    {{$post->name}}
@endsection
@section('css')
<style>
    .dec-img-wrapper img{
        width: 100%;
    }
</style>
@endsection
@section('content')
<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <div class="breadcrumb-content text-center">
                <ul>
                    <li><a href="{{route('/')}}"">TRANG CHỦ</a></li>
                    <li><a href="{{route('list_post')}}">TIN TỨC</a></li>
                    <li>{{$post->name}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="Blog-area pt-100 pb-100">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-12">
                <div class="blog-details-wrapper ml-20">
                    <div class="blog-details-top">
                        <div class="blog-details-img">
                            <img alt="" src="{{$post->image}}">
                        </div>
                        <div class="blog-details-content">
                            <div class="blog-meta-2">
                                <ul>
                                   @php
                                    $date = date_create($post->created_at);
                                    // echo date_format($date);
                                    @endphp
                                    <li>{{date_format($date,"d-m-Y")}}</li>
                                    {{-- <li><a href="#">4 <i class="fa fa-comments-o"></i></a></li> --}}
                                </ul>
                            </div>
                            <h3>{{$post->name}}</h3>
                            <p>{{$post->description}}
                            </p>
                        </div>
                    </div>
                    <div class="dec-img-wrapper">
                        <?php echo $post->content ?>
                    </div>
                    <div class="tag-share">
                        
                        <div class="blog-share">
                            <span>share :</span>
                            <div class="share-social">
                                <ul>
                                    <li>
                                        <a class="facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{route('detail_post',['slug' => $post->slug])}}">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="twitter" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{route('detail_post',['slug' => $post->slug])}}ttps://www.facebook.com/sharer/sharer.php?u={{route('detail_post',['slug' => $post->slug])}}">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a class="instagram" href="#">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="blog-comment-wrapper mt-55">
                        <h4 class="blog-dec-title">Bình luận</h4>
                        <div class="fb-comment-embed"
                            data-href="https://www.facebook.com/zuck/posts/10102735452532991?comment_id=1070233703036185" data-width="500">
                        </div>
                        
                    </div>
                    
                </div>
            </div>
           
        </div>
    </div>
</div>
@endsection