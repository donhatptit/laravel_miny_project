
@extends('client.layout')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('client/css/chitiet.css')}}">
    @endsection
@section('menu')
    @include('client.menu')
@endsection
@section('main_content')
    {{--{{  dd($subject) }}--}}
<div id="banner" style="width: 100%;">
    <div class="banner_container">
        <ul class="breadcrumb">
            @foreach( $breadcurmbs as $key => $value)
            <li>
                <a href="{{ $value }}">
                 {{ $key }}
                </a>
            </li>
            @endforeach
        </ul>
        <div class="title">{{ $post['name'] }}</div>
        <div class="circle_2"></div>
        <div class="circle_1"></div>
    </div>
</div>
<!-- end banner -->
<div style="clear: both;"></div>
<!-- start content -->
<div class="content">
    <div class="container_ct">
        <div class="container_top">
            <!-- content-left -->
            <div class="container_left">
                <div class="new_post">

                    <div class="panel_heading">
                        <div class="info_athour">
                            <div class="img_athour"></div>
                            <div class="name_athour">{{$post->athour}}</div>
                        </div>
                        <div class="view_favo">
                            <div class="view"><img src="{{ asset('client/images/trang-chu/icon-view.png') }}">&nbsp;{{$post->view}}</div>&nbsp;&nbsp;
                            <div class="favo" ><img src="{{ asset('client/images/trang-chu/icon-favorite.png') }}" style="cursor: pointer;" onclick="Myfunction();">&nbsp;{{ $post->favorite }}&nbsp;&nbsp;&nbsp;&nbsp;</div>
                        </div>
                    </div>
                    <div class="panel_body">
                        <div class="body_news">
                            {{$post->content}}
                        </div>
                    </div>
                </div>
                <div class="comment-form">
                    <h4>Post Comment</h4>
                    <fb:comments href="http://localhost/minyproject/public/trang-chu" colorscheme="light" numposts="5" data-width="100%"></fb:comments>
                </div>


            </div>
            <!-- end container_left -->
            <!-- container-right -->
            <div class="container_right">
                <div class="news">
                    <div class="new_1">
                        <div class="news_title">Bạn muốn tìm thêm với</div>
                        <div class="tab_line" ></div>
                        <div class="news_content">
                            <ul>
                                @foreach($data_post as $title)
                                <li><a href="public/chi-tiet/{{$title->id}}/{{$title->subject_id}}">{{ $title->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="adv">
                    <img src="{{ asset('client/images/chi-tiet/adv.png') }}">
                </div>
            </div>
            <!-- end container-right -->
        </div>

        <div class="content-1">
            <div class="title-content">
                <div class="title-heading">
                    Có thể bạn quan tâm

                </div>
                <div class="btn-group">

                </div>

                <div class="view-all"><a href="">Xem tất cả <img src="{{ asset('client/images/trang-chu/icon-view-all.png') }}"></a></div>
            </div>
            <div class="line-heading"></div>
            <div style="clear: both;"></div>
            <div class="post">


            @foreach($data_post as $postname)

                <div class="post-content">
                    <a href="public/chi-tiet/{{$postname->id}}/{{$postname->subject_id}}">
                        <div class="card-post">
                            <div class="title-post">{{ $postname->name }}</div>
                            <div class="text-author">
                                <div class="author">
                                   {{ $postname->athour }}
                                </div>
                                <div class="favorite" style="display: flex; justify-content:flex-end;">
                                    <div><img src="{{ asset('client/images/trang-chu/icon-view.png') }}" alt="icon-view">&nbsp;{{ $postname->view }}</div>&nbsp;&nbsp;
                                    <div><img src="{{ asset('client/images/trang-chu/icon-favorite.png') }}" alt="icon-like">&nbsp;{{ $postname->favorite }}</div>

                                </div>
                            </div>
                            <div class="text-content">{{ $postname->content }}</div>

                        </div>
                    </a>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
<!-- end content -->
    @endsection
