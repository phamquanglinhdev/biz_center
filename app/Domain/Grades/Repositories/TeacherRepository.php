<?php

namespace App\Domain\Grades\Repositories;

use App\Domain\Grades\Contract\TeacherRepositoryInterface;
use App\Domain\Grades\Entities\Teacher;
use Illuminate\Support\Facades\DB;


class TeacherRepository implements TeacherRepositoryInterface
{
    private $teacher;

    /**
     * @param Teacher $teacher
     */
    public function __construct(Teacher $teacher)
    {
        $this->teacher = $teacher->where("role", "teacher");;
    }

    public function all()
    {
        // TODO: Implement all() method.
        return $this->teacher->get();
    }

    public function createRelationGrade($gradeId, $teachers): void
    {
        DB::table("teacher_grade")->where("grade_id", $gradeId)->delete();
        foreach ($teachers as $teacher) {
            DB::table("teacher_grade")->insert([
                'grade_id' => $gradeId,
                'teacher_id' => $teacher,
            ]);
        }
    }
}
