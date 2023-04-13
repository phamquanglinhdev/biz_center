<div class="mb-1">
    <label for="choices-single-{{$field['name']}}" class="form-label">{{$field['label']??""}}</label>
    <select class="form-control" data-choices name="{{$field['name']}}" id="choices-single-{{$field['name']}}">
        @if(isset($field['nullable']))
            <option value="">Chọn....</option>
        @endif
        @if(!empty($field['data']))
            @foreach($field['data'] as $key => $value)
                <option value="{{$key}}">{{$value}}
                </option>
            @endforeach
        @endif
    </select>
</div>
