@foreach(json_decode($supporter) as $item)
    {{$item->name}}
@endforeach
