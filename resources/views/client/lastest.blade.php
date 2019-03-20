
<div class="content-1">
    <div class="title-content">
        <div class="title-heading">
            Mới nhất

        </div>
        <div class="btn-group">

        </div>

        <div class="view-all"><a href="public/moi-nhat/1">Xem tất cả <img src="{{asset ('client/images/trang-chu/icon-view-all.png')}}"></a></div>
    </div>
    <div class="line-heading"></div>
    <div style="clear: both;"></div>
    <div class="post">
       @foreach($data_post as $post)
        <a href=" public/chi-tiet/{{ $post->id }}/{{ $post->subject_id }}" class="post-content">

            <div class="card-post">
                <div class="title-post" title="">
                    {{ $post->name }}
                </div>
                <div class="text-author">
                    <div class="author">
                        {{$post->athour}}
                    </div>
                    <div class="favorite" style="display: flex; justify-content:flex-end;">
                        <div><img src="{{asset ('client/images/trang-chu/icon-view.png')}}" alt="icon-view">&nbsp;{{ $post->view }}</div>&nbsp;&nbsp;
                        <div><img src="{{asset ('client/images/trang-chu/icon-favorite.png')}}" alt="icon-like">&nbsp;{{ $post->favorite }}</div>

                    </div>
                </div>
                <div class="text-content">
                    {{$post->content}}
                </div>

            </div>
        </a>

         @endforeach

    </div>
</div>
