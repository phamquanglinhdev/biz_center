<?php

namespace App\Domain\Students\DTOs;

use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

/**
 *
 */
class StudentDto
{
    private string $code;
    private string $name;
    private string $birthday;
    private string $avatar;
    private string $phone;
    private string $email;
    private string $address;
    private string $parent;
    private string $parent_phone;
    private ?string $password;
    private string $role;

    public function __construct()
    {
        $this->role = "student";
        $this->password = null;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Date
     */
    public function getBirthday(): string
    {
        return $this->birthday;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address ?? null;
    }

    /**
     * @return string
     */
    public function getParent(): ?string
    {
        return $this->parent ?? null;
    }

    /**
     * @return string
     */
    public function getParentPhone(): ?string
    {
        return $this->parent_phone ?? null;
    }

    /**
     * @return string
     */
    public function getAvatar(): ?string
    {
        return $this->avatar ?? null;
    }

    /**
     * @return string
     */
    public function getPassword(): ?string
    {
        return $this->password ?? null;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $birthday
     */
    public function setBirthday(string $birthday): void
    {
        $this->birthday = $birthday;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address = null): void
    {
        $this->address = $address;
    }

    /**
     * @param string $parent
     */
    public function setParent(string $parent = null): void
    {
        $this->parent = $parent;
    }

    /**
     * @param string $parent_phone
     */
    public function setParentPhone(string $parent_phone = null): void
    {
        $this->parent_phone = $parent_phone;
    }

    /**
     * @param string $avatar
     */
    public function setAvatar(string $avatar = null): void
    {
        $this->avatar = $avatar;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function setProperty($propertyName, $value): void
    {
        $this->{$propertyName} = $value;
    }


    public function toArray(): array
    {
        $array = [
            'name' => $this->getName(),
            'code' => $this->getCode(),
            'birthday' => $this->getBirthday(),
            'phone' => $this->getPhone(),
            'email' => $this->getEmail(),
            'address' => $this->getAddress(),
            'parent' => $this->getParent(),
            'parent_phone' => $this->getParentPhone(),
            'avatar' => $this->getAvatar(),
            'role' => $this->role,
        ];
        if ($this->password) {
            $array["password"] = Hash::make($this->password);
        }
        return $array;
    }

}
