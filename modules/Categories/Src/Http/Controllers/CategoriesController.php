<?php
namespace Modules\Categories\Src\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Modules\Categories\Src\Http\Requests\CategoriesRequest;
use Modules\Categories\Src\Repositories\CategoriesRepository;
use Yajra\DataTables\Facades\DataTables;

class CategoriesController extends Controller {

    protected $categoryRepository;

    public function __construct(CategoriesRepository $categoriesRepository) {
        $this->categoryRepository = $categoriesRepository;
    }
    public function index() {
        $pageTitle  = 'List Categories';

        return view('categories::list', compact('pageTitle'));
    }

    public function data() {
        $categories      = $this->categoryRepository->getCategories();

        $categories      = DataTables::of($categories)
//            ->addColumn('edit', function ($category) {
//                return '<a href="'.route('admin.categories.edit', $category).'" class="btn btn-warning"> Sửa </a>'; })
//            ->addColumn('delete', function ($category) {
//                return '<a href="'.route('admin.categories.delete', $category).'"  class="btn btn-danger delete-action"> Xoá </a>'; })
//            ->addColumn('link', function ($categrory) {
//                return '<a href="" class="btn btn-primary"> Xem </a>'; })
//            ->editColumn('created_at', function ($category) {
//                return Carbon::parse($category->created_at)->format('d/m/Y H:i:s'); })
//            ->rawColumns(['edit', 'delete','link'])
            ->toArray();

       $categories['data'] = $this->getCategoriesTable($categories['data']);

       return $categories;
    }

    public function getCategoriesTable($categories, $char='', &$result=[]) {

        if( !empty($categories) ){
            foreach ($categories as $category) {
                $row                = $category;
                $row['name']        = $char.$row['name'];
                $row['edit']        = '<a href="'.route('admin.categories.edit', $category['id']).'" class="btn btn-warning"> Sửa </a>';
                $row['delete']      = '<a href="'.route('admin.categories.delete', $category['id']).'"  class="btn btn-danger delete-action"> Xoá </a>';
                $row['link']        = '<a target="_blank" href="" class="btn btn-primary"> Xem </a>';
                $row['created_at']  = Carbon::parse($category['created_at'])->format('d/m/Y H:i:s');

                unset($row['sub_categories']);
                $result[]           = $row;

                if( !empty($category['sub_categories']) ) {
                    $this->getCategoriesTable($category['sub_categories'], $char . '|-- ', $result);
                }
            }
        }
        return $result;
    }

    public function create() {
        $pageTitle = 'Add New Category';
        $categories = $this->categoryRepository->getAllCategories();

        return view('categories::add', compact('pageTitle', 'categories'));
    }

    public function store(CategoriesRequest $request) {
        $this->categoryRepository->create([
            'name'     => $request->name,
            'slug'    => $request->slug,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('admin.categories.index')
            ->with('msg', __('categories::messages.create.success'));
    }

    public function edit($id)
    {
        $pageTitle = 'Edit Category';
        $category      = $this->categoryRepository->find($id);
        $categories = $this->categoryRepository->getAllCategories();

        if (!$category) {
            abort(404);
        }else {
            return view('categories::edit', compact('category', 'pageTitle', 'categories'));
        }
    }

    public function update(CategoriesRequest $request, $id) {
        $data  = $request->except('_token');

        $this->categoryRepository->update($id, $data);
        return redirect()->route('admin.categories.index')
            ->with('msg', __('categories::messages.update.success'));

    }
    public function delete($id)
    {
        $this->categoryRepository->delete($id);
        return redirect()->route('admin.categories.index')
            ->with('msg', __('categories::messages.delete.success'));
    }



    }
