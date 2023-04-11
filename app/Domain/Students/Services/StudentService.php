<?php

namespace App\Domain\Students\Services;

use App\Domain\Students\DTOs\StudentDto;
use App\Domain\Students\DTOs\ListStudent;
use App\Domain\Students\DTOs\StudentEditDto;
use App\Domain\Students\DTOs\StudentShowDto;
use App\Domain\Students\Repositories\StudentRepositoryInterface;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

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

        return $this->studentRepository->createStudent($studentDto);
    }

    /**
     * @throws \Exception
     */
    public function studentTable($input = [])
    {
        $lists = [];
        $students = $this->studentRepository->studentToTable($input);
        foreach ($students as $student) {
            $studentToList = new ListStudent($student);
            $lists[] = $studentToList;
        }
        return DataTables::collection($lists)
            ->addColumn("action", "I")
            ->editColumn("name", "backend.students.columns.name")
            ->editColumn("action", "backend.students.columns.action")
            ->rawColumns(["name", "action"])
            ->toJson();

    }

    public function getStudentById($id)
    {
        $student = $this->studentRepository->findById($id);
        if ($student) {
            return new StudentEditDto($student);
        } else {
            return abort(404);
        }

    }

    public function updateStudent($attributes,$id)
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
        $studentDto = new StudentDto();
        foreach ($attributes as $propertyName => $value) {
            if ($value) {
                $studentDto->setProperty($propertyName, $value);
            }
        }
//        dd($studentDto);
        return $this->studentRepository->updateStudent($id, $studentDto);
    }

    public function deleteStudent($id)
    {
        return $this->studentRepository->deleteStudent($id);
    }

    public function getStudentToShow($id)
    {
        $student = $this->studentRepository->findById($id);
        return new StudentShowDto($student);
    }

}
