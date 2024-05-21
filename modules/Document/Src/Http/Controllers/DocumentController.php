<?php
namespace Modules\Document\Src\Http\Controllers;

use App\Http\Controllers\Controller;

class DocumentController extends Controller {

    public function index() {
        return view('');
    }

    public function detail($id) {
        return $id;
    }
}
