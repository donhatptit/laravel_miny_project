@extends('client.layout')

@section('main_content')
<div id="wrap">
    {{--menu--}}
    <div class="banner" style="width: 100%;"></div>
    @include('client.content')
    {{--content--}}
    <div id="goto-top">
        <img src="{{asset ('client/images/trang-chu/arrow66.png')}}">
    </div>
</div>

@endsection