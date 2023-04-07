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
                        <h5 class="card-title mb-0">Scroll - Horizontal</h5>
                    </div>
                    <div class="card-body">
                        <table id="students-table" class="table nowrap align-middle" style="width:100%">
                            <thead>
                            <tr>
                                {{--                                <th scope="col" style="width: 10px;">--}}
                                {{--                                    <div class="form-check">--}}
                                {{--                                        <input class="form-check-input fs-15" type="checkbox" id="checkAll"--}}
                                {{--                                               value="option">--}}
                                {{--                                    </div>--}}
                                {{--                                </th>--}}
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
                            <tbody>
                            @for($i=0;$i<3000;$i++)
                                @foreach($students as $student)
                                    <tr>
                                        {{--                                    <th scope="row">--}}
                                        {{--                                        <div class="form-check">--}}
                                        {{--                                            <input class="form-check-input fs-15" type="checkbox" name="checkAll"--}}
                                        {{--                                                   value="option1">--}}
                                        {{--                                        </div>--}}
                                        {{--                                    </th>--}}
                                        <td>{{$student->code}}</td>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->phone}}</td>
                                        <td>{{$student->parent??"-"}}</td>
                                        <td>{{$student->staff??"-"}}</td>
                                        <td>{{$student->grade??"-"}}</td>
                                        <td>{{$student->status??"-"}}</td>
                                        <td>{{$student->invoice->status??"Chưa học"}}</td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="#!" class="dropdown-item"><i
                                                                class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                            View</a>
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
                            @endfor
                            </tbody>
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
        // new DataTable("#scroll-horizontal", )
        $('#students-table').DataTable({scrollX: !0, scrollY: "500px", scrollCollapse: !0});
    </script>
@endpush
