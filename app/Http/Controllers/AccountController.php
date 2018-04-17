<?php


namespace App\Http\Controllers;

use App\Entities\Article;
use App\Entities\Comment;
use App\Http\Requests\CommentsRequest;

class AccountController extends Controller
{
public function index(){
    $objArticle = new Article();
        $articles = $objArticle->paginate(5);
        return view('account.index', ['articles'=> $articles]);
}
    public function full($id){
        $objArticle = new Article();
        $articles = $objArticle->where('id', $id)->get();
        return view('account.full', ['articles'=> $articles]);
    }
    public function comment(CommentsRequest $request, $id){
        $ObjComment = new Comment();
        $ObjComment = $ObjComment->create([
            'articleId' => $id,
            'name' => $request->input('name'),
            'text' => $request->input('comment')
        ]);
        if ($ObjComment){
            return back();
        }
    }
    public function author($author){
        $objArticle = new Article();
        $articles = $objArticle->where('author', $author)->get();
        return view('account.author', ['articles'=> $articles]);
    }
    public function category($id){
        $objArticle = new Article();
        $articles = $objArticle->where('id', $id)->get();
        return view('account.author', ['articles'=> $articles]);
    }
}