<?php
namespace Modules\Courses\Src\Repositories;

use App\Repositories\BaseRepository;
use Modules\Courses\Src\Models\Course;
use Modules\Courses\Src\Repositories\CoursesRepositoryInterface;


class CoursesRepository extends BaseRepository implements CoursesRepositoryInterface {

    public function getModel()
    {
        return Course::class;
    }

    public function getAllCourses() {
        return $this->model
            ->select(['id', 'name', 'price', 'sale_price', 'status', 'created_at'])->latest();
    }

    public function createCourseCategories($course, $data = []) {
       return $course->categories()->attach($data);
    }

    public function getRealatedCategories($course) {
        $categoriesIds = $course->categories()->allRelatedIds()->toArray();
        return $categoriesIds;
    }

    public function updateCourseCategories($course, $data = []) {
         return $course->categories()->sync($data);

    }

    public function deleteCourseCategories($course) {
        return $course->categories()->detach();
    }
}
