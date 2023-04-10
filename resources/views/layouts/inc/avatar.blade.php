<div class="avatar-wrapper">
    <img class="profile-pic" id="profile-pic" src="{{$value??""}}"/>
    <div class="upload-button-{{$name}}">
        <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
    </div>
    <input class="file-upload-{{$name}}" type="file" accept="image/*"/>
    <input name="{{$name}}" id="{{$name}}">
</div>
<style>
    .avatar-wrapper {
        position: relative;
        height: 200px;
        width: 200px;
        margin: 50px auto;
        border-radius: 50%;
        overflow: hidden;
        box-shadow: 1px 1px 15px -5px black;
        transition: all 0.3s ease;
    }

    .avatar-wrapper:hover {
        transform: scale(1.05);
        cursor: pointer;
    }

    .avatar-wrapper:hover .profile-pic {
        opacity: 0.5;
    }

    .avatar-wrapper .profile-pic {
        height: 100%;
        width: 100%;
        transition: all 0.3s ease;
    }

    .avatar-wrapper .profile-pic:after {
        font-family: FontAwesome;
        content: "\f007";
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        position: absolute;
        font-size: 190px;
        background: #ecf0f1;
        color: #34495e;
        text-align: center;
    }

    .avatar-wrapper .upload-button-{{$name}}   {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
    }

    .avatar-wrapper .upload-button-{{$name}} .fa-arrow-circle-up {
        position: absolute;
        font-size: 234px;
        top: -17px;
        left: 0;
        text-align: center;
        opacity: 0;
        transition: all 0.3s ease;
        color: #34495e;
    }

    .avatar-wrapper .upload-button-{{$name}}:hover .fa-arrow-circle-up {
        opacity: 0.9;
    }

</style>
@push("crud_scripts")
    <script>
        $(document).ready(function () {

            const readURL = function (input) {
                if (input.files && input.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        $('.profile-pic').attr('src', e.target.result);
                        $('#{{$name}}').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $(".file-upload-{{$name}}").on('change', function () {
                readURL(this);
                const img = document.getElementById("profile-pic")
            });
            $(".upload-button-{{$name}}").on('click', function () {
                $(".file-upload-{{$name}}").click();
            });
        });
    </script>
@endpush
