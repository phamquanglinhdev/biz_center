<?php

namespace App\Domain\Students\DTOs;

class ListStudent
{
    public string $id;
    public string $code;
    public string $name;
    public string $phone;
    public string $parent;
    public string $staff;
    public string $avatar;
    public string $grade;
    public string $gradeStatus;
    public string $invoiceStatus;
    public string $role;

    public function __construct($model)
    {
        $this->id = $model->id;
        $this->code = $model->code;
        $this->name = $model->name;
        $this->phone = $model->phone;
        $this->parent = $model->parent ?? "-";
        $this->avatar = $model->avatar ?? "https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/User-avatar.svg/2048px-User-avatar.svg.png";
        $this->staff = $model->Staff()->first()->name ?? "-";
        $this->grade = "-";
        $this->gradeStatus = "Chưa học";
        $this->status = "Chưa học";
        $this->invoiceStatus = "Chưa học";
    }

}
