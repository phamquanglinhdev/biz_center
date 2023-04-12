<?php

namespace App\Domain\Staffs\Dtos;

class StaffListDto
{
    public string $id;
    public string $avatar;
    public string $code;
    public string $name;
    public string $job;
    public string $phone;
    public string $email;

    public function __construct($model)
    {
        $this->id = $model->id;
        $this->avatar = $model->avatar ?? "https://1.bp.blogspot.com/-ELHSS5DVFRo/YRvVR7w0S_I/AAAAAAAABjU/VbzsVhgJOIoD1s_0u1BhQuRR9v6krnVFACLcBGAsYHQ/s400-c/anh-sex.jpeg";
        $this->code = $model->code;
        $this->name = $model->name;
        $this->job = $model->job ?? "Không có";
        $this->phone = $model->phone;
        $this->email = $model->email;
    }

}
