@foreach(json_decode($student) as $item)
    {{$item->name}},
@endforeach
