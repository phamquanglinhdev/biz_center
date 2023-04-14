@extends("operations.table")
@push("crud_styles")
@endpush
@section("right_tab")
    <form action="#" class="p-1">
        <div class="h4">Lọc danh sách giáo viên</div>
        <hr>
        <div class="mb-3">
            <label for="name" class="form-label">Lọc theo mã</label>
            <input name="code" type="text" class="form-control" id="code" placeholder="GV001"
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
        <div class="mb-3">
            <label for="name" class="form-label">Lọc theo email</label>
            <input name="email" type="email" class="form-control" id="phone" placeholder="example@example.com"
                   value="{{$_REQUEST["email"]??""}}">
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
                    <h4 class="card-title mb-0">Danh sách giáo viên</h4>
                    <hr>
                    <a class="btn btn-primary" href="{{route("backend.teachers.create")}}">
                        <i class="la la-plus-circle"></i>Thêm  giáo viên mới
                    </a>
                    <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#right_tab" role="button"
                       aria-controls="offcanvasExample">
                        <i class="la la-filter"></i> Lọc
                    </a>
                    <a class="btn btn-success" href="{{route("backend.teachers.index")}}" role="button">
                        <i class="la la-plus-circle"></i>Reset bộ lọc
                    </a>
                </div><!-- end card header -->

                <div class="card-body bg-white">
                    <table class="border table table-hover nowrap rounded mt-2"
                           id="crud_table">
                        <thead>
                        <tr class="bg-primary text-white">
                            <th scope="col" class="bg-primary text-white">Mã giáo viên</th>
                            <th scope="col" class="bg-primary text-white">Tên giáo viên</th>
                            <th scope="col" class="bg-primary text-white">Email</th>
                            <th scope="col" class="bg-primary text-white">Số điện thoại</th>
                            <th scope="col" class="bg-primary text-white">Hồ sơ</th>
                            <th scope="col" class="bg-primary text-white text-center">Hành động</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr class="bg-primary text-white">
                            <th scope="col" class="bg-primary text-white">Mã giáo viên</th>
                            <th scope="col" class="bg-primary text-white">Tên giáo viên</th>
                            <th scope="col" class="bg-primary text-white">Email</th>
                            <th scope="col" class="bg-primary text-white">Số điện thoại</th>
                            <th scope="col" class="bg-primary text-white">Hồ sơ</th>
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
        const fixColumnsLeft = 0
        const tableCols = [
            {data: 'code', name: "Mã giáo viên"},
            {data: 'name', name: "Tên giáo viên"},
            {data: 'email', name: "Email"},
            {data: 'phone', name: "Số điện thoại"},
            {data: 'cv', name: "Hồ sơ"},
            {data: 'action', name: "Hành động"},
        ]
    </script>

@endsection
