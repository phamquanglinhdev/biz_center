<?php

namespace App\Domain\Teachers\Contract;

interface TeacherRepositoryInterface
{
    public function getListTeacher($filter=[]);
    public function createTeacher($attributes);
    public function showSingleTeacher($id);
    public function editTeacher($id);
    public function updateTeacher($id,$attributes);
    public function deleteTeacher($id);

}
