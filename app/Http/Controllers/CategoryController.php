<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    private $category;
    public function __construct(Category $category){
        $this->category = $category;
    }

    public function index(){
        $categories = $this->category->get();
        return view('categories.index', ['categories' => $categories]);
    }

    public function store(Request $request){
        $validatedData = $request->validate(
            ['name' => 'required|min:3'],
            [
                'name.required' => 'Không được để trống tên danh mục !!!',
                'name.min' => 'Tên danh mục tối thiểu phải dài 3 ký tự !!!',
            ]
        );

        $category = $this->category;
        $category['name'] = $request->input('name');
        $category['description'] = $request->input('description');
        $category->save();
        return redirect('/categories');
    }
}
