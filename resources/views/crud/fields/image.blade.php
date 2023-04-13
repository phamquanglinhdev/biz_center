<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.1.0/cropper.css"/>
<style>
    .cropper-modal img {
        display: block;
        max-width: 100%;
    }

    .preview {
        overflow: hidden;
        width: 160px;
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }
</style>
<div class="row mb-4">
    <div class="col-md-12 text-center">
        <div>
            <label class="label">{{$field['label']}}</label>
        </div>
        <img class="border-primary shadow-lg rounded-circle" style="width: 10rem;height: 10rem"
             id="preview-{{$field['name']}}"
             alt=" 200x200"
             src="{{$field['value']??asset("assets/images/img-blank.png")}}" data-holder-rendered="true">
        <input type="hidden" id="real-{{$field['name']}}" name="{{$field['name']}}" value="{{$field['value']??""}}">
    </div>
    <div class="col-md-6 d-none">
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupFile01">Tải lên</label>
            <input type="file" id="upload-{{$field['name']}}" class="form-control cropper-image">
        </div>
    </div>
</div>

<!-- Default Modals -->
<div id="modal-{{$field['name']}}" class="modal fade" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true"
     style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Cắt ảnh</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <!--  default image where we will set the src via jquery-->
                            <img id="{{$field['name']}}" style="max-width: 40em">
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="crop">Crop</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@push("crud_scripts")
    <script src="https://unpkg.com/jquery@3/dist/jquery.slim.min.js"></script>
    <script src="https://fengyuanchen.github.io/cropperjs/js/cropper.js"></script>
    <script>
        $(document).ready(function () {
            $("#preview-{{$field['name']}}").click((e) => {
                $("#upload-{{$field['name']}}").click()
            })

            let bs_modal = $('#modal-{{$field['name']}}');
            let image = document.getElementById('{{$field['name']}}');
            let cropper, reader, file;

            $("body").on("change", ".cropper-image", function (e) {
                let files = e.target.files;
                const done = function (url) {
                    image.src = url;
                    bs_modal.modal('show');
                };
                if (files && files.length > 0) {
                    file = files[0];
                    if (URL) {
                        done(URL.createObjectURL(file));
                    } else if (FileReader) {
                        reader = new FileReader();
                        reader.onload = function (e) {
                            console.log(e)
                        };
                        reader.readAsDataURL(file);
                    }
                }
            });

            bs_modal.on('shown.bs.modal', function () {
                cropper = new Cropper(image, {
                    aspectRatio: {{$field['aspect_ratio']?? 1}} ,
                    viewMode: 1,
                    preview: '.preview'
                });
            }).on('hidden.bs.modal', function () {
                cropper.destroy();
                cropper = null;
            });

            $("#crop").click(function () {
                const canvas = cropper.getCroppedCanvas({
                    {{--width: {{$field['width']??150}},--}}
                    {{--height: {{$field['height']??1510}},--}}
                });
                canvas.toBlob(function (blob) {
                    let url = URL.createObjectURL(blob);
                    let reader = new FileReader();
                    reader.readAsDataURL(blob);
                    reader.onloadend = function () {
                        let base64data = reader.result;
                        document.getElementById("preview-{{$field['name']}}").src = base64data
                        document.getElementById("real-{{$field['name']}}").value = base64data
                    };
                });
                bs_modal.modal('hide');
            });
        })

    </script>
@endpush
