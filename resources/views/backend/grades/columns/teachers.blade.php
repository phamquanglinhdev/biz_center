@foreach(json_decode($teacher) as $item)
    {{$item->name}}
@endforeach
