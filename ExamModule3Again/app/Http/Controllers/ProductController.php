<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    protected $categoryModel;
    protected $productModel;

    public function __construct(Product $productModel, Category $categoryModel)
    {
        $this->productModel = $productModel;
        $this->categoryModel = $categoryModel;
    }

    public function index()
    {
        $categories = Category::all();
        $products = Product::all();

        return view('product.list', compact('categories', 'products'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('product.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $product = new Product();

        $product->category_id = $request->input('category_id');
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->active = 1;
        $product->save();
        Session::flash('success', 'Them san pham thanh cong');
        return redirect()->route('product.list');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('product.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        $product->category_id = $request->input('category_id');
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->save();
        Session::flash('success', 'Sua san pham thanh cong');
        return redirect()->route('product.list');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.list');
    }

    public function active($active)
    {
        $categories = Category::all();
        if ($active == 1) {
            $products = Product::where('active', $active)->get();

            return view('product.list', compact('categories', 'products'));
        } else {
            $products = Product::where('active', !$active)->get();

            return view('product.list', compact('categories', 'products'));
        }
    }
    public function statistic(){
        $categories = Category::all();
        return view('product.count',compact('categories'));
    }
}
