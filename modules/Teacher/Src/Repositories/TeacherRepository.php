<?php
namespace Modules\Teacher\Src\Repositories;

use App\Repositories\BaseRepository;
use Modules\Teacher\Src\Models\Teacher;
use Modules\Teacher\Src\Repositories\TeacherRepositoryInterface;


class TeacherRepository extends BaseRepository implements TeacherRepositoryInterface {

    public function getModel()
    {
        return Teacher::class;
    }

    public function getAllTeachers() {
        return $this->model->select(['id', 'name', 'image', 'exp', 'created_at'])->latest();
    }


}
