<label for="iconInput" class="form-label">{{$field['label']}}</label>
<div class="form-icon">
    <input name="{{$field['name']}}" type="email" class="form-control form-control-icon" id="email"
           value="{{$field['value']??""}}"
           placeholder="example@gmail.com" required="">
    <i class="ri-mail-unread-line"></i>
</div>

