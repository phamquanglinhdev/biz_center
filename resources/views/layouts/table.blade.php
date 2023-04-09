@extends("layouts.backend")
@push("crud_styles")
    <!-- gridjs css -->
    {{--    <link rel="stylesheet" href="{{asset("assets/libs/gridjs/theme/mermaid.min.css")}}">--}}
    <link rel="stylesheet" type="text/css"
          href="https://datatables.net/release-datatables/media/css/dataTables.bootstrap4.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://datatables.net/release-datatables/extensions/FixedColumns/css/fixedColumns.bootstrap4.css"/>
@endpush

@section("content")
    <div class="offcanvas offcanvas-start" tabindex="-1" id="right_tab" aria-labelledby="">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel"></h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            @yield("right_tab")
        </div>
    </div>
    @yield("table")
@endsection

@push("crud_scripts")
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://datatables.net/release-datatables/media/js/jquery.dataTables.js"></script>
    <script src="https://datatables.net/release-datatables/media/js/dataTables.bootstrap4.js"></script>
    <script
        src="https://datatables.net/release-datatables/extensions/FixedColumns/js/dataTables.fixedColumns.js"></script>
    <script>
        $(document).ready(function () {
            $('#crud_table').DataTable({
                scrollY: "60vh",
                scrollX: true,
                scrollCollapse: true,
                fixedColumns: {
                    left: 1,
                    right: 1
                },
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
        });
    </script>
@endpush
