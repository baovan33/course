<?php
namespace Modules\Teacher\Src\Repositories;

use App\Repositories\RepositoryInterface;

interface TeacherRepositoryInterface extends RepositoryInterface {

    public function getAllTeachers();

}
