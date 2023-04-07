@extends("layouts.backend")
@push("crud_styles")
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"/>
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endpush
@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Học sinh</h5>
                    </div>
                    <div class="card-body">
                        <table id="students-table" class="display table table-bordered dt-responsive"
                               style="width:100%">
                            <thead>
                            <tr>
                                <th>Mã HV</th>
                                <th>Họ và tên</th>
                                <th>Số điện thoại</th>
                                <th>Phụ huynh</th>
                                <th>Nhân viên quản lý</th>
                                <th>Lớp đang học</th>
                                <th>Tình trạng lớp học</th>
                                <th>Tình trạng học phí</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Mã HV</th>
                                <th>Họ và tên</th>
                                <th>Số điện thoại</th>
                                <th>Phụ huynh</th>
                                <th>Nhân viên quản lý</th>
                                <th>Lớp đang học</th>
                                <th>Tình trạng lớp học</th>
                                <th>Tình trạng học phí</th>
                                <th>Hành động</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        <!-- start page title -->

    </div>

@endsection
@push("crud_scripts")
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#students-table').DataTable({
                ajax: "{{route("backend.students.list")}}",
                columns: [
                    {data: 'code'},
                    {data: 'name'},
                    {data: 'phone'},
                    {data: 'parent'},
                    {data: 'staff'},
                    {data: 'grade'},
                    {data: 'gradeStatus'},
                    {data: 'invoiceStatus'},
                    {
                        mData: 'id', mRender: function (data, type, row) {
                            return "<a href='Admin/Categories/Edit/" + data + "'>EDIT</a>";
                        }
                    },
                ],
                scrollX: !0,
                scrollY: "500px",
                scrollCollapse: !0
            });
        });
        // new DataTable("#scroll-horizontal", )

    </script>
@endpush
