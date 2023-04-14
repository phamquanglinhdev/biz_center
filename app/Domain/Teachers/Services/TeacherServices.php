<?php

namespace App\Domain\Teachers\Services;
use App\Common\EntryCrud;
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
    public function setupCreateOperation($old = null): EntryCrud
    {
        $entry = new EntryCrud("teachers","Giáo viên",$old->id??null);
        $entry->addFiled([
            'name'=>'avatar',
            'label'=>'Ảnh đại diện',
            'type'=>'image',
            'value'=>$old->avatar??null,

        ]);
        $entry->addFiled([
            'name'=>'code',
            'label'=>'Mã giáo viên',
            'type'=>'text',
            'value'=>$old->code??null,
            'class'=>'col-md-6'
        ]);
        $entry->addFiled([
            'name'=>'name',
            'label'=>'Tên giáo viên',
            'type'=>'text',
            'value'=>$old->name??null,
            'class'=>'col-md-6'
        ]);
        $entry->addFiled([
            'name'=>'phone',
            'label'=>'Số điện thoại',
            'type'=>'phone',
            'value'=>$old->phone??null,
            'class'=>'col-md-6'
        ]);
        $entry->addFiled([
            'name'=>'email',
            'label'=>'Email',
            'type'=>'email',
            'value'=>$old->email??null,
            'class'=>'col-md-6'
        ]);
        $entry->addFiled([
            'name'=>'facebook',
            'label'=>'Facebook',
            'type'=>'text',
            'value'=>$old->facebook??null,
            'class'=>'col-md-6'
        ]);
        $entry->addFiled([
            'name'=>'address',
            'label'=>'Địa chỉ',
            'type'=>'text',
            'value'=>$old->address??null,
            'class'=>'col-md-6'
        ]);
        $entry->addFiled([
            'name'=>'cv',
            'label'=>'Địa chỉ',
            'type'=>'upload',
            'value'=>$old->cv??null,
            'class'=>'col-md-6'
        ]);
        $entry->addFiled([
            'name'=>'password',
            'label'=>'Mật khẩu',
            'type'=>'password',
            'value'=>$old->password??null,
            'class'=>'col-md-6'
        ]);
        return $entry;
    }

}
