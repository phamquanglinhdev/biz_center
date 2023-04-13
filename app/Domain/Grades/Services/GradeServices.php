<?php

namespace App\Domain\Grades\Services;

use App\Domain\Grades\Dtos\GradeCreateDto;
use App\Domain\Grades\Entities\Grade;
use App\Domain\Grades\Interface\GradeRepositoryInterface;
use App\Domain\Grades\DTOs\GradeListDto;
use App\Domain\Staffs\Contract\StaffRepositoryInterface;
use App\Domain\Students\Repositories\StudentRepositoryInterface;
use Yajra\DataTables\Facades\DataTables;

class GradeServices
{
    private GradeRepositoryInterface $gradeRepository;
    private StaffRepositoryInterface $staffRepository;
    private StudentRepositoryInterface $studentRepository;

    /**
     * @param GradeRepositoryInterface $gradeRepository
     * @param StaffRepositoryInterface $staffRepository
     * @param StudentRepositoryInterface $studentRepository
     */
    public function __construct(GradeRepositoryInterface $gradeRepository, StaffRepositoryInterface $staffRepository, StudentRepositoryInterface $studentRepository)
    {
        $this->gradeRepository = $gradeRepository;
        $this->staffRepository = $staffRepository;
        $this->studentRepository = $studentRepository;
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

    public function getRelationData()
    {
        $staffs = $this->staffRepository->list();
        $students = $this->studentRepository->listAllStudent();
        return new GradeCreateDto($staffs, $students);
    }
}
