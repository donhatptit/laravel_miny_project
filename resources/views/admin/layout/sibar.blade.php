<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="http://localhost/minyproject/public/admin/home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('quan-ly-lop') }}">
            <i class="fas fa-align-justify"></i>
            <span>Quản Lý Lớp</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('quan-ly-mon-hoc') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Quản Lý Môn Học</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('quan-ly-bai-viet') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Quản Lý Bài Viết</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('quan-ly-nguoi-dung') }}">
            <i class="fas fa-user"></i>
            <span>Quản Lý Người Dùng</span></a>
    </li>
</ul>