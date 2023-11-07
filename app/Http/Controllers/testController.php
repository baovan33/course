<?php

namespace App\Http\Controllers;

use App\Models\test;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function index() {
        $pageTitle = 'Recusive Category';
        $test = new test();
        $data = $test->getdata();
        $tree = $test->renderMenu($data);
        return $tree;
    }
}
