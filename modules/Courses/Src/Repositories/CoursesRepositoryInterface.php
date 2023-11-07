<?php
namespace Modules\Courses\Src\Repositories;

use App\Repositories\RepositoryInterface;

interface CoursesRepositoryInterface extends RepositoryInterface {

    public function getAllCourses();
}
