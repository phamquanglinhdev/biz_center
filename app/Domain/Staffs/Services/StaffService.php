<?php

namespace App\Domain\Staffs\Services;

use App\Common\EntryCrud;
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

    public function setupCreateOperation($old = null): EntryCrud
    {
        $entry = new EntryCrud('staffs', 'Nhân viên',$old->id);
        $entry->addFiled([
            'name' => 'code',
            'class' => 'col-md-6',
            'type' => 'text',
            'label' => 'Mã nhân viên',
            'value' => $old->code ?? "",
        ]);
        $entry->addFiled([
            'name' => 'name',
            'class' => 'col-md-6',
            'type' => 'text',
            'label' => 'Tên nhân viên',
            'value' => $old->name ?? "",
        ]);
        $entry->addFiled([
            'name' => 'birthday',
            'class' => 'col-md-6',
            'type' => 'date',
            'label' => 'Sinh nhật',
            'value' => $old->birthday ?? "",
        ]);
        $entry->addFiled([
            'name' => 'job',
            'class' => 'col-md-6',
            'type' => 'text',
            'label' => 'Chức vụ',
            'value' => $old->job ?? "",
        ]);
        $entry->addFiled([
            'name' => 'phone',
            'class' => 'col-md-6',
            'type' => 'phone',
            'label' => 'Số điện thoại',
            'value' => $old->phone ?? "",
        ]);
        $entry->addFiled([
            'name' => 'email',
            'type' => 'email',
            'class' => 'col-md-6',
            'label' => 'Email nhân viên',
            'value' => $old->email ?? "",
        ]);
        $entry->addFiled([
            'name' => 'password',
            'type' => 'password',
            'label' => 'Mật khẩu',
        ]);
        return $entry;
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

    public function setupUpdateOperation($id)
    {
        $student = $this->staffRepository->show($id);
        $old = new StaffEditDto($student);
        return $this->setupCreateOperation($old);
    }

    public function updateStaff($id, $attributes)
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
