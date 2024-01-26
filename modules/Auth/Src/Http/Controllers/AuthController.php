<?php
namespace Modules\Auth\Src\Http\Controllers;

use App\Http\Controllers\Controller;

class AuthController extends Controller {

    public function index() {
        return view('');
    }

    public function detail($id) {
        return $id;
    }
}
