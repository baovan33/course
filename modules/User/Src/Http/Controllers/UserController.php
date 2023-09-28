<?php
namespace Modules\User\Src\Http\Controllers;

use App\Http\Controllers\Controller;

class UserController extends Controller {

    public function index() {
        $pageTitle = 'List User';
        return view('user::list', compact('pageTitle'));
    }

    public function detail($id) {
        return $id;
    }
}
