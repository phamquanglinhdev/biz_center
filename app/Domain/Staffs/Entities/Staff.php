<?php

namespace App\Domain\Staffs\Entities;

use App\Domain\Grades\Entities\Grade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Staff extends Model
{
    use HasFactory;

    protected $table = "users";
    protected $casts = [];
    protected $guarded = ["id"];

    protected function Grades(): BelongsToMany
    {
        return $this->belongsToMany(Grade::class, "staff_grade", "staff_id", "grade_id");
    }
}
