<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    @if(Auth::user()->level == 0)
    <li class="nav-item">
        <a class="nav-link" href="{{ route('category.manager') }}">
            <i class="fas fa-align-justify"></i>
            <span>Quản Lý Lớp</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('subject.manager') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Quản Lý Môn Học</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.manager') }}">
            <i class="fas fa-user"></i>
            <span>Quản Lý Người Dùng</span></a>
    </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('post.manager') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Quản Lý Bài Viết</span></a>
        </li>
@else
        <li class="nav-item">
            <a class="nav-link" href="{{ route('post.manager') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Quản Lý Bài Viết</span></a>
        </li>
        @endif
</ul>