
@foreach($data_class_home as $key=>$dataclass)
<div class="content-1">
    <div class="title-content">
        <div class="title-heading">
            {{ $dataclass->class_name }}
        </div>
        <div class="btn-group">
            @foreach ($subject[$key] as $subjecthome)
            <a href="public/lop-{{$subjecthome->class_id}}/{{$subjecthome->id}}/1" class="outline">
                {{ $subjecthome['name_subject'] }}
            </a>
            @endforeach
        </div>

        <div class="view-all"><a href="public/lop-{{ $subjecthome['class_id'] }}">Xem tất cả <img src="{{ asset('client/images/trang-chu/icon-view-all.png') }}"></a></div>
    </div>
    <div class="line-heading"></div>
    <div style="clear: both;"></div>
    <div class="post">
        @foreach ($subpost as $posthome)
        <a href="public/chi-tiet/{{ $posthome->id }}/{{ $posthome->subject_id }}" class="post-content">
            <div class="card-post">
                <div class="title-post" title="">{{ $posthome['name']  }}</div>
                <div class="text-author">
                    <div class="author">
                       {{ $posthome['athour'] }}
                    </div>
                    <div class="favorite" style="display: flex; justify-content:flex-end;">
                        <div><img src="{{asset ('client/images/trang-chu/icon-view.png')}}" alt="icon-view">&nbsp;{{$posthome['view']}}</div>&nbsp;&nbsp;
                        <div><img src="{{ asset('client/images/trang-chu/icon-favorite.png') }}" alt="icon-like">&nbsp;{{$posthome['favorite']}}</div>

                    </div>
                </div>
                <div class="text-content">
                    {{ $posthome['content'] }}
                </div>
            </div>
        </a>
       @endforeach

    </div>

</div>


@endforeach