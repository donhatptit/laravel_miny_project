@extends('client.layout')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('client/css/category.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/css/chitiet.css')}}">
@endsection
@section('menu')
    @include('client.menu')
@endsection
@section('main_content')
<div id="banner" style="width: 100%;">
    <div class="banner_container">
        <ul class="breadcrumb">
            @foreach($breadcurmbs as $key => $value)
            <li><a href="{{ $value }}">{{ $key }}</a></li>
            @endforeach
        </ul>
        <div class="title">Lớp {{$class_id}} - Giải bài tập Lớp {{$class_id}}</div>
        <div class="circle_2"></div>
        <div class="circle_1"></div>
    </div>

</div>
<!-- end banner -->
<div style="clear: both;"></div>
<!-- start content -->
<div class="content">
    <div class="container">
        <div class="container-left">
            @foreach($title as $subpost)
            <div class="subject">
                <div class="title-content">
                    <div class="title-heading">

                            {{$subpost->name_subject}}
                    </div>
                    <div class="btn-group">

                    </div>

                    <div class="view-all"><a href="http://localhost/minyproject/public/lop-{{$class_id}}/{{$subpost->id}}/1">Xem tất cả <img src="{{asset('client/images/trang-chu/icon-view-all.png')}}"></a></div>
                </div>
                <div class="line-heading"></div>

                <div class="text_post">
                    @foreach ($subpost->post as $post)
                    <div class="post_news">
                        <div class="post_content">
                            <a href="public/chi-tiet/{{ $post->id }}/{{ $post->subject_id }}" >
                                <div class="card-post">
                                    <div class="title-post" title="">{{$post->name }}</div>
                                    <div class="text-author">
                                        <div class="author">
                                            {{$post->athour}}
                                        </div>
                                        <div class="favorite" style="display: flex; justify-content:flex-end;">
                                            <div><img src="{{asset('client/images/trang-chu/icon-view.png')}}" alt="icon-view">&nbsp;15</div>&nbsp;&nbsp;
                                            <div><img src="{{asset('client/images/trang-chu/icon-favorite.png')}}" alt="icon-like">&nbsp;25</div>&nbsp;&nbsp;

                                        </div>
                                    </div>
                                    <div class="text-content">
                                        {!! $post->content !!}
                                    </div>

                                </div>
                            </a>
                        </div>
                    </div>

                    @endforeach
                    <div class="read_more" style="width: 100px;"><a href="public/lop-{{ $subpost->class_id }}/{{ $subpost->id }}/1">Xem thêm</a></div>

                </div>
            </div>
            @endforeach
            <div class="loading">
                <i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i>
            </div>
            <div class="page_link">
                <div class="next_page" style="background-color: #ffaa00;"><a href="" style="color: white;">1</a></div>
                <div class="next_page"><a href="">2</a></div>
                <div class="next_page"><a href="">3</a></div>
                <div class="next_page"><a href="">4</a></div>
            </div>
        </div>
        <div style="clear: both;"></div>
        <div class="container-right">
            <div class="adv">
                <img src="{{asset('client/images/chi-tiet/adv.png')}}">
            </div>
        </div>

    </div>

</div>
@endsection
<!-- end content -->
