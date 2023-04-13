<?php

namespace App\Domain\Grades\Contract;
interface GradeRepositoryInterface
{
    public function getListGrades($filter);

    public function getSingleGrade($id);

    public function createSingleGrade($attribute);

    public function updateSingleGrade($id);

    public function deleteSingleGrade($id);
}
