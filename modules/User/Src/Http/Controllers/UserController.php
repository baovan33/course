<?php
namespace Modules\User\Src\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Modules\User\Src\Http\Requests\UserRequest;
use Modules\User\Src\Repositories\UserRepository;
use Yajra\DataTables\Facades\DataTables;
class UserController extends Controller {

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index() {

        $pageTitle = 'List User';
        return view('user::list', compact('pageTitle'));
    }

    public function data() {
        $users      = $this->userRepository->getAllUsers();
        return DataTables::of($users)
            ->addColumn('edit', function ($user) {
                return '<a href="#" class="btn btn-warning"> Sửa </a>'; })
            ->addColumn('delete', function ($user) {
                return '<a href="#" class="btn btn-danger"> Xoá </a>'; })
            ->editColumn('created_at', function ($user) {
                return Carbon::parse($user->created_at)->format('d/m/Y H:i:s'); })
            ->rawColumns(['edit', 'delete'])
            ->toJson();

    }
    public function create() {
        $pageTitle = 'Add New User';
        return view('user::add', compact('pageTitle'));
    }

    public function store(UserRequest $request) {

        $this->userRepository->create([
            'name'     => $request->name,
            'email'    => $request->email,
            'group_id' => $request->group_id,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.users.index')->with('msg', __('user::messages.success'));
    }
}
