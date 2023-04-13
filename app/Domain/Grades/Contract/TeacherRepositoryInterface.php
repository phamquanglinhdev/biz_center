<?php

namespace App\Domain\Grades\Contract;

interface TeacherRepositoryInterface
{
    public function all();

    public function createRelationGrade($gradeId, $teachers);
}
