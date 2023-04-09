@extends("layouts.table")
@push("crud_styles")
@endpush
@section("right_tab")
    <form action="#" class="p-1">
        <div class="h4">Lọc danh sách học sinh</div>
        <hr>
        <div class="mb-3">
            <label for="name" class="form-label">Lọc theo mã</label>
            <input name="code" type="text" class="form-control" id="code" placeholder="HS001"
                   value="{{$_REQUEST["code"]??""}}">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Lọc theo tên</label>
            <input name="name" type="text" class="form-control" id="code" placeholder="Nguyễn Văn A"
                   value="{{$_REQUEST["name"]??""}}">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Lọc theo SĐT</label>
            <input name="phone" type="text" class="form-control" id="phone" placeholder="0xxxxxxxxx"
                   value="{{$_REQUEST["phone"]??""}}">
        </div>
        <button class="btn btn-primary w-100" type="submit">
            <i class="la la-filter"></i> Lọc
        </button>

    </form>
@endsection
@section("table")
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Danh sách học sinh</h4>
                    <hr>
                    <a class="btn btn-primary" href="{{route("backend.students.create")}}">
                        <i class="la la-plus-circle"></i>Thêm học sinh mới
                    </a>
                    <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#right_tab" role="button"
                       aria-controls="offcanvasExample">
                        <i class="la la-filter"></i> Lọc
                    </a>
                    <a class="btn btn-success" href="{{route("backend.students.index")}}" role="button">
                        <i class="la la-plus-circle"></i>Reset bộ lọc
                    </a>
                </div><!-- end card header -->

                <div class="card-body">
                    <table class="table w-100 table-striped" id="crud_table">
                        <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col" class="bg-primary">Mã học sinh</th>
                            <th scope="col">Tên học sinh</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Phụ huynh</th>
                            <th scope="col">Nhân viên</th>
                            <th scope="col">Lớp đang học</th>
                            <th scope="col">Trạng thái lớp</th>
                            <th scope="col">Trạng thái học phí</th>
                            <th scope="col">Hành động</th>
                        </tr>
                        </thead>
                        <tbody style="height: 180px">

                        @foreach($students as $student)
                            <tr>
                                <td>
                                    <a class="h6 text-primary" href="">
                                        {{$student->code}}
                                    </a>
                                </td>
                                <td>{{$student->name}}</td>
                                <td>{{$student->phone}}</td>
                                <td>{{$student->parent}}</td>
                                <td>{{$student->staff}}</td>
                                <td>{{$student->grade}}</td>
                                <td>{{$student->gradeStatus}}</td>
                                <td>{{$student->invoiceStatus}}</td>
                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a href="#!" class="dropdown-item"><i
                                                        class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>
                                            </li>
                                            <li><a class="dropdown-item edit-item-btn"><i
                                                        class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                    Edit</a></li>
                                            <li>
                                                <a class="dropdown-item remove-item-btn">
                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                    Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
@endsection
@push("crud_scripts")
@endpush
