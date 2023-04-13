<?php

namespace App\Domain\Grades\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Grade extends Model
{
    use HasFactory;

    protected $table = "grades";
    protected $guarded = ["id"];

    public function Staffs(): BelongsToMany
    {
        return $this->belongsToMany(Staff::class, "staff_grade", "grade_id", "staff_id");
    }

    public function Teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class, "teacher_grade", "grade_id", "teacher_id");
    }
    public function Students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, "student_grade", "grade_id", "student_id");
    }
}
