<?php

namespace App\Domain\Grades\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $table = "grades";
    protected $guarded = ["id"];

}
