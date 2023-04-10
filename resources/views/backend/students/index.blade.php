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
                    <table class="border bg-white table table-striped justify-content-around" id="crud_table">
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
@section("custom_scripts")
    <script>
        $(document).ready(function () {
            const query = window.location.search;
            const urlParams = new URLSearchParams(query);
            const name = urlParams.get("name")
            const code = urlParams.get("code")
            const phone = urlParams.get("phone")
            $('#crud_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{route("backend.students.index")}}",
                    data: {
                        name: name,
                        code: code,
                        phone: phone
                    }
                },
                scrollY: "60vh",
                scrollX: true,
                paging: true,
                scrollCollapse: true,
                fixedColumns: {
                    left: 2,
                    right: 0,
                },
                searching: false,
                minWidth: "200px",
                columns: [
                    {data: 'code', name: "Mã HS"},
                    {data: 'name', name: "Tên học sinh"},
                    {data: 'phone', name: "Số điện thoại"},
                    {data: 'parent', name: "Phụ huynh"},
                    {data: 'staff', name: "Nhân viên"},
                    {data: 'grade', name: "Lớp đang học"},
                    {data: 'gradeStatus', name: "Trạng thái lớp"},
                    {data: 'invoiceStatus', name: "Trạng thái học phí"},
                    {data: 'action', name: "Hành động"},
                ],
                "language": {
                    "sProcessing": "Đang load",
                    "sLengthMenu": "Xem _MENU_ hàng dữ liệu",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Không có dữ liệu phù hợp",
                    "sInfo": "Hiển thị từ dòng thứ _START_ đến dòng thứ _END_ (trong tổng số _TOTAL_ hàng dữ liệu)",
                    "sInfoEmpty": "Không có dữ liệu phù hợp",
                    "sSearch": "Tìm kiếm dữ liệu:",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Trang đầu",
                        "sLast": "Trang cuối",
                        "sNext": ">",
                        "sPrevious": "<"
                    },
                }
            });
        })
    </script>
    <style>
        table th {
            min-width: 9em;
        }
    </style>
@endsection
