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
                                <h2>Quản Lý Môn</h2>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('subject.add') }}" class="btn btn-primary">Thêm</a>
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
                                <th style="width: 250px; text-align: center;">Tên Môn Học</th>

                                <th style="width: 150px;text-align: center;">Hành Động</th>
                            </tr>
                            </thead>
                            <tbody class="danhsach">

                            @foreach($subject as $listsubject)

                                <tr>
                                    <td><?php echo $listsubject["name_subject"]; ?></td>
                                    <td style="text-align: center;">
                                        <a href="sua/{{$listsubject->id}}" class="btn btn-default"><i class="fas fa-pencil-alt"></i></a> &nbsp;&nbsp;
                                        <a href="xoa-{{$listsubject->id}}" onclick="return window.confirm('Are you sure ?')" class="btn btn-danger">
                                            <em class="fa fa-trash"></em></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- end table -->
                    </div>
                    <div class="clearfix" style="padding:7px !important;">
                        {!! $subject->links() !!}
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
    </div>
    </div>
@endsection
