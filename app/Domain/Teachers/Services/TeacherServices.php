<?php

namespace App\Domain\Teachers\Services;
use App\Domain\Teachers\Contract\TeacherRepositoryInterface;
use App\Domain\Teachers\Dtos\TeacherListDto;
use Yajra\DataTables\Facades\DataTables;

class TeacherServices
{
    private TeacherRepositoryInterface $teacherRepository;

    /**
     * @param TeacherRepositoryInterface $teacherRepository
     */
    public function __construct(TeacherRepositoryInterface $teacherRepository)
    {
        $this->teacherRepository = $teacherRepository;
    }
    public function setupListOperation($filter=[])
    {
        $list = [];
        $teachers = $this->teacherRepository->getListTeacher();
        foreach ($teachers as $teacher){
            $list[] = new TeacherListDto($teacher);
        }
        return DataTables::collection($list)
            ->addColumn("action","backend.teachers.columns.action")
            ->editColumn("name","backend.teachers.columns.name")
            ->editColumn("cv","backend.teachers.columns.cv")
            ->rawColumns(["action","name","cv"])
            ->toJson();
    }

}
