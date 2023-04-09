<?php

namespace App\Domain\Students\Repositories;


use App\Domain\Students\DTOs\StudentDto;

interface StudentRepositoryInterface
{
    public function listAllStudent($orderBy = "created_at", $direction = "ASC", $perPage = 15);

    public function listStudentOfStaff($staff_id, $orderBy = "created_at", $direction = "ASC", $perPage = 15);

    public function listStudentOfTeacher($teacher_id, $orderBy = "created_at", $direction = "ASC", $perPage = 15);

    public function findById($id);

    public function createStudent(StudentDto $studentDto);

    public function updateStudent(int $id, StudentDto $studentDto);

    public function deleteStudent(int $id);

    public function studentToTable($page = 0, $filter = []);
}
