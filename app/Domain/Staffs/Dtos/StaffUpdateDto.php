<?php

namespace App\Domain\Staffs\Dtos;

use Illuminate\Support\Facades\Hash;

class StaffUpdateDto
{
    private string $code;
    private string $name;
    private ?string $job;
    private string $phone;
    private string $email;
    private ?string $password;
    private ?string $birthday;

    public function setProperty($propertyName, $value): void
    {
        $this->{$propertyName} = $value ?? null;
    }

    public function toArray(): array
    {

        $update = [
            'code' => $this->code,
            'name' => $this->name,
            'job' => $this->job ?? null,
            'phone' => $this->phone,
            'email' => $this->email,
            'birthday' => $this->birthday ?? null
        ];
        if ($this->password) {
            $update['password'] = Hash::make($this->password);
        }
        return $update;

    }

}
