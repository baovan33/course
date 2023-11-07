<?php
namespace Modules\Home\Src\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller {

    public function index() {
        return "222";
    }

    public function detail($id) {
        return $id;
    }
}
