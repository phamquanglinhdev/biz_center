<?php

namespace App\Domain\Students\Entites;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Student extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'users';

    public function setPasswordAttributes($value): void
    {
        if ($value && $value != "")
            $this->attributes["password"] = Hash::make($value);
    }

    public function setRoleAttribute()
    {
        $this->attributes["role"] = 'student';
    }
}
