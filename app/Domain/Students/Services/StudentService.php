<?php

namespace App\Domain\Students\Services;

use App\Common\EntryCrud;
use App\Domain\Staffs\Contract\StaffRepositoryInterface;
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
    protected StaffRepositoryInterface $staffRepository;

    /**
     * @param StudentRepositoryInterface $studentRepository
     * @param StaffRepositoryInterface $staffRepository
     */
    public function __construct(StudentRepositoryInterface $studentRepository, StaffRepositoryInterface $staffRepository)
    {
        $this->studentRepository = $studentRepository;
        $this->staffRepository = $staffRepository;
    }

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
            try {
                if ($value) {
                    $studentDto->setProperty($propertyName, $value);
                }
            } catch (\Exception $exception) {
            };
        }

        return $this->studentRepository->createStudent($studentDto);
    }

    public function setupCreateOperation($old = null): EntryCrud
    {
        $init_staff = $this->staffRepository->list()->pluck("name", "id")->toArray();
        $entry = new EntryCrud("students", "Học sinh", $old->id ?? null);
        $entry->addFiled([
            'name' => 'avatar',
            'label' => 'Ảnh đại diện',
            'type' => 'image',
            'value' => $old->avatar ?? null,
        ]);
        $entry->addFiled([
            'name' => 'code',
            'label' => 'Mã học sinh',
            'type' => 'text',
            'value' => $old->code ?? null,
            'class' => 'col-md-6',
        ]);
        $entry->addFiled([
            'name' => 'name',
            'label' => 'Tên học sinh',
            'type' => 'text',
            'value' => $old->name ?? null,
            'class' => 'col-md-6',
        ]);
        $entry->addFiled([
            'name' => 'birthday',
            'label' => 'Ngày sinh',
            'type' => 'date',
            'value' => $old->birthday ?? null,
            'class' => 'col-md-6',
        ]);
        $entry->addFiled([
            'name' => 'phone',
            'label' => 'Số điện thoại',
            'type' => 'phone',
            'value' => $old->phone ?? null,
            'class' => 'col-md-6',
        ]);
        $entry->addFiled([
            'name' => 'email',
            'label' => 'Email',
            'type' => 'email',
            'value' => $old->email ?? null,
            'class' => 'col-md-6',
        ]);
        $entry->addFiled([
            'name' => 'address',
            'label' => 'Địa chỉ',
            'type' => 'text',
            'value' => $old->address ?? null,
            'class' => 'col-md-6',
        ]);
        $entry->addFiled([
            'name' => 'parent',
            'label' => 'Phụ huynh',
            'type' => 'text',
            'value' => $old->parent ?? null,
            'class' => 'col-md-6',
        ]);
        $entry->addFiled([
            'name' => 'parent_phone',
            'label' => 'Số điện thoại phụ huynh',
            'type' => 'phone',
            'value' => $old->parent_phone ?? null,
            'class' => 'col-md-6',
        ]);
        $entry->addFiled([
            'name' => 'staff_id',
            'label' => 'Nhân viên',
            'type' => 'select',
            'value' => $old->staff_id ?? null,
            'data' => $init_staff,
            'nullable' => true,
            'class' => 'col-md-6',
        ]);
        $entry->addFiled([
            'name' => 'password',
            'label' => 'Mật khẩu',
            'type' => 'password',
            'class' => 'col-md-6',
        ]);
        return $entry;
    }

    public function setupUpdateOperation($id)
    {
        $student = $this->studentRepository->findById($id);
        if ($student) {
            return $this->setupCreateOperation($student);
        } else {
            return abort(404);
        }

    }

    public function updateStudent($attributes, $id)
    {
        $validator = Validator::make($attributes, [
            'name' => 'bail|required|max:255',
            'code' => 'bail|required|max:10',
            'birthday' => 'bail|required',
            'phone' => 'bail|required',
            'email' => 'bail|email|required|unique:users,email,' . $id,
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
            try {
                if ($value) {
                    $studentDto->setProperty($propertyName, $value);
                }
            } catch (\Exception $exception) {

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
