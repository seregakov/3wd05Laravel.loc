<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyController extends Controller
{
//    public function index(){
//        return view('my_page', [
//            'h1' => 'Hello word',
//            'h2' => 'Hello laravel',
//        ]);
//    }

    public function index(){
        return view('admin.content');
    }

}
