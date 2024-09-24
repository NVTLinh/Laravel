<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{
    //
    private $product;

    public function __construct(Product $product){
        $this->product = $product;
    }

    public function index(Request $request){
        $query = $this->product->query();
        $search = $request->get('search');
        $category_id = $request->get('category_id');
        $brand_id = $request->get('brand_id');

        if ($search) {
            $query = $query->where('name', 'like', '%'.$search.'%')
            ->orwhere('description', 'like', '%'.$search.'%');
        }
        if($category_id){
            $query = $query->where('category_id', $category_id);
        }
        if($brand_id){
            $query = $query->where('brand_id', $brand_id);
        }

        $products = $query->get();
        $categories = Category::all();
        $brands = Brand::all();
        return view('products.index', [
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
            'category_id' => $category_id,
            'brand_id' => $brand_id,
        ]);
    }

    public function createForm(Request $request){
        $brand = new Brand();
        $category = new Category();

        $products = $this->product->get();
        $categories = $category->get();
        $brands = $brand->get();
        return view('products.create', [
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate(
            [
                'name' => 'required|min:3',
                'description' => 'required|min:10|max:255',
                'brand_id' => 'required|exists:brands,id',
                'category_id' => 'required|exists:categories,id',
                'price' => 'numeric|gt:0',
                'sale_price' => 'numeric|gt:0',
            ],
            [
                'name.required' => 'Không được bỏ trống tên sản phẩm !!!',
            ]
        );

        $product = $this->product;
        $product['name'] = $request->input('name');
        $product['description'] = $request->input('description');
        $product['brand_id'] = $request->input('brand_id');
        $product['category_id'] = $request->input('category_id');
        $product['price'] = $request->input('price');
        $product['sale_price'] = $request->input('sale_price');

        $product->save();
        return redirect('/products');
    }

    public function detail($id){
        $product = $this->product->findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('products.update', [
            'product' => $product,
            'categories' => $categories,
            'brands' => $brands,
            'productID' => $id,
        ]);
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate(
            [
                'name' => 'required|min:3',
                'description' => 'required|min:10|max:255',
                'brand_id' => 'required|exists:brands,id',
                'category_id' => 'required|exists:categories,id',
                'price' => 'numeric|gt:0',
                'sale_price' => 'numeric|gt:0',
            ],
            [
                'name.required' => 'Không được bỏ trống tên sản phẩm !!!',
            ]
        );

        $product = $this->product->findOrFail($id);
        $product['name'] = $request->input('name');
        $product['description'] = $request->input('description');
        $product['brand_id'] = $request->input('brand_id');
        $product['category_id'] = $request->input('category_id');
        $product['price'] = $request->input('price');
        $product['sale_price'] = $request->input('sale_price');

        $product->save();
        return redirect('/products');
    }

    public function destroy($id){
        $product = $this->product->findOrFail($id);
        $product->delete();
        return redirect('/products');
    }
}
