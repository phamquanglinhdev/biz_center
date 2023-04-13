<?php

namespace App\Domain\Grades\Repositories;

use App\Domain\Grades\Contract\SupporterRepositoryInterface;
use App\Domain\Grades\Entities\Supporter;
use Illuminate\Support\Facades\DB;

class SupporterRepository implements SupporterRepositoryInterface
{
    private $supporter;

    /**
     * @param Supporter $supporter
     */
    public function __construct(Supporter $supporter)
    {
        $this->supporter = $supporter->where("role", "teacher");;
    }

    public function all()
    {
        // TODO: Implement all() method.
        return $this->supporter->get();
    }

    public function createRelationGrade($gradeId, $supporters): void
    {
        DB::table("supporter_grade")->where("grade_id", $gradeId)->delete();
        foreach ($supporters as $supporter) {
            DB::table("supporter_grade")->insert([
                'grade_id' => $gradeId,
                'supporter_id' => $supporter,
            ]);
        }
    }
}
