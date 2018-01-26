<?php

namespace App\Http\Controllers\Users;

use App\Entities\Category;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index(){
        $objcategory = new Category();
        $categories = $objcategory->get();

        return view('account.categories.index', ['categories' => $categories]);
    }
}
