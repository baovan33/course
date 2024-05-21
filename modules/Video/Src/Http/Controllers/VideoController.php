<?php
namespace Modules\Video\Src\Http\Controllers;

use App\Http\Controllers\Controller;

class VideoController extends Controller {

    public function index() {
        return view('');
    }

    public function detail($id) {
        return $id;
    }
}
