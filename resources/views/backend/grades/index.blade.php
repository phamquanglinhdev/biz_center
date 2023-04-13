@extends("operations.table")
@section("right_tab")
    <form action="#" class="p-1">
        <div class="h4">Lọc danh sách lớp</div>
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
                    <h4 class="card-title mb-0">Danh sách lớp</h4>
                    <hr>
                    <a class="btn btn-primary" href="{{route("backend.grades.create")}}">
                        <i class="la la-plus-circle"></i>Thêm lớp
                    </a>
                    <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#right_tab" role="button"
                       aria-controls="offcanvasExample">
                        <i class="la la-filter"></i> Lọc
                    </a>
                    <a class="btn btn-success" href="{{route("backend.grades.index")}}" role="button">
                        <i class="la la-plus-circle"></i>Reset bộ lọc
                    </a>
                </div><!-- end card header -->

                <div class="card-body bg-white">
                    <table class="border table table-striped table-hover nowrap rounded shadow-xs border-xs mt-2"
                           id="crud_table">
                        <thead>
                        <tr class="bg-primary text-white">
                            <th scope="col" class="bg-primary text-white">Tên lớp học</th>
                            <th scope="col" class="bg-primary text-white">Chương trình học</th>
                            <th scope="col" class="bg-primary text-white">Thời lượng</th>
                            <th scope="col" class="bg-primary text-white">Số buổi</th>
                            <th scope="col" class="bg-primary text-white">Nhân viên quản lý</th>
                            <th scope="col" class="bg-primary text-white">Giáo viên</th>
                            <th scope="col" class="bg-primary text-white">Học sinh</th>
                            <th scope="col" class="bg-primary text-white">Trạng thái</th>
                            <th scope="col" class="bg-primary text-white text-center">Hành động</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr class="bg-primary text-white">
                            <th scope="col" class="bg-primary text-white">Tên lớp học</th>
                            <th scope="col" class="bg-primary text-white">Chương trình học</th>
                            <th scope="col" class="bg-primary text-white">Thời lượng</th>
                            <th scope="col" class="bg-primary text-white">Số buổi</th>
                            <th scope="col" class="bg-primary text-white">Nhân viên quản lý</th>
                            <th scope="col" class="bg-primary text-white">Giáo viên</th>
                            <th scope="col" class="bg-primary text-white">Học sinh</th>
                            <th scope="col" class="bg-primary text-white">Trạng thái</th>
                            <th scope="col" class="bg-primary text-white text-center">Hành động</th>
                        </tr>
                        </tfoot>
                    </table>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
@endsection
@section("table_init")
    <script>
        const fixColumnsLeft = 1
        const tableCols = [
            {data: 'name', name: "Tên lớp học"},
            {data: 'program', name: "Chương trình học"},
            {data: 'time', name: "Thời lượng"},
            {data: 'lessons', name: "Số buổi"},
            {data: 'staff', name: "Nhân viên quản lý"},
            {data: 'teacher', name: "Giáo viên"},
            {data: 'student', name: "Học sinh"},
            {data: 'status', name: "Trạng thái"},
            {data: 'action', name: "Hành động"},
        ];
    </script>
@endsection
