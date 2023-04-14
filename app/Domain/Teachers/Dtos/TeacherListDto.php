<?php

namespace App\Domain\Teachers\Dtos;

class TeacherListDto
{
    public string $id;
    public string $code;
    public string $name;
    public string $email;
    public string $phone;
    public string $cv;
    public string $avatar;

    public function __construct($collection)
    {
        $this->id = $collection->id;
        $this->code = $collection->code;
        $this->name = $collection->name;
        $this->email = $collection->email;
        $this->phone = $collection->phone;
        $this->avatar = $collection->avatar??"https://c2.staticflickr.com/8/7360/27739306041_c36f62375d_b.jpg";
        $this->cv = $collection->cv??"#";
    }

}
