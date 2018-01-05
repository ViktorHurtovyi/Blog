<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Category;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index(){
        $objcategory = new Category();
        $categories = $objcategory->get();

        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function addCategory(){
        return view('admin.categories.add');
    }

    public function requestCategory(Request $request){
        try {
            $this->validate($request, [
                'title'=> 'required|string|min:4|max:25'
            ]);
            $objCategory = new Category();
            $objCategory = $objCategory->create([
                'title' => $request->input('title'),
                'descriptions' => $request->input('descriptions')
            ]);
            if ($objCategory) {
                return back()->with('success', 'Категория успешно добавлена');
            }
            return back()->with('error', 'Категория не добавлена');
            dd($request->all());
        }catch (ValidationException $e){
        \Log::error($e->getMessage());
            return back()->with('error', '$e->getMessage()');
        }
    }

    public function editCategory(int $id){
        $category = Category::find($id);
        if(!$category){
            return abort(404);
        }
        return view('admin.categories.edit', ['category'=>$category]);

    }
    public function editRequestCategory(Request $request, int $id){
        try {
            $this->validate($request, [
                'title'=> 'required|string|min:4|max:25'
            ]);
            $objCategory = Category::find($id);
            if(!$objCategory){
                abort(404);
            }
            $objCategory->title = $request->input('title');
            $objCategory->descriptions = $request->input('descriptions');
            if ($objCategory->save()) {
                return redirect(route('categories'))->with('success', 'Категория успешно изменена');
            }
            return back()->with('error', 'Категория не изменена');
            dd($request->all());
        }catch (ValidationException $e){
            \Log::error($e->getMessage());
            return back()->with('error', '$e->getMessage()');
        }
    }

    public function deleteCategory(Request $request){
        if($request->ajax()){
            $id = (int)$request-> input('id');
            $objCategory = new Category();
            $objCategory->where('id', $id)->delete();
            echo "success";
        }
    }
}
