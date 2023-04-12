<?php

namespace App\Domain\Staffs\Services;

use App\Domain\Staffs\Contract\StaffRepositoryInterface;
use App\Domain\Staffs\Dtos\StaffEditDto;
use App\Domain\Staffs\Dtos\StaffListDto;
use App\Domain\Staffs\Dtos\StaffStoreDto;
use App\Domain\Staffs\Dtos\StaffUpdateDto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class StaffService
{
    private StaffRepositoryInterface $staffRepository;

    /**
     * @param StaffRepositoryInterface $staffRepository
     */
    public function __construct(StaffRepositoryInterface $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }

    public function getAllStaffToTable()
    {
        $list = [];
        $staffs = $this->staffRepository->list();
        foreach ($staffs as $staff) {
            $list[] = new StaffListDto($staff);
        }
        return DataTables::collection($list)
            ->addColumn("action", "backend.staffs.columns.action")
            ->editColumn("name", "backend.staffs.columns.name")
            ->rawColumns(["action", "name"])
            ->toJson();
    }

    public function createStaff($attributes)
    {
        $validator = Validator::make($attributes, [
            'name' => 'bail|required|max:255',
            'code' => 'bail|required|max:10',
            'birthday' => 'bail|required',
            'phone' => 'bail|required',
            'email' => 'bail|email|required|unique:users',
            'password' => 'bail|required',
        ], [
            'name.required' => 'Thiếu tên nhân viên',
            'code.required' => 'Thiếu mã nhân viên',
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
        $staffStoreDto = new StaffStoreDto();
        foreach ($attributes as $propertyName => $value) {
            try {
                $staffStoreDto->setProperty($propertyName, $value);
            } catch (\Exception $exception) {

            }
        }
        return $this->staffRepository->create($staffStoreDto->toArray());
    }

    public function getStudentForEdit($id)
    {
        $student = $this->staffRepository->show($id);
        if (!$student) {
            return abort("404");
        }
        return new StaffEditDto($student);
    }

    public function updateStudent($id, $attributes)
    {
        $validator = Validator::make($attributes, [
            'name' => 'bail|required|max:255',
            'code' => 'bail|required|max:10',
            'birthday' => 'bail|required',
            'phone' => 'bail|required',
            'email' => 'bail|email|required|unique:users' . $id,
        ], [
            'name.required' => 'Thiếu tên nhân viên',
            'code.required' => 'Thiếu mã nhân viên',
            'birthday.required' => 'Thiếu ngày sinh',
            'phone.required' => 'Thiếu số điện thoại',
            'email.required' => 'Thiếu email',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Địa chỉ email đã được đăng ký',
        ]);
        $dto = new StaffUpdateDto();
        foreach ($attributes as $propertyName => $value) {
            try {
                $dto->setProperty($propertyName, $value);
            } catch (\Exception $exception) {
            }

        }
        return $this->staffRepository->update($id, $dto->toArray());

    }
}
