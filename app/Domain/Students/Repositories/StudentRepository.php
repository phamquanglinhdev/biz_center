<?php

namespace App\Domain\Students\Repositories;

use App\Domain\Students\DTOs\StudentDto;
use App\Domain\Students\Entites\Student;
use Illuminate\Support\Facades\DB;

class StudentRepository implements StudentRepositoryInterface
{
    protected Student $model;

    /**
     * @param Student $model
     */
    public function __construct(Student $model)
    {
        $this->model = $model;
    }


    public function listAllStudent($orderBy = "created_at", $direction = "ASC", $perPage = 15)
    {
        return $this->model->orderBy($orderBy, $direction)->get();
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
        return response()->json(['message' => 'Thành công'], 200);
    }

    public function updateStudent(int $id, StudentDto $studentDto)
    {
        $this->model->where("id", $id)->update($studentDto->toArray());
    }

    public function deleteStudent(int $id)
    {
        $this->model->delete($id);
    }

    public function findByEmail($email)
    {
        return $this->model->where("email", $email)->first();
    }
}
