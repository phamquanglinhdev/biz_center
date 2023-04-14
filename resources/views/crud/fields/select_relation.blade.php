<div class="mb-1">
    <label for="choices-multiple-remove-button" class="form-label">{{$field['label']??""}}</label>
    <select class="form-control" data-placeholder="Chọn nhiều...." id="choices-multiple-remove-button" data-choices
            data-choices-removeItem
            name="{{$field['name']}}[]" multiple>
        @if(!empty($field['data']))
            @foreach($field['data'] as $key => $value)
                <option value="{{$key}}"
                    @if(in_array($key,$field['value']))
                        selected
                    @endif
                >{{$value}}
                </option>
            @endforeach
        @endif
    </select>
</div>
