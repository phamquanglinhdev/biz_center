<?php

namespace App\Domain\Grades\Services;

use App\Common\EntryCrud;
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

    public function setupCreateOperation()
    {
        $staffs = $this->staffRepository->list()->pluck("name", "id")->toArray();
        $entry = new EntryCrud("grades", "Lớp học");
        $entry->addFiled([
            'name' => 'thumbnail',
            'type' => 'image',
            'label' => 'Ảnh bìa lớp học',
        ]);
        $entry->addFiled([
            'name' => 'name',
            'type' => 'text',
            'label' => 'Tên lớp học',
            'class' => 'col-md-6'
        ]);
        $entry->addFiled([
            'name' => 'program',
            'type' => 'text',
            'label' => 'Chương trình học',
            'class' => 'col-md-6',
        ]);
        $entry->addFiled([
            'name' => 'time',
            'type' => 'number',
            'label' => 'Thời lượng(Giờ)',
            'class' => 'col-md-6',
        ]);
        $entry->addFiled([
            'name' => 'lessons',
            'type' => 'number',
            'label' => 'Số buổi',
            'class' => 'col-md-6',
        ]);
        $entry->addFiled([
            'name' => 'staffs',
            'type' => 'select_relation',
            'label' => 'Nhân viên',
            'class' => 'col-md-6',
            'data' => $staffs,
        ]);
        $entry->addFiled([
            'name' => 'teachers',
            'type' => 'select_relation',
            'label' => 'Giáo viên',
            'class' => 'col-md-6',
            'data' => null,
        ]);
        $entry->addFiled([
            'name' => 'supporters',
            'type' => 'select_relation',
            'label' => 'Trợ giảng',
            'class' => 'col-md-6',
            'data' => null,
        ]);
        $entry->addFiled([
            'name' => 'status',
            'type' => 'select',
            'label' => 'Trạng thái lớp',
            'class' => 'col-md-6',
            'data' => [
                0 => 'Đang học',
                1 => 'Đã kết thúc',
                2 => 'Đang bảo lưu'
            ],
        ]);
        return $entry;
    }
}
