<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Article;
use App\Entities\Category;
use App\Entities\CategoryArticle;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function index(){
        $objArticle = new Article();
        $articles = $objArticle->get();
        return view('admin.articles.index', ['articles'=> $articles]);
    }
    public function addArticle(){
        $objcategory = new Category();
        $categories = $objcategory->get();

        return view('admin.articles.add', ['categories'=>$categories]);
    }
    public function addRequestArticle(ArticleRequest $request){
        $objArticle = new Article();
        $objCategoryArticle = new CategoryArticle();
        $fullText=$request->input('full-text') ?? null;
        $objArticle = $objArticle->create([
            'title' => $request->input('title'),
            'short_text' => $request->input('short-text'),
            'full_text' => $fullText,
            'author' =>$request->input('author')
        ]);
        if ($objArticle){
        foreach ($request->input('categories') as $category_id){
            $category_id = (int)$category_id;
            $objCategoryArticle = $objCategoryArticle->create([
               'category_id' => $category_id,
                'articles_id' => $objArticle->id
            ]);
        }
        return redirect()->route('articles')->with('success', 'Статья добавлена успешно');
        }
        return back()->with('error', 'Не удалось добавить статью');
    }
    public function editArticle(int $id){

    }
    public function deleteArticle(Request $request){

    }
}
