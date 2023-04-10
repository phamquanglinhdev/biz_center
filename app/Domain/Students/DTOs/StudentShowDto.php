<?php

namespace App\Domain\Students\DTOs;

class StudentShowDto
{
    public string $id;
    public string $code;
    public string $name;
    public string $birthday;
    public string $phone;
    public string $email;
    public string $role;
    public ?string $address;
    public ?string $parent;
    public ?string $parent_phone;
    public ?string $avatar;
    public ?string $currentGrade;
    public ?string $currentGradeStatus;
    public ?string $invoiceStatus;

    public function __construct($collection)
    {
        $this->id = $collection->id;
        $this->code = $collection->code;
        $this->name = $collection->name;
        $this->birthday = $collection->birthday;
        $this->phone = $collection->phone;
        $this->email = $collection->email;
        $this->role = $collection->role;
        $this->address = $collection->address;
        $this->parent_phone = $collection->parent_phone ?? null;
        $this->parent = $collection->parent ?? null;
        $this->avatar = $collection->avatar ?? "https://haycafe.vn/wp-content/uploads/2022/03/Avatar-anime.jpg";
        $this->currentGradeStatus = "Chưa học";
        $this->currentGrade = "Chưa học";
        $this->invoiceStatus = "Chưa học";
    }

}
