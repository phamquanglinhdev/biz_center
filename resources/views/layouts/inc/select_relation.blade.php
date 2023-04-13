<div class="mb-1">
    <label for="choices-multiple-remove-button" class="form-label">{{$label??""}}</label>
    <select class="form-control" data-placeholder="Chọn nhiều...." id="choices-multiple-remove-button" data-choices
            data-choices-removeItem
            name="{{$name}}" multiple>
        @if(!empty($data))
            @foreach($data as $key => $value)
                <option value="{{$key}}"


                >{{$value}}
                </option>
            @endforeach
        @endif
    </select>
</div>
