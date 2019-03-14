<div class="content">
    <div class="content-top">
    @include('client.lastest')

        @include('client.categoryhome')


    </div>

    <div class="content-bottom">
        <h2>Chúng tôi cung cấp cho bạn</h2>
        <div class="provider">
            <div class="pr-post">
                <div class="images">
                    <img src="{{asset('client/images/trang-chu/free.png')}}">
                </div>

                <h5>Tài nguyên học tập mễn phí</h5>
                <p style="font-size: 13px; color: #999999;">Cung cấp hơn 1 triệu tài nguyên về học tập miễn phí trên trang web</p>
            </div>

            <div class="pr-post">
                <div class="images">
                    <img src="{{asset('client/images/trang-chu/update.png')}}">
                </div>
                <h5>Nội dung cập nhật liên tục</h5>
                <p style="font-size: 13px; color: #999999;">Nội dung trên web được cập nhật liên tục hàng ngày bởi đội ngủ giáo viên giỏi</p>
            </div>

            <div class="pr-post">
                <div class="images">
                    <img src="{{asset('client/images/trang-chu/theme.png')}}">
                </div>
                <h5>Giao diện thân thiện</h5>
                <p style="font-size: 13px; color: #999999;">Trang web luôn lắng nghe góp ý để đổi mới trang
                    web phục vụ các bạn cả nước</p>
            </div>
        </div>
    </div>
</div>