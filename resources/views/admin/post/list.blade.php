@extends('admin.layout.admin')

@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- card -->
                <div class="card border-default">
                    <div class="card card-header badge-default text-black" style="padding:7px !important;">
                        <div class="row">
                            <div class="col-md-6">
                                <h2>Quản Lý Bài Viết</h2>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="row">
                                    <div class="col-md-8 tim_kiem">
                                        <input type="text" name="" class="timkiem form-control" placeholder="Tìm kiếm ...">

                                    </div>
                                    <div class="col-md-4 text-right">
                                        <a href="{{ route('post.add') }}" class="btn btn-primary">Thêm</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card-body">
                        @if(session('mess'))
                            <div class="alert alert-success">
                                <li>{{ 'Xóa thành công!' }}</li>

                            </div>
                        @endif
                        @if(session('status'))
                            <div class="alert alert-success">
                                <li>{{ 'Sửa thành công!' }}</li>

                            </div>
                        @endif
                        @if(session('message'))
                            <div class="alert alert-success">
                                <li>{{ 'Thêm thành công!' }}</li>

                            </div>
                    @endif
                    <!-- table -->
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 250px; text-align: center;">Tên bài viết</th>
                                    <th style="width: 250px; text-align: center;">Nội dung</th>
                                    <th style="width: 250px; text-align: center;">Tác giả</th>

                                    <th style="width: 150px;text-align: center;">Hành Động</th>
                                </tr>
                            </thead>
                            <tbody class="danhsach">

                            @foreach($post as $list_post)

                                <tr >
                                    <td >{{ $list_post["name"] }}</td>
                                    <td >{!! $list_post["content"] !!}</td>
                                    <td> {{  $list_post["athour"] }}</td>

                                    <td style="text-align: center;">
                                        <a href="sua/{{ $list_post['id'] }}" class="btn btn-default"><i class="fas fa-pencil-alt"></i></a> &nbsp;&nbsp;
                                        <a href="xoa/{{ $list_post['id'] }}" onclick="return window.confirm('Are you sure ?')" class="btn btn-danger"><em class="fa fa-trash"></em></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- end table -->
                    </div>
                    <div class="clearfix" style="padding:7px !important;">
                        {!! $post->links() !!}
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
    </div>
    </div>
@endsection
