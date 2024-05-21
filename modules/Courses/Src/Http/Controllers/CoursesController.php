<?php
namespace Modules\Courses\Src\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Modules\Categories\Src\Repositories\CategoriesRepository;
use Modules\Categories\Src\Repositories\CategoriesRepositoryInterface;
use Modules\Courses\Src\Http\Requests\CoursesRequest;
use Modules\Courses\Src\Repositories\CoursesRepository;
use Modules\Courses\Src\Repositories\CoursesRepositoryInterface;
use Modules\Teacher\Src\Repositories\TeacherRepository;
use Modules\Teacher\Src\Repositories\TeacherRepositoryInterface;
use Yajra\DataTables\Facades\DataTables;

class CoursesController extends Controller {

    protected $coursesRepository;
    protected $categoriesRepository;
    protected $teacherRepository;
    public function __construct(
        CoursesRepositoryInterface $coursesRepository,
        CategoriesRepositoryInterface $categoriesRepository,
        TeacherRepositoryInterface $teacherRepository,
    )
    {
        $this->coursesRepository    = $coursesRepository;
        $this->categoriesRepository = $categoriesRepository;
        $this->teacherRepository    = $teacherRepository;
    }

    public function index() {

        $pageTitle = 'List Course';
        return view('courses::list', compact('pageTitle'));
    }

    public function data() {
        $courses      = $this->coursesRepository->getAllCourses();
        return DataTables::of($courses)
            ->editColumn('lessons', function ($course) {
                return '<a href="'.route('admin.lessons.index', $course).'" class="btn btn-info" style=" display: block; margin: 0 auto; "> Lessons </a>'; })
            ->addColumn('edit', function ($course) {
                return '<a href="'.route('admin.courses.edit', $course).'" class="btn btn-warning" style=" display: block; margin: 0 auto; "> Edit </a>'; })
            ->addColumn('delete', function ($course) {
                return '<a href="'.route('admin.courses.delete', $course).'"  class="btn btn-danger delete-action" style=" display: block; margin: 0 auto; "> Delete </a>'; })
            ->editColumn('created_at', function ($course) {
                return Carbon::parse($course->created_at)->format('d/m/Y H:i:s'); })
            ->editColumn('status', function ($course) {
                return $course->status == 1 ? '<button class="btn btn-success" style="width: 106px; display: block; margin: 0 auto; "> active</button>'
                                            : '<button class="btn btn-secondary" style=" display: block; margin: 0 auto; ">not actived</button>'; })
            ->editColumn('price', function ($course) {
                if ( $course->price ) {
                    if ( $course->sale_price ) {
                        $price = number_format($course->sale_price, 0, '.', ',') . 'Đ';
                    } else {
                        $price = number_format($course->price, 0, '.', ',') . 'Đ';

                    }
                } else {
                    $price = 'Free';
                }
                return $price; })
            ->rawColumns(['edit', 'delete', 'status', 'lessons' ])
            ->toJson();

    }
    public function create() {
        $pageTitle = 'Add New Course';

        $categories = $this->categoriesRepository->getAllCategories();

        $teachers   = $this->teacherRepository->getAllTeachers()->get();

        return view('courses::add', compact('pageTitle', 'categories', 'teachers'));
    }

    public function store(CoursesRequest $request) {

        $courses = $request->except(['_token']);
        if ( !$courses['price'] ) {
            $courses['price'] = 0;
        }

        if ( !$courses['sale_price'] ) {
            $courses['sale_price'] = 0;
        }

        $categories = $this->getCategories($courses);

        $course = $this->coursesRepository->create($courses);
        $this->coursesRepository->createCourseCategories($course, $categories);
        return redirect()->route('admin.courses.index')
            ->with('msg', __('courses::messages.create.success'));
    }

    public function edit($id) {
        $pageTitle    = 'Edit Course';

        $course       = $this->coursesRepository->find($id);

        $categoriesIds = $this->coursesRepository->getRealatedCategories($course);

        $categories   = $this->categoriesRepository->getAllCategories();

        $teachers   = $this->teacherRepository->getAllTeachers()->get();

        if (!$course) {
            abort(404);
        }else {
            return view('courses::edit', compact('course', 'pageTitle', 'categories', 'categoriesIds', 'teachers'));
        }
    }

    public function update(CoursesRequest $request, $id) {

        $courses = $request->except(['_token', '_method']);
        if ( !$courses['price'] ) {
            $courses['price'] = 0;
        }

        if ( !$courses['sale_price'] ) {
            $courses['sale_price'] = 0;
        }

        $categories = $this->getCategories($courses);
        $courseUpdate = $this->coursesRepository->update($id, $courses);

        $this->coursesRepository->updateCourseCategories($courseUpdate, $categories);

        return redirect()->route('admin.courses.index')
            ->with('msg', __('courses::messages.update.success'));

    }

    public function delete($id) {

        $course = $this->coursesRepository->find($id);

        //$this->coursesRepository->deleteCourseCategories($course);
        $status = $this->coursesRepository->delete($id);
        if ( $status ) {
            $image = $course->thumbnail;
            deleteFileStorage($image);
        }
        return redirect()->route('admin.courses.index')
            ->with('msg', __('courses::messages.delete.success'));
    }

    public function getCategories($courses) {

        $categories = [];
        foreach ( $courses['categories'] as $category ) {
            $categories[$category] = ['created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')];
        }

        return $categories;
    }
}
