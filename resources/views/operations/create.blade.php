@extends("layouts.backend")
@section("content")
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Thêm {{$entry->label}}</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">{{$entry->label}}</a></li>
                <li class="breadcrumb-item active">Thêm {{$entry->label}}</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 col-12">
                <div class="card">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-3 py-2 mb-0">
                            <li class="breadcrumb-item"><a href="#"><i class="ri-home-5-fill"></i></a></li>
                            <li class="breadcrumb-item"><a class="h6 text-primary"
                                                           href="{{route("backend.staffs.index")}}">{{$entry->label}}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Thêm {{$entry->label}} mới</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-9 col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route("backend.".$entry->name.".store")}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                @foreach($entry->fields as $field)
                                    <div class="{{$field['class']??"col-md-12"}} mb-3">
                                        @include("crud.fields.".$field['type']??"text",['crud'=>$field])
                                    </div>
                                @endforeach
                                <div class="w-100 mt-lg-3 text-center">
                                    <button class="btn btn-primary btn-label">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <i class="ri-check-fill label-icon align-middle fs-16 me-2"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                Thêm mới {{$entry->label}}
                                            </div>
                                        </div>
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
