<?php

namespace App\Domain\Grades\Entities;

use App\Domain\Staffs\Entities\Staff;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $table = "grades";
    protected $guarded = ["id"];

    public function Staffs()
    {
        return $this->belongsToMany(Staff::class, "staff_grade", "grade_id", "staff_id");
    }
}
