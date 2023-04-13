<?php

namespace App\Domain\Grades\Dtos;

class GradeCreateDto
{
    public array $staffs;
    public array $students;
    public array $initStatus;

    public function __construct($staffs, $students)
    {
        $this->staffs = $staffs->pluck("name", "id")->toArray();
        $this->students = $students->pluck("name", "id")->toArray();
        $this->initStatus = [
            0 => 'Đang học',
            1 => 'Đã kết thúc',
            2 => 'Đang bảo lưu',
        ];
    }

}
