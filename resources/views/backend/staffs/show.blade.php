@extends("layouts.backend")
@section("content")
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-3 py-2 bg-light mb-0">
            <li class="breadcrumb-item"><a href="#"><i class="ri-home-5-fill"></i></a></li>
            <li class="breadcrumb-item"><a class="h6 text-primary" href="{{route("backend.students.index")}}">Học sinh</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$student->name}}</li>
        </ol>
    </nav>
    @include("components.profile",['user'=>$student])
@endsection
