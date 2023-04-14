<?php

namespace App\Domain\Grades\Contract;

interface LogRepositoryInterface
{
    public function deleteByGrade($gradeId);
}
