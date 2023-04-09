@extends("layouts.backend")
@push("crud_styles")
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.2.2/css/fixedColumns.bootstrap5.min.css">

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--datatable js-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#crud_table').DataTable({
                scrollY: "60vh",
                scrollX: true,
                scrollCollapse: true,
                fixedColumns: {
                    left: {{$fixColumn??0}},
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
            $(".dataTables_scrollHeadInner").css("width","{{$tableWidth??"100%"}}")
            $(".table").css("width","{{$tableWidth??"100%"}}")
            document.body.addEventListener("click", function(e) {
                $(".dataTables_scrollHeadInner").css("width","{{$tableWidth??"100%"}}")
                $(".table").css("width","{{$tableWidth??"100%"}}")
            })
        })
    </script>
@endpush
