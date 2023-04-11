<?php

namespace App\Domain\Grades\Interface;
interface GradeRepositoryInterface
{
    public function getListGrades($filter);

    public function getSingleGrade($id);

    public function updateSingleGrade($id);

    public function deleteSingleGrade($id);
}
