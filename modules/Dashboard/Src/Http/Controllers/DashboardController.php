<?php
namespace Modules\Dashboard\Src\Http\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller {

    public function index() {
        $pageTitle = 'Dashboard';
        return view('dashboard::dashboard', compact('pageTitle'));
    }

    public function detail($id) {
        return $id;
    }
}
