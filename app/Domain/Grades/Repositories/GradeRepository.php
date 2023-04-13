<?php

namespace App\Domain\Grades\Repositories;

use App\Domain\Grades\Entities\Grade;
use App\Domain\Grades\Contract\GradeRepositoryInterface;

class GradeRepository implements GradeRepositoryInterface
{
    private Grade $grade;

    /**
     * @param Grade $grade
     */
    public function __construct(Grade $grade)
    {
        $this->grade = $grade;
    }

    public function getListGrades($filter = [])
    {
        return $this->grade->orderBy("created_at", "DESC")->get();
    }

    public function getSingleGrade($id)
    {
        return $this->grade->where("id", $id)->firstOrFail();
    }

    public function createSingleGrade($attribute)
    {
        return $this->grade->create($attribute);
    }

    public function updateSingleGrade($id)
    {
        // TODO: Implement updateSingleGrade() method.
    }

    public function deleteSingleGrade($id)
    {
        // TODO: Implement deleteSingleGrade() method.
    }

}
