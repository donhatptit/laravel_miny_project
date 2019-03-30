@extends('client.layout')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('client/css/category.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/css/chitiet.css')}}">
@endsection
@section('menu')
    @include('client.menu')
@endsection
<!-- start banner -->
@section('main_content')
<div id="banner" style="width: 100%;">
    <div class="banner_container">
        <ul class="breadcrumb">
            @foreach($breadcurmbssubject as $key => $value)
            <li><a href="{{ $value }}">{{ $key }}</a></li>
            @endforeach
        </ul>
        <div class="title">{{ $title->name_subject }}</div>
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

            <div style="clear: both;"></div>
            <div class="subject">
                <div class="title-content">
                    <div class="title-heading">
                        {{$title->name_subject}}
                    </div>
                    <div class="btn-group">
                    </div>
                    <div class="view-all"><a href="public/lop-{{$title['class_id']}}">Quay lại <img src="{{asset('client/images/trang-chu/icon-view-all.png')}}"></a></div>
                </div>

                <div class="line-heading"></div>

                <div class="text_post">

                    <div class="post-news">
                        {{--foreach--}}
                        @foreach($post as $postname)
                        <div class="post_content">
                            <a href="public/chi-tiet/{{ $postname->id }}/{{ $postname->subject_id }}" >
                                <div class="card-post">
                                    <div class="title-post" title="">{{ $postname->name }}</div>
                                    <div class="text-author">
                                        <div class="author">
                                           {{ $postname->athour }}
                                        </div>
                                        <div class="favorite" style="display: flex; justify-content:flex-end;">
                                            <div><img src="{{asset('client/images/trang-chu/icon-view.png')}}" alt="icon-view">&nbsp;{{$postname->view}}</div>&nbsp;&nbsp;
                                            <div><img src="{{asset('client/images/trang-chu/icon-favorite.png')}}" alt="icon-like">&nbsp;{{$postname->favorite}}</div>&nbsp;&nbsp;

                                        </div>
                                    </div>
                                    <div class="text-content">
                                        {!! $postname->content !!}
                                    </div>

                                </div>
                            </a>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
            <div class="page_link1" style="text-align: center;">

                 {{--@for( $i =1 ; $i <= $num_page ; $i++):--}}

                <div class="next_page"

                        {{--$select_p = isset($_GET["p"]) ? $_GET["p"]:"1";--}}
                        {{--@if($select_p == $i)--}}
                        {{--{{ "style=' color:white; background-color:#ffbb33;'" }}--}}


                ><a href="">
                        1
                    </a></div>
                {{--@endfor--}}
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
<!-- end content -->
@endsection
