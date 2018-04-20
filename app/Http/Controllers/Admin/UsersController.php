<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

    class UsersController extends Controller
    {
        public function index(){
            $objUsers = new Users();
            $users = $objUsers->paginate(10);
            return view('admin.users.index', ['users'=> $users]);
        }
        public function deleteUser(Request $request){
            if($request->ajax()){
                $id = (int)$request-> input('id');
                $objUsers = new Users();
                $objUsers->where('id', $id)->delete();
                echo "success";
            }
        }
    }
