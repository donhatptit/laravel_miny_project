
<div class="menu">
    <div class="logo">
        <a class="d-none" href=""><img src="{{ asset ('client/images/trang-chu/logo.png')}}" alt=""></a>
        <i class="close-nav-mobile d-none fa fa-arrow-left"></i>

    </div>
    <div class=" menu-name">
        <p>Danh mục</p>
    </div>
    <div class="menu-primary">
        <ul>
            @foreach($data_class as $data)
            <li class="nav-item"><a href="public/lop-{{ $data->id }}">{{$data->class_name}}</a>
                <button ><i class="fa fa-angle-down sidebar-icon-plus" id="12"> </i></button>
                <div class="dropdown-menu">
                    <ul class="ul_dropdown">
                        <div class="column">
                            @foreach($data->subject as $data_subject)
                            <li><a href="public/lop-{{ $data_subject->class_id }}/{{ $data_subject->id }}/1">{{$data_subject->name_subject}}</a></li>
                                @endforeach
                        </div>
                        <div class="column1">
                            <div class="banner_class">
                                <div class="border"></div>
                                <div class="number" >12</div>
                            </div>
                        </div>
                    </ul>
                </div>
            </li>
                @endforeach
        </ul>
    </div>
</div>
