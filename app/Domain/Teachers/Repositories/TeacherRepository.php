<?php

namespace App\Domain\Teachers\Repositories;

use App\Domain\Grades\Entities\Teacher;
use Illuminate\Database\Eloquent\Builder;

class TeacherRepository implements \App\Domain\Teachers\Contract\TeacherRepositoryInterface
{
    private $teacher;

    public function __construct(Teacher $teacher)
    {
        $this->teacher = $teacher->where("role","teacher");
    }

    public function getListTeacher($filter = [])
    {
        // TODO: Implement getListTeacher() method.
        return $this->teacher->orderBy("created_at","DESC")->get();
    }

    public function createTeacher($attributes)
    {
        // TODO: Implement createTeacher() method.\
        return $this->teacher->create($attributes);
    }

    public function showSingleTeacher($id)
    {
        // TODO: Implement showSingleTeacher() method.
        return $this->teacher->where("id",$id)->first();
    }

    public function editTeacher($id)
    {
        // TODO: Implement editTeacher() method.
    }

    public function updateTeacher($id, $attributes)
    {
        // TODO: Implement updateTeacher() method.
        return $this->teacher->where("id",$id)->update($attributes);
    }

    public function deleteTeacher($id)
    {
        // TODO: Implement deleteTeacher() method.
        return $this->teacher->where("id",$id)->delete();
    }
}
