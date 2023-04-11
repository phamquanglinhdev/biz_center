<?php
namespace App\Domain\Grades\Services;
use App\Domain\Grades\Interface\GradeRepositoryInterface;
use App\Domain\Grades\DTOs\GradeListDto;
use Yajra\DataTables\Facades\DataTables;

class GradeServices
{
    private GradeRepositoryInterface $gradeRepository;
    public function __construct(GradeRepositoryInterface $gradeRepository)
    {
        $this->gradeRepository = $gradeRepository;
    }

    public function getListGrades($attributes)
    {
        $list = [];
        $gradeRaw = $this->gradeRepository->getListGrades($attributes);
        foreach ($gradeRaw as $grade) {
            $list[] = (new GradeListDto($grade));
        }
        return DataTables::collection($list)
            ->editColumn("name", "backend.grades.columns.name")
            ->editColumn("action", "backend.grades.columns.action")
            ->rawColumns(["name", "action"])
            ->toJson();
    }
}
