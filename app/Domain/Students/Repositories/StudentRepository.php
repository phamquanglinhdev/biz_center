<?php

namespace App\Domain\Students\Repositories;

use App\Domain\Students\DTOs\StudentDto;
use App\Domain\Students\Entites\Student;
use App\Domain\Students\Filters\StudentFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class StudentRepository implements StudentRepositoryInterface
{
    protected Builder $model;

    /**
     * @param Student $model
     */
    public function __construct(Student $model)
    {
        $this->model = $model->where("role", "student");
    }

    public function studentToTable($filter = [])
    {
        $query = $this->model;
        if (Arr::exists($filter, "code")) {
            $query = $query->where("code", "like", "%" . $filter["code"] . "%");
        }
        if (Arr::exists($filter, "name")) {
            $query = $query->where("name", "like", "%" . $filter["name"] . "%");
        }
        if (Arr::exists($filter, "phone")) {
            $query = $query->where("phone", "like", "%" . $filter["phone"] . "%");
        }
        if (Arr::exists($filter, "parent")) {
            $query = $query->where("phone", "like", "%" . $filter["phone"] . "%");
        }
        return $query->orderBy("created_at", "DESC")->get();
    }

    public function listAllStudent($orderBy = "created_at", $direction = "ASC", $perPage = 15)
    {
        return $this->model->orderBy($orderBy, $direction)->pagination($perPage);
    }

    public function listStudentOfStaff($staff_id, $orderBy = "created_at", $direction = "ASC", $perPage = 15)
    {
        // TODO: Implement listStudentOfStaff() method.
    }

    public function listStudentOfTeacher($teacher_id, $orderBy = "created_at", $direction = "ASC", $perPage = 15)
    {
        // TODO: Implement listStudentOfTeacher() method.
    }

    public function createStudent(StudentDto $studentDto)
    {
        $this->model->create($studentDto->toArray());
        return redirect()->route("backend.students.index");
    }

    public function updateStudent(int $id, StudentDto $studentDto)
    {
        $this->model->where("id", $id)->update($studentDto->toArray());
        return redirect()->route("backend.students.index");
    }

    public function deleteStudent(int $id)
    {
        $this->model->destroy($id);
        return redirect()->route("backend.students.index")->with("success", "Xóa thành công");
    }

    public function findById($id)
    {
        return $this->model->where("id", $id)->first();
    }
}
