<?php

namespace App\Domain\Staffs\Repositories;

use App\Domain\Staffs\Contract\StaffRepositoryInterface;
use App\Domain\Staffs\Entities\Staff;

class StaffRepository implements StaffRepositoryInterface
{
    private $model;

    /**
     * @param Staff $model
     */
    public function __construct(Staff $model)
    {
        $this->model = $model->where("role", "staff");
    }

    public function list($orderColumn = "created_at", $direction = "DESC")
    {
        // TODO: Implement list() method.
        return $this->model->orderBy($orderColumn, $direction)->get();
    }

    public function show($id)
    {
        // TODO: Implement show() method.
        return $this->model->where("id", $id)->first();
    }

    public function update($id, $staffUpdateDto)
    {
        // TODO: Implement update() method.
        if ($this->model->where("id", $id)->update($staffUpdateDto)) {
            return redirect()->route("backend.staffs.index")->with("success", "Thành công");
        }
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function create($staffStoreDto)
    {
        // TODO: Implement create() method.
        if ($this->model->create($staffStoreDto)) {
            return redirect()->route("backend.staffs.index")->with("success", "Thành công");
        };
    }
}
