<?php
namespace Modules\Lessons\Src\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Courses\Src\Repositories\CoursesRepositoryInterface;

class LessonsController extends Controller {
    protected $coursesRepository;

    public  function  __construct(CoursesRepositoryInterface $coursesRepository)
    {
        $this->coursesRepository = $coursesRepository;
    }

    public function index($courseId) {
        $course = $this->coursesRepository->find($courseId);
        if ($course) {
            $courseName = $course->name;
        } else {
            $courseName = 'Course Not Found'; // Or display an error message
        }
        $pageTitle = 'List Lessons';
        return view('lessons::list', compact('pageTitle', 'courseId', 'courseName', 'course'));

    }

    public function create($courseId) {

        $pageTitle = 'Add Lessons';
        return view('lessons::add', compact('pageTitle', 'courseId'));
    }

    public function test() {
        echo 222;
    }
}
