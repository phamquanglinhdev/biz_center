<?php

namespace App\Domain\Staffs\Dtos;

use Illuminate\Support\Facades\Hash;

class StaffStoreDto
{
    private string $code;
    private string $name;
    private string $job;
    private string $phone;
    private string $email;
    private string $password;
    private string $birthday;
    private string $role;

    public function __construct()
    {
        $this->role = "staff";
    }

    public function setProperty($propertyName, $value): void
    {
        $this->{$propertyName} = $value ?? null;
    }

    public function toArray(): array
    {
        return [
            'code' => $this->code,
            'name' => $this->name,
            'job' => $this->job ?? null,
            'phone' => $this->phone,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => $this->role,
            'birthday' => $this->birthday ?? null
        ];
    }

}
