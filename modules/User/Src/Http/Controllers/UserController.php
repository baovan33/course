<?php
namespace Modules\User\Src\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Modules\User\Src\Http\Requests\UserRequest;
use Modules\User\Src\Repositories\UserRepository;
use Modules\User\Src\Repositories\UserRepositoryInterface;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller {

    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
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
                return '<a href="'.route('admin.users.edit', $user).'" class="btn btn-warning"> Sửa </a>'; })
            ->addColumn('delete', function ($user) {
                return '<a href="'.route('admin.users.delete', $user).'"  class="btn btn-danger delete-action"> Xoá </a>'; })
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

        return redirect()->route('admin.users.index')
                        ->with('msg', __('user::messages.create.success'));
    }

    public function edit($id) {
        $pageTitle = 'Edit User';
        $user      = $this->userRepository->find($id);

        if (!$user) {
            abort(404);
        }else {
            return view('user::edit', compact('user', 'pageTitle'));
        }
    }

    public function update(UserRequest $request, $id) {
       $data  = $request->except('_token', 'password');

       if ($request->password) {
           $data['password']   = bcrypt($request->password);
       }

       $this->userRepository->update($id, $data);
       return redirect()->route('admin.users.index')
                        ->with('msg', __('user::messages.update.success'));

    }

    public function delete($id) {

        $this->userRepository->delete($id);
        return redirect()->route('admin.users.index')
            ->with('msg', __('user::messages.delete.success'));
    }
}
