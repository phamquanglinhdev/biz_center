@extends("layouts.backend")
@push("crud_styles")
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css"/>
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
    @stack("crud_modal")
@endsection
@push("crud_scripts")
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

    @yield("table_init")
    <script>
        $(document).ready(function () {
            const query = window.location.search;
            const urlParams = new URLSearchParams(query);
            let filterParams = Object.fromEntries(urlParams);
            let table = $('#crud_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{route(Request::route()->getName())}}",
                    data: filterParams
                },
                scrollY: "60vh",
                scrollX: true,
                paging: true,
                scrollCollapse: true,
                fixedColumns: {
                    left: fixColumnsLeft,
                    right: 0,
                },
                buttons: [
                    {
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: 'th:not(:last-child)',
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: 'th:not(:last-child)',
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: 'th:not(:last-child)',
                        }
                    },
                ],
                aLengthMenu: [
                    [10, 25, 50, 100, 200, -1],
                    [10, 25, 50, 100, 200, "Tất cả"]
                ],
                searching: false,
                ordering: false,
                columns: tableCols,
                responsive: false,
                dom:
                    "<'row hidden'<'col-sm-6'i><'col-sm-6 d-print-none'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row mt-2 d-print-none '<'col-sm-12 col-md-4'l><'col-sm-0 col-md-4 text-center'B><'col-sm-12 col-md-4 'p>>",
                language: {
                    "emptyTable": "Không có dữ liêu",
                    "info": "Từ _START_ đến _END_ of _TOTAL_ hàng",
                    "infoEmpty": "Không có hàng",
                    "infoFiltered": "(lọc từ _MAX_ tổng số dòng)",
                    "infoPostFix": ".",
                    "thousands": ",",
                    "lengthMenu": "_MENU_ mục trên mỗi trang",
                    "loadingRecords": "Loading...",
                    "processing": "<img src='{{asset("assets/images/svg/spinner.svg")}}' alt='Processing...'>",
                    "search": "_INPUT_",
                    "searchPlaceholder": "Tìm kiếm...",
                    "zeroRecords": "Không tìm thấy dữ liệu",
                    "paginate": {
                        "first": "Đầu tiên",
                        "last": "Cuối",
                        "next": ">",
                        "previous": "<"
                    },
                    "aria": {
                        "sortAscending": ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    },
                }
            });
            $("#crud_table_processing").removeClass("card")
            $(".d-print-none").css("display", "inline-flex")
            $(window).resize(function () {
                const width = $(".dataTables_scrollHead").width()
                $("table").css("min-width",width*0.98)
            })
            $(".topnav-hamburger").click(function () {
                const width = $(".dataTables_scrollHead").width()
                $("table").css("min-width",width*0.98)
            })
            $(window).resize()
        })

    </script>
    <style>
        /*table th {*/
        /*    min-width: 9em;*/
        /*}*/

        div.dataTables_wrapper div.dataTables_paginate {
            margin-left: 5em;
        }
    </style>
    @yield("custom_scripts")
@endpush
