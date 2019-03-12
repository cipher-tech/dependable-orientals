<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Job;
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Category::all();

        return view('backend.admin.categories.index', compact('categories'));

    }

    public function create(){
        return view('backend.admin.categories.create');
    }

    public function store( CategoryFormRequest $request){
        $category = new Category(array(
            'name' => $request->get('name'),
        ));

        $category->save();

        return redirect('/admin/category/create')->with('status', "Category created successfully");
    }

    public function delete($id){
        $category = Category::whereId($id)->firstOrFail();

        if(Auth::user()->role == 'admin'){
            $category->delete();
            return redirect('/admin/category')->with('status', "Category deleted successfully");
        }else{
            return redirect('/admin/category')->with('status', "Unable to delete Category. Must be admin");

        }
    }


}
