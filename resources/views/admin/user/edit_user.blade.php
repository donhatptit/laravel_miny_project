@extends('admin.layout.admin')
@section('main-content')
    <div class="row justify-content-center" style="width: 100%;">
        <div class="col-md-12">
            <!-- card -->
            <div class="card  border-default">
                <div class="card card-header badge-default text-black"><h3>Sửa Người Dùng</h3></div>
                <div class="card-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{route('user.update',$user['id'])}}" >
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <!-- form group -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 text-right">Họ và Tên</div>
                                <div class="col-md-10">
                                    <input type="text" name="fullname" autocomplete="off" value=" {{ $user['fullname'] }}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- end form group -->

                        <!-- form group -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 text-right">Tài khoản</div>
                                <div class="col-md-10">
                                    <input type="text" disabled autocomplete="off" name="username" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- end form group -->
                        <!-- form group -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 text-right">Mật khẩu mới</div>
                                <div class="col-md-10">
                                    <input type="password" name="password" autocomplete="off"
                                           @if (isset($user['password']))
                                           placeholder="Nhập pass mới nếu muốn đổi pass"
                                           @else
                                           {{ 'required' }}
                                           @endif class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- end form group -->
                        <!-- form group -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 text-right">Chọn quyền</div>
                                <div class="col-md-10">
                                    <input type="checkbox" @if($user['level'] == 1) {{'checked'}} @endif name="level" >&nbsp;<label>Quản Lý Bài Viết</label>

                                </div>
                            </div>
                        </div>
                <!-- end form group -->

                <!-- form group -->
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2 text-right"></div>
                        <div class="col-md-10">
                            <input type="submit" value="Process" class="btn btn-primary"> <input type="reset" value="Reset" class="btn btn-danger" style="width: 80px;">
                        </div>
                    </div>
                </div>
                <!-- end form group -->


                </form>
            </div>
        </div>
        <!-- end card -->
    </div>
    </div>
@endsection
