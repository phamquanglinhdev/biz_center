<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12 mb-2">
            <div class="border rounded h-100 bg-white">
                <img
                    src="{{$user->avatar??$user->thumbnail}}"
                    style="border: 1em white solid" class="w-100">
                                @if($user->role=="teacher")
                                    <div class="p-1 text-center">
                                        <a href="{{backpack_url("/grade?teacher_id=".$user->id)}}" class="nav-link">
                                            <i class="la la-history"></i>
                                            Danh sách lớp học
                                        </a>
                                        <a href="{{backpack_url("/log?teacher_id=".$user->id)}}" class="nav-link">
                                            <i class="la la-history"></i>
                                            Nhật ký lớp học
                                        </a>
                                    </div>
                                @endif
                                @if($user->role=="student")
                                    <div class="p-1 text-center">
                                        <a href="#" class="nav-link text-primary">
                                            <i class="la la-users"></i>
                                            Danh sách lớp học
                                        </a>
                                        <a href="#" class="nav-link text-primary">
                                            <i class="la la-history"></i>
                                            Nhật ký lớp học
                                        </a>
                                    </div>
                                @endif
            </div>

        </div>
        <div class="col-md-9 col-sm-6 col-12 mb-2">
            <div class="border rounded bg-white p-lg-4 p-2 h-100 d-flex flex-column justify-content-between">
                <div>
                    <div class="h2 text-primary font-weight-bold mb-2 mb-lg-3">{{$user->name}}</div>
                    @if($user->role=="teacher")
                        <div class="extras-information">
                            <div class="extras-information">
                                <div class="mt-2">
                                    <i class="la la-list text-danger"></i>
                                    Mã giáo viên : {{$user->code}}
                                </div>
                                <div class="mt-2">
                                    <i class="las la-user text-danger"></i>
                                    Tên giáo viên : {{$user->name}}
                                </div>
                                <div class="mt-2">
                                    <i class="las la-phone text-danger"></i>
                                    Sđt : {{$user->phone}}
                                </div>
                                <div class="mt-2">
                                    <i class="las la-envelope text-danger"></i>
                                    Email: {{$user->email}}
                                </div>
                                <div class="mt-2">
                                    <i class="las la-map text-danger"></i>
                                    Địa chỉ: {{$user->address}}
                                </div>
                                <div class="mt-2">
                                    <i class="las la-user text-danger"></i>
                                    Hồ sơ giáo viên: <a href="{{$user->cv}}"> <i class="la la-download"></i>Tải
                                        xuống</a>
                                </div>
                                @if($user->extras!=null)
                                    @foreach($user->extras as $item)
                                        @if($item["name"]!="")
                                            <div class="mt-2">
                                                <i class="las la-list text-danger"></i>
                                                {{$item["name"]}}: {{$item["value"]}}
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endif
                    @if($user->role=="student")
                        <div class="extras-information">
                            <div class="mt-2">
                                <i class="las la-graduation-cap text-danger"></i>
                                Mã học viên : {{$user->code}}
                            </div>
                            <div class="mt-2">
                                <i class="las la-birthday-cake text-danger"></i>
                                Ngày sinh : {{$user->birthday}}
                            </div>
                            <div class="mt-2">
                                <i class="las la-phone text-danger"></i>
                                Sđt : {{$user->phone}}
                            </div>
                            <div class="mt-2">
                                <i class="las la-envelope text-danger"></i>
                                Email: {{$user->email}}
                            </div>
                            <div class="mt-2">
                                <i class="las la-map text-danger"></i>
                                Địa chỉ: {{$user->address}}
                            </div>
                            @if($user->parent)
                                <div class="mt-2">
                                    <i class="las la-user text-danger"></i>
                                    Phụ huynh: {{$user->parent}}
                                </div>
                            @endif

                            @if($user->parent_phone)
                                <div>
                                    <i class="las la-phone text-danger"></i>
                                    Phụ huynh: {{$user->parent_phone}}
                                </div>
                            @endif
                        </div>
                    @endif
                    @if(isset($user->time))
                        <div class="extras-information">
                            <div class="extras-information">
                                <div class="mt-2">
                                    <i class="la la-list text-danger"></i>
                                    Chương trình học : {{$user->program}}
                                </div>
                                <div class="mt-2">
                                    <i class="las la-user text-danger"></i>
                                    Giáo viên :
                                    @foreach($user->teachers as $teacher)
                                        <a href="{{route("teacher.show",$teacher->id)}}" class="nav-link d-inline p-0">
                                            {{$teacher->name}}
                                        </a>
                                    @endforeach
                                </div>
                                <div class="mt-2">
                                    <i class="las la-user text-danger"></i>
                                    Trợ giảng :
                                    @foreach($user->supporters as $supporter)
                                        <a href="{{route("teacher.show",$supporter->id)}}"
                                           class="nav-link d-inline p-0">
                                            {{$supporter->name}}
                                        </a>
                                    @endforeach
                                </div>
                                <div class="mt-2">
                                    <i class="las la-user text-danger"></i>
                                    Học sinh :
                                    @forelse($user->students as $student)
                                        <a href="{{route("student.show",$student->id)}}" class="nav-link d-inline p-0">
                                            {{$student->name}}
                                        </a>
                                    @empty
                                    @endforelse
                                </div>
                                <div class="mt-2">
                                    <i class="las la-user text-danger"></i>
                                    Nhân viên quản lý :
                                    @foreach($user->staffs as $staff)
                                        <a href="{{route("teacher.show",$staff->id)}}" class="nav-link d-inline p-0">
                                            {{$staff->name}}
                                        </a>
                                    @endforeach
                                </div>
                                <div class="mt-2">
                                    <i class="las la-clock text-danger"></i>
                                    Thời lượng : {{$user->time}} phút
                                </div>
                                <div class="mt-2">
                                    <i class="las la-calendar text-danger"></i>
                                    Lịch học:
                                    @if($user->times)
                                        @foreach($user->times as $item)
                                            <div class="ml-2">
                                                <i class="las la-plus-circle text-danger"></i>
                                                <span class="font-italic">
                                                {{\App\Untils\Trans::Week($item["day"])}}:
                                                {{$item["start"]}} - {{$item["end"]}}
                                            </span>
                                            </div>
                                        @endforeach
                                    @else
                                        <span>Chưa có</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
