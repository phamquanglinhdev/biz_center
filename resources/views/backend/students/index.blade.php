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

                <div class="card-body bg-white">
                    <table class="border table table-striped table-hover nowrap rounded shadow-xs border-xs mt-2" id="crud_table">
                        <thead>
                        <tr class="bg-primary text-white">
                            <th scope="col" class="bg-primary text-white">Mã học sinh</th>
                            <th scope="col" class="bg-primary text-white">Tên học sinh</th>
                            <th scope="col" class="bg-primary text-white">Số điện thoại</th>
                            <th scope="col" class="bg-primary text-white">Phụ huynh</th>
                            <th scope="col" class="bg-primary text-white">Nhân viên</th>
                            <th scope="col" class="bg-primary text-white">Lớp đang học</th>
                            <th scope="col" class="bg-primary text-white">Trạng thái lớp</th>
                            <th scope="col" class="bg-primary text-white">Trạng thái học phí</th>
                            <th scope="col" class="bg-primary text-white text-center">Hành động</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr class="bg-primary text-white">
                            <th scope="col" class="bg-primary text-white">Mã học sinh</th>
                            <th scope="col" class="bg-primary text-white">Tên học sinh</th>
                            <th scope="col" class="bg-primary text-white">Số điện thoại</th>
                            <th scope="col" class="bg-primary text-white">Phụ huynh</th>
                            <th scope="col" class="bg-primary text-white">Nhân viên</th>
                            <th scope="col" class="bg-primary text-white">Lớp đang học</th>
                            <th scope="col" class="bg-primary text-white">Trạng thái lớp</th>
                            <th scope="col" class="bg-primary text-white">Trạng thái học phí</th>
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
        const fixColumnsLeft = 2
        const tableCols = [
            {data: 'code', name: "Mã HS"},
            {data: 'name', name: "Tên học sinh"},
            {data: 'phone', name: "Số điện thoại"},
            {data: 'parent', name: "Phụ huynh"},
            {data: 'staff', name: "Nhân viên"},
            {data: 'grade', name: "Lớp đang học"},
            {data: 'gradeStatus', name: "Trạng thái lớp"},
            {data: 'invoiceStatus', name: "Trạng thái học phí"},
            {data: 'action', name: "Hành động"},
        ]
    </script>

@endsection
