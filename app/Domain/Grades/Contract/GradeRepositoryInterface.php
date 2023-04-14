<?php

namespace App\Domain\Grades\Contract;
interface GradeRepositoryInterface
{
    public function getListGrades($filter);

    public function getSingleGrade($id);

    public function createSingleGrade($attribute);

    public function updateSingleGrade($id,$attribute);

    public function deleteSingleGrade($id);
}
