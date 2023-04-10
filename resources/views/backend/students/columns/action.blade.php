<div class="dropdown d-inline-block w-100 text-center ">
    <button class=" btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown"
            aria-expanded="true">
        <i class="ri-more-fill align-middle"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-end" data-popper-placement="bottom-end"
        style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 33px);">
        <li><a href="{{route("backend.students.show",$id)}}" class="dropdown-item"><i
                    class="ri-eye-fill align-bottom me-2 text-muted"></i> Xem thông
                tin</a></li>
        <li><a href="{{route("backend.students.edit",$id)}}" class="dropdown-item edit-item-btn"><i
                    class="ri-pencil-fill align-bottom me-2 text-muted"></i> Sửa</a>
        </li>
        <li>
            <a class="dropdown-item remove-item-btn" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{$id}}">
                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Xóa
            </a>
        </li>
    </ul>
</div>
@include("layouts.inc.deleteModal",["id"=>$id])
