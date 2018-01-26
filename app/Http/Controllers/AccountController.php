<?php


namespace App\Http\Controllers;

use App\Entities\Article;

class AccountController extends Controller
{
public function index(){
    $objArticle = new Article();
        $articles = $objArticle->get();
        return view('account.index', ['articles'=> $articles]);
}
}