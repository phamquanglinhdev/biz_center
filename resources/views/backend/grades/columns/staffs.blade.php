@foreach(json_decode($staff) as $item)
    {{$item->name}}
@endforeach
