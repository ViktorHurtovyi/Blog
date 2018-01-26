<?php
namespace App\Http\Controllers\Admin;


use App\Entities\Article;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
public function index(){
    $objArticle = new Article();
        $articles = $objArticle->get();
        return view('admin.index', ['articles'=> $articles]);
}
}