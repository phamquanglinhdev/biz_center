<?php

namespace App\Domain\Grades\Repositories;

use App\Domain\Grades\Contract\StudentRepositoryInterface;
use App\Domain\Grades\Entities\Student;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class StudentRepository implements StudentRepositoryInterface
{
    private $student;

    /**
     * @param Student $student
     */
    public function __construct(Student $student)
    {
        $this->student = $student->where("role", "student");;
    }

    public function all(): Collection
    {
        // TODO: Implement all() method.
        return $this->student->get();
    }

    public function createRelationGrade($gradeId, $students): void
    {
        DB::table("student_grade")->where("grade_id", $gradeId)->delete();
        foreach ($students as $student) {
            DB::table("student_grade")->insert([
                'grade_id' => $gradeId,
                'student_id' => $student,
            ]);
        }
    }
}
