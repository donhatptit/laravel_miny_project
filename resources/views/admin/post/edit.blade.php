@extends('admin.layout.admin')
@section('main-content')
    <div class="row justify-content-center" style="width: 100%;">
        <div class="col-md-12">
            <!-- card -->
            <div class="card  border-default">
                <div class="card card-header badge-default text-black"><h3>Thêm Bài Viết</h3></div>
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

                    <form method="post" action="{{route('post.update',$post['id'])}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <!-- form group -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 text-right">Tiêu đề</div>
                                <div class="col-md-10">
                                    <input type="text" name="name" value="{{ $post['name'] }}" required class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- end form group -->
                        <!-- form group -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 text-right">Môn Học</div>
                                <div class="col-md-10">
                                    <select name="subject_id">
                                        @foreach ($subjects as $subject)
                                            <option @if ($post->subject_id == $subject->id)
                                                    {{ "selected" }}
                                                    @endif value="{{ $subject->id }}">{{ $subject->name_subject }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- end form group -->


                        <!-- form group -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 text-right">Nội dung</div>
                                <div class="col-md-10">
									<textarea name="content">
										{{ $post['content'] }}
									</textarea>
                                    <script type="text/javascript">

                                        CKEDITOR.replace("content")
                                    </script>
                                </div>
                            </div>
                        </div>
                        <!-- end form group -->


                        <!-- form group -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 text-right"></div>
                                <div class="col-md-10">
                                    <input type="submit" name="submit" value="Process" class="btn btn-primary"> <input type="reset" value="Reset" class="btn btn-danger" style="width: 80px;">
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
    </div>
@endsection
