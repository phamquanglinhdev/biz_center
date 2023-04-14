<?php

namespace App\Domain\Grades\Dtos;

class GradeEditDto
{
    public string $id;
    public string $name;
    public string $program;
    public int $time;
    public int $lessons;
    public ?string $thumbnail;
    public string $status;
    public array $staffs;
    public array $teachers;
    public array $supporters;

    public function __construct($collection)
    {
        $this->id = $collection->id;
        $this->name = $collection->name;
        $this->program = $collection->program;
        $this->time = $collection->time;
        $this->lessons = $collection->lessons;
        $this->thumbnail = $collection->thumbnail??null;
        $this->status = $collection->status;
        $this->staffs = $collection->Staffs()->get()->pluck("id")->toArray();
        $this->teachers = $collection->Teachers()->get()->pluck("id")->toArray();
        $this->supporters = $collection->Supporters()->get()->pluck("id")->toArray();
    }

}
