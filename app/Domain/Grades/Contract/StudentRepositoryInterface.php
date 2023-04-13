<?php

namespace App\Domain\Grades\Contract;

interface StudentRepositoryInterface
{
    public function all();
    public function createRelationGrade($gradeId,$students);
}
