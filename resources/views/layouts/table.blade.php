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
    <button id="wait-crud-table" class="btn btn-outline-primary btn-load">
                                                    <span class="d-flex align-items-center">
                                                        <span class="spinner-border flex-shrink-0" role="status">
                                                            <span class="visually-hidden">Đang tải...</span>
                                                        </span>
                                                        <span class="flex-grow-1 ms-2">
                                                            Đang tải...
                                                        </span>
                                                    </span>
    </button>
    @stack("crud_modal")
@endsection
@push("crud_scripts")
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--datatable js-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
{{--    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>--}}
{{--    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>--}}
    <script src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"></script>
    @yield("custom_scripts")
@endpush
