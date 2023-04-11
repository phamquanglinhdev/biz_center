<div class="modal fade zoomIn" id="delete-{{$id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="btn-close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                        <h4>Xóa dữ liệu</h4>
                        <p class="text-muted mx-4 mb-0">Xác nhận xóa dữ liệu, bạn sẽ không thể khôi phục lại </p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Đóng</button>
                    <form method="post" action="{{route("backend.".$entity.".destroy",$id)}}">
                        @csrf
                        @method("delete")
                        <input name="{{$entity}}" value="{{$id}}" hidden>
                        <button type="submit" class="btn w-sm btn-danger " id="delete-record">Xóa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
