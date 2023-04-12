<?php

namespace App\Domain\Staffs\Dtos;

class StaffEditDto
{
    public string $id;
    public string $code;
    public string $name;
    public ?string $job;
    public string $phone;
    public string $email;
    public ?string $birthday;

    public function __construct($model)
    {
        $this->id = $model->id;
        $this->code = $model->code;
        $this->name = $model->name;
        $this->job = $model->job ?? null;
        $this->phone = $model->phone;
        $this->email = $model->email;
        $this->birthday = $model->birthday ?? null;
    }
}
