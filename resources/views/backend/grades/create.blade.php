@extends("layouts.backend")
@section("content")
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Thêm lớp học</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">lớp học</a></li>
                <li class="breadcrumb-item active">Thêm lớp học</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 col-12">
                <div class="card">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-3 py-2 mb-0">
                            <li class="breadcrumb-item"><a href="#"><i class="ri-home-5-fill"></i></a></li>
                            <li class="breadcrumb-item"><a class="h6 text-primary"
                                                           href="{{route("backend.staffs.index")}}">lớp học</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thêm lớp học mới</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-9 col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route("backend.staffs.store")}}" method="post">
                            @csrf
                            <div class="row">
                                @include("layouts.inc.avatar",['name'=>'thumbnail','label'=>''])
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Tên lớp học</label>
                                    <input type="text" name="name" class="form-control" id="name" required>
                                    @error('name')
                                    <div class="small text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="program" class="form-label">Chương trình học</label>
                                    <input type="text" name="program" class="form-control" id="program" required>
                                    @error('program')
                                    <div class="small text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="time" class="form-label">Thời lượng (Giờ)</label>
                                    <input type="text" name="time" class="form-control" id="time" required>
                                    @error('time')
                                    <div class="small text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lessons" class="form-label">Số buổi</label>
                                    <input type="text" name="lessons" class="form-control" id="lessons" required>
                                    @error('lessons')
                                    <div class="small text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    @include("layouts.inc.select_relation",['name'=>'staffs','data'=>$relation->staffs,'label'=>'Nhân viên'])
                                </div>
                                <div class="col-md-6 mb-3">
                                    @include("layouts.inc.select_relation",['name'=>'teachers','data'=>null,'label'=>'Giáo viên'])
                                </div>
                                <div class="col-md-6 mb-3">
                                    @include("layouts.inc.select",['name'=>'status','data'=>$relation->initStatus,'label'=>'Trạng thái lớp'])
                                </div>
                            </div>
                            <div class="w-100 mt-lg-3 text-center">
                                <button class="btn btn-primary btn-label">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class="ri-check-fill label-icon align-middle fs-16 me-2"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            Thêm mới lớp học
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
