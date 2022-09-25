<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        // dd('created'); hien chu len man hinh
        return view('category.add'); //return ve mot view
    }
}
