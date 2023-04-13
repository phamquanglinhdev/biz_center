<div class="mb-1">
    <label for="choices-single-{{$name}}" class="form-label">{{$label??""}}</label>
    <select class="form-control" data-choices name="{{$name}}" id="choices-single-{{$name}}">
        @if(isset($nullable))
            <option value="">Chọn....</option>
        @endif
        @if(!empty($data))
            @foreach($data as $key => $value)
                <option value="{{$key}}"


                >{{$value}}
                </option>
            @endforeach
        @endif
    </select>
</div>
