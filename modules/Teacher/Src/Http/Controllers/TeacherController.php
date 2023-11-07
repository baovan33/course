<?php
namespace Modules\Teacher\Src\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Modules\Teacher\Src\Http\Requests\TeacherRequest;
use Modules\Teacher\Src\Repositories\TeacherRepository;
use Yajra\DataTables\Facades\DataTables;

class TeacherController extends Controller {

    protected $teacherRepository;
    public function __construct(TeacherRepository $teacherRepository)
    {
        $this->teacherRepository = $teacherRepository;
    }

    public function index() {

        $pageTitle = 'List Teachers';
        return view('teacher::list', compact('pageTitle'));
    }

    public function data() {
        $teachers      = $this->teacherRepository->getAllTeachers();

        return DataTables::of($teachers)
            ->addColumn('edit', function ($teacher) {
                return '<a href="'.route('admin.teacher.edit', $teacher).'" class="btn btn-warning"> Sửa </a>'; })
            ->addColumn('delete', function ($teacher) {
                return '<a href="'.route('admin.teacher.delete', $teacher).'"  class="btn btn-danger delete-action"> Xoá </a>'; })
            ->editColumn('created_at', function ($teacher) {
                return Carbon::parse($teacher->created_at)->format('d/m/Y H:i:s'); })
            ->editColumn('exp', function ($teacher) {
                return $teacher->exp . ' years of experience'; })
            ->addColumn('image', function ($teacher) {
                return $teacher->image ? '<img src="'.$teacher->image.'
                " style="width: 50px; height: 50px; display: block; margin: 0 auto;" />' : ''; })
            ->rawColumns(['edit', 'delete', 'image'])
            ->toJson();

    }
    public function create() {
        $pageTitle = 'Add New Teacher';
        return view('teacher::add', compact('pageTitle'));
    }

    public function store(TeacherRequest $request) {


        $teachers =  $request->except(['_token']);
        $this->teacherRepository->create($teachers);

        return redirect()->route('admin.teacher.index')
            ->with('msg', __('teacher::messages.create.success'));
    }

    public function edit($id) {
        $pageTitle = 'Edit Teacher';

        $teacher      = $this->teacherRepository->find($id);

        if (!$teacher) {
            abort(404);
        }else {
            return view('teacher::edit', compact('teacher', 'pageTitle'));
        }
    }

    public function update(TeacherRequest $request, $id) {
        $teacher  = $request->except('_token', '_method');

        $this->teacherRepository->update($id, $teacher);

        return redirect()->route('admin.teacher.index')
            ->with('msg', __('teacher::messages.update.success'));

    }

    public function delete($id) {

        $teacher = $this->teacherRepository->find($id);

        $status = $this->teacherRepository->delete($id);

        if ( $status ) {
            $image   = $teacher->image;

            deleteFileStorage($image);
        }
        return redirect()->route('admin.teacher.index')
            ->with('msg', __('teacher::messages.delete.success'));
    }
}

