<?php

namespace App\Domain\Students\DTOs;

use App\Domain\Students\Entites\Student;

class StudentEditDto
{
    public string $id;
    public string $code;
    public string $name;
    public string $birthday;
    public string $phone;
    public string $email;
    public ?string $address;
    public ?string $parent;
    public ?string $parent_phone;
    public ?string $avatar;

    public function __construct(Student $student)
    {
        $this->id = $student->id ?? null;
        $this->code = $student->code ?? null;
        $this->name = $student->name ?? null;
        $this->birthday = $student->birthday ?? null;
        $this->phone = $student->phone ?? null;
        $this->email = $student->email ?? null;
        $this->address = $student->address ?? null;
        $this->parent = $student->parent ?? null;
        $this->parent_phone = $student->parent_phone ?? null;
        $this->avatar = $student->avatar ?? null;
    }

    /**
     * @return string
     */

}
