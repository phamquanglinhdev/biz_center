<?php

namespace App\Domain\Grades\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function Supporters(): BelongsToMany
    {
        return $this->belongsToMany(Supporter::class, "supporter_grade", "grade_id", "supporter_id");
    }
    public function Logs(): HasMany
    {
        return $this->hasMany(Logs::class,"grade_id","id");
    }
}
