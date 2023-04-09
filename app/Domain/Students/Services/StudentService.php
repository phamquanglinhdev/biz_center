<?php

namespace App\Domain\Students\Services;

use App\Domain\Students\DTOs\StudentDto;
use App\Domain\Students\DTOs\ListStudent;
use App\Domain\Students\DTOs\StudentShowDto;
use App\Domain\Students\Repositories\StudentRepositoryInterface;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

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

    public function createStudent(array $attributes)
    {
        $validator = Validator::make($attributes, [
            'name' => 'bail|required|max:255',
            'code' => 'bail|required|max:10',
            'birthday' => 'bail|required',
            'phone' => 'bail|required',
            'email' => 'bail|email|required|unique:users',
            'password' => 'bail|required',
        ], [
            'name.required' => 'Thiếu tên học sinh',
            'code.required' => 'Thiếu mã học sinh',
            'birthday.required' => 'Thiếu mật khẩu',
            'phone.required' => 'Thiếu số điện thoại',
            'email.required' => 'Thiếu email',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Địa chỉ email đã được đăng ký',
            'password.required' => 'Thiếu mật khẩu',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $attributes["birthday"] = Carbon::parse($attributes["birthday"])->toDateString();
        $studentDto = new StudentDto();
        foreach ($attributes as $propertyName => $value) {
            if ($value && $propertyName != "_token") {
                $studentDto->setProperty($propertyName, $value);
            }
        }

        $this->studentRepository->createStudent($studentDto);
    }

    public function studentTable($page = 0, $input = []): array
    {
        $lists = [];
        $students = $this->studentRepository->studentToTable($page, $input);
        foreach ($students as $student) {
            $studentToList = new ListStudent();
            $studentToList->setId($student->id);
            $studentToList->setCode($student->code);
            $studentToList->setName($student->name);
            $studentToList->setPhone($student->phone);
            $studentToList->setParent($student->parent ?? "-");
            $lists[] = $studentToList;
        }
        return $lists;
    }

    public function getStudentById($id)
    {
        $student = $this->studentRepository->findById($id);
        if ($student) {
            return new StudentShowDto($student);
        } else {
            return abort(404);
        }

    }

    public function updateStudent($attributes)
    {
        $validator = Validator::make($attributes, [
            'name' => 'bail|required|max:255',
            'code' => 'bail|required|max:10',
            'birthday' => 'bail|required',
            'phone' => 'bail|required',
            'email' => 'bail|email|required',
        ], [
            'name.required' => 'Thiếu tên học sinh',
            'code.required' => 'Thiếu mã học sinh',
            'birthday.required' => 'Thiếu mật khẩu',
            'phone.required' => 'Thiếu số điện thoại',
            'email.required' => 'Thiếu email',
            'email.email' => 'Email không đúng định dạng',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $id = $attributes["id"];
        unset($attributes["id"]);
        $studentDto = new StudentDto();
        foreach ($attributes as $propertyName => $value) {
            if ($value) {
                $studentDto->setProperty($propertyName, $value);
            }
        }
//        dd($studentDto);
        return $this->studentRepository->updateStudent($id, $studentDto);
    }

}
