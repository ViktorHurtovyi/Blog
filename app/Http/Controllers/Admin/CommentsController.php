<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    public function index(){
        $objComments = new Comment();
        $comments = $objComments->paginate(10);
        return view('admin.comments.index', ['comments'=> $comments]);
    }
    public function deleteComments(Request $request){
        if($request->ajax()){
            $id = (int)$request-> input('id');
            $objComments = new Comment();
            $objComments->where('id', $id)->delete();
            echo "success";
        }
    }
}
