<label class="form-label">{{$field['label']}}</label>
<div class="input-group" data-input-flag="">
    <button class="btn btn-light border" type="button" aria-expanded="false"><img
            src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Flag_of_Vietnam.svg/2560px-Flag_of_Vietnam.svg.png"
            alt="flag img" height="20" class="country-flagimg rounded"><span class="ms-2 country-codeno">+ 84</span>
    </button>
    <input name="{{$field['name']}}" type="text" class="form-control rounded-end flag-input"
           value="{{$field['value']??""}}" required=""
           placeholder="Nhập số điện thoại"
           oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
</div>

