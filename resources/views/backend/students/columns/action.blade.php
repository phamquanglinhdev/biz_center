<div class="w-100 d-flex justify-content-center">
    <a href="{{route("backend.students.show",$id)}}" ><i
            class="ri-eye-fill align-bottom me-2  text-primary"></i></a>
    <a href="{{route("backend.students.edit",$id)}}"><i
            class="ri-pencil-fill align-bottom me-2 text-warning"></i></a>
    <a type="button" data-bs-toggle="modal" data-bs-target="#delete-{{$id}}">
        <i class="ri-delete-bin-fill align-bottom me-2 text-danger"></i>
    </a>
</div>
@include("layouts.inc.deleteModal",["id"=>$id])
