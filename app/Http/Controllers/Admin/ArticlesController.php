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
        $fullText=$request->input('full-text');
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
        $article = Article::find($id);
        if(!$article){
            return abort(404);
        }
        return view('admin.articles.edit', ['articles'=>$article]);
    }
    public function editRequestArticles(Request $request, int $id){
        try {
            $objArticle = Article::find($id);
            if(!$objArticle){
                abort(404);
            }
            $objArticle->title = $request->input('title');
            $objArticle->short_text = $request->input('short_text');
            $objArticle->full_text = $request->input('full_text');
            if ($objArticle->save()) {
                return redirect(route('articles'))->with('success', 'Статья успешно изменена');
            }
            return back()->with('error', 'Категория не изменена');
            dd($request->all());
        }catch (ValidationException $e){
            \Log::error($e->getMessage());
            return back()->with('error', '$e->getMessage()');
        }
    }
    public function deleteArticle(Request $request){
        if($request->ajax()){
            $id = (int)$request-> input('id');
            $objArticle = new Article();
            $objArticle->where('id', $id)->delete();
            echo "success";
        }
    }
}
