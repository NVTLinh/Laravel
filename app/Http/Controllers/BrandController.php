<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    //
    private $brand;
    public function __construct(Brand $brand){
        $this->brand = $brand;
    }

    public function index(){
        $brands = $this->brand->get();
        return view('brands.index', ['brands' => $brands]);
    }

    public function store(Request $request){
        $validatedData = $request->validate(
            ['name' => 'required|min:3'],
            [
                'name.required' => 'Không được để trống tên thương hiệu !!!',
                'name.min' => 'Tên thượng hiệu tối thiểu phải dài 3 ký tự !!!',
            ]
        );

        $brand = $this->brand;
        $brand['name'] = $request->input('name');
        $brand['description'] = $request->input('description');
        $brand->save();
        return redirect('/brands');
    }
}
