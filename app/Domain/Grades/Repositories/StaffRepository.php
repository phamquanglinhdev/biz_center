<?php

namespace App\Domain\Grades\Repositories;

use App\Domain\Grades\Contract\StaffRepositoryInterface;
use App\Domain\Grades\Entities\Staff;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class StaffRepository implements StaffRepositoryInterface
{
    private $staff;

    /**
     * @param Staff $staff
     */
    public function __construct(Staff $staff)
    {
        $this->staff = $staff->where("role", "staff");
    }

    public function all(): Collection
    {
        // TODO: Implement all() method.
        return $this->staff->get();
    }

    public function createRelationGrade($gradeId, $staffs): void
    {
        DB::table("staff_grade")->where("grade_id", $gradeId)->delete();
        foreach ($staffs as $staff) {
            DB::table("staff_grade")->insert([
                'grade_id' => $gradeId,
                'staff_id' => $staff,
            ]);
        }
    }
}
