<?php

namespace App\Domain\Grades\Dtos;
class GradeListDto
{
    public string $id;
    public string $name;
    public string $program;
    public int $time;
    public int $lessons;
    public string $thumbnail;
    public string $status;
    public string $staff;
    public string $teacher;
    public string $student;
    public string $supporter;

    public function __construct($repository)
    {
        $this->id = $repository->id;
        $this->name = $repository->name;
        $this->program = $repository->program;
        $this->time = $repository->time;
        $this->lessons = $repository->lessons;
        $this->thumbnail = $repository->thumbnail ?? "https://static.vecteezy.com/system/resources/previews/010/090/153/non_2x/back-to-school-square-frame-with-classic-yellow-pencil-with-eraser-on-it-the-pencils-are-arranged-in-a-circle-against-a-green-school-chalkboard-illustration-design-with-copy-space-free-vector.jpg";
        $this->setStatus($repository->status);
        $this->teacher = $repository->Teachers()->get(["name"]) ?? "-";
        $this->student = $repository->Students()->get(["name"]) ?? "-";
        $this->staff = $repository->Staffs()->get(["name"]) ?? "-";
        $this->supporter = $repository->Supporters()->get(["name"]) ?? "-";
    }

    public function setStatus($status)
    {
        switch ($status) {
            case 0:
                $this->status = "Đang học";
                break;
            case 1:
                $this->status = "Đã kết thúc";
                break;
            case 2:
                $this->status = "Đã bảo lưu";
        }
    }
}
