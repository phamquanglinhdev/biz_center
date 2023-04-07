<?php

namespace App\Domain\Students\Services;

use App\Domain\Students\DTOs\StudentDto;
use App\Domain\Students\DTOs\StudentToListDto;
use App\Domain\Students\Repositories\StudentRepositoryInterface;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class StudentService
{
    protected StudentRepositoryInterface $studentRepository;

    /**
     * @param StudentRepositoryInterface $studentRepository
     */
    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function getListStudents()
    {
        $studentsToList = [];
        $students = $this->studentRepository->listAllStudent();
        foreach ($students as $student) {
            $studentToList = new StudentToListDto();
            $studentToList->setId($student->id);
            $studentToList->setCode($student->code);
            $studentToList->setName($student->name);
            $studentToList->setPhone($student->phone);
            $studentToList->setParent($student->parent ?? "-");
            $studentsToList[] = $studentToList;
        }
        return $studentsToList;
    }

    public function createStudent(array $attributes)
    {
        if (!$attributes["code"]) {
            return response()->json([
                'message' => 'Thiếu mã học sinh'
            ], 403);
        }
        if (!$attributes["password"]) {
            return response()->json([
                'message' => 'Thiếu mật khẩu'
            ], 403);
        }
        if (!$attributes["name"]) {
            return response()->json([
                'message' => 'Thiếu tên học sinh'
            ], 403);
        }
        if (!$attributes["birthday"]) {
            return response()->json([
                'message' => 'Thiếu sinh nhật'
            ], 403);
        }
        if (!$attributes["phone"]) {
            return response()->json([
                'message' => 'Thiếu số điện thoại'
            ], 403);
        }
        if (!$attributes["email"]) {
            return response()->json([
                'message' => 'Thiếu email'
            ], 403);
        }
        $attributes["password"] = Hash::make($attributes["password"]);
        $attributes["birthday"] = Carbon::parse($attributes["birthday"])->toDateString();
        if ($this->studentRepository->findByEmail($attributes['email'])) {
            return response()->json([
                'message' => 'Trùng email'
            ], 403);
        }
        $studentDto = new StudentDto();
        foreach ($attributes as $propertyName => $value) {
            if ($value && $propertyName != "_token") {
                $studentDto->setProperty($propertyName, $value);
            }
        }

        $this->studentRepository->createStudent($studentDto);
    }

}
