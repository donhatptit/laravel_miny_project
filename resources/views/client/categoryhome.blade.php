
@foreach($data_class_home as $key=>$dataclass)
<div class="content-1">
    <div class="title-content">
        <div class="title-heading">
            {{ $dataclass->class }}
        </div>
        <div class="btn-group">
            @foreach ($subject[$key] as $sj)
            <a href="" class="outline">
                {{ $sj['name_subject'] }}
            </a>
            @endforeach
        </div>

        <div class="view-all"><a href="i">Xem tất cả <img src="{{ asset('client/images/trang-chu/icon-view-all.png') }}"></a></div>
    </div>
    <div class="line-heading"></div>
    <div style="clear: both;"></div>
    <div class="post">
        @foreach ($subpost as $ls)
        <a href="" class="post-content">
            <div class="card-post">
                <div class="title-post" title="">{{ $ls['name']  }}</div>
                <div class="text-author">
                    <div class="author">
                       {{ $ls['athour'] }}
                    </div>
                    <div class="favorite" style="display: flex; justify-content:flex-end;">
                        <div><img src="{{asset ('client/images/trang-chu/icon-view.png')}}" alt="icon-view">&nbsp;{{$ls['view']}}</div>&nbsp;&nbsp;
                        <div><img src="{{ asset('client/images/trang-chu/icon-favorite.png') }}" alt="icon-like">&nbsp;{{$ls['favorite']}}</div>

                    </div>
                </div>
                <div class="text-content">
                    {{ $ls['content'] }}
                </div>
            </div>
        </a>
       @endforeach

    </div>

</div>
@endforeach