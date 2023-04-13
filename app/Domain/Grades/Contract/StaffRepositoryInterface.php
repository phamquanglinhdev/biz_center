<?php

namespace App\Domain\Grades\Contract;

interface StaffRepositoryInterface
{
    public function all();
    public function createRelationGrade($gradeId,$staffs);
}
