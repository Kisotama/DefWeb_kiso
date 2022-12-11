<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Categories;


class CategoryController extends Controller
{
    function list() {
        $data = Category::get();
        return view('category-list', compact('data'));
    }
}
