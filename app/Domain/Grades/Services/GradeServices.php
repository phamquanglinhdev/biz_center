<?php

namespace App\Domain\Grades\Services;

use App\Common\EntryCrud;
use App\Domain\Grades\Contract\SupporterRepositoryInterface;
use App\Domain\Grades\Contract\TeacherRepositoryInterface;
use App\Domain\Grades\Contract\StudentRepositoryInterface;
use App\Domain\Grades\Contract\GradeRepositoryInterface;
use App\Domain\Grades\Contract\StaffRepositoryInterface;
use App\Domain\Grades\DTOs\GradeListDto;
use App\Domain\Grades\Dtos\GradeStoreDto;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class GradeServices
{
    private GradeRepositoryInterface $gradeRepository;
    private StaffRepositoryInterface $staffRepository;
    private StudentRepositoryInterface $studentRepository;
    private TeacherRepositoryInterface $teacherRepository;
    private SupporterRepositoryInterface $supporterRepository;

    /**
     * @param GradeRepositoryInterface $gradeRepository
     * @param StaffRepositoryInterface $staffRepository
     * @param StudentRepositoryInterface $studentRepository
     * @param TeacherRepositoryInterface $teacherRepository
     * @param SupporterRepositoryInterface $supporterRepository
     */
    public function __construct(
        GradeRepositoryInterface     $gradeRepository,
        StaffRepositoryInterface     $staffRepository,
        StudentRepositoryInterface   $studentRepository,
        TeacherRepositoryInterface   $teacherRepository,
        SupporterRepositoryInterface $supporterRepository
    )
    {
        $this->gradeRepository = $gradeRepository;
        $this->staffRepository = $staffRepository;
        $this->studentRepository = $studentRepository;
        $this->teacherRepository = $teacherRepository;
        $this->supporterRepository = $supporterRepository;
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

    public function setupCreateOperation(): EntryCrud
    {
        $staffs = $this->staffRepository->all()->pluck("name", "id")->toArray();
        $teachers = $this->teacherRepository->all()->pluck("name", "id")->toArray();
        $supporter = $this->supporterRepository->all()->pluck("name", "id")->toArray();
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
            'data' => $teachers,
        ]);
        $entry->addFiled([
            'name' => 'supporters',
            'type' => 'select_relation',
            'label' => 'Trợ giảng',
            'class' => 'col-md-6',
            'data' => $supporter,
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

    public function createNewGrade($attributes)
    {
        $validator = Validator::make($attributes, [
            'name' => 'bail|required|max:255',
            'program' => 'bail|required',
            'time' => 'bail|required',
            'lessons' => 'bail|required',
            'status' => 'bail|required',
        ], [
            'name.required' => 'Thiếu tên lớp học',
            'program.required' => 'Thiếu chương trình học',
            'time.required' => 'Thiếu thời lượng',
            'lessons.required' => 'Thiếu số buổi học',
            'status.required' => 'Thiếu trạng thái lớp',
        ]);
        $attributes['status'] = (int)($attributes['status']);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $dto = new GradeStoreDto();
        foreach ($attributes as $propertyName => $value) {
            try {

            } catch (\Exception $exception) {

            }
            if ($value) {
                $dto->setProperty($propertyName, $value);
            }
            $dto->setStatus($attributes['status']);
        }
        if ($grade = $this->gradeRepository->createSingleGrade($dto->toArray())) {
            $this->staffRepository->createRelationGrade($grade->id, $attributes["staffs"] ?? []);
            $this->teacherRepository->createRelationGrade($grade->id, $attributes["teachers"] ?? []);
            $this->supporterRepository->createRelationGrade($grade->id, $attributes["supporter"] ?? []);
        }
        return redirect()->route("backend.grades.index")->with("success", "Thêm thành công");

    }
}
