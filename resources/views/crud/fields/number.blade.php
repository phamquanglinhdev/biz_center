<label for="{{$field["name"]}}" class="form-label">{{$field["label"]}}</label>
<input type="number" name="{{$field["name"]}}" class="form-control" id="{{$field["name"]}}"
       value="{{$field['value']??""}}"
       required="{{$field["required"]??"true"}}">
