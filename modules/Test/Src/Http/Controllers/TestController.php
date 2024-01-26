<?php
namespace Modules\Test\Src\Http\Controllers;

use App\Http\Controllers\Controller;

class TestController extends Controller {

    public function index() {
        return view('');
    }

    public function detail($id) {
        return $id;
    }
}
