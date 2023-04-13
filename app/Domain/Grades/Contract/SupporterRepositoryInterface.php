<?php

namespace App\Domain\Grades\Contract;

interface SupporterRepositoryInterface
{
    public function all();
    public function createRelationGrade($gradeId,$supporters);
}
