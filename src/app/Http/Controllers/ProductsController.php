<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 

class ProductsController extends Controller
{
    // 商品一覧
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(9);
        return view('index', compact('products'));
    }

    // 商品詳細
    public function detail($id)
    {
        $product = Product::findOrFail($id);
        return view('detail', compact('product'));
    }

    // 商品登録画面
    public function showRegister()
    {
        $categories = ['春', '夏', '秋', '冬'];
        return view('register', compact('categories'));
    }

    // 商品登録処理
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'price'       => 'required|integer',
            'category'    => 'required',
            'image'       => 'nullable|image',
            'description' => 'nullable'
        ]);

        $product = new Product();

        $product->name = $request->name;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->description = $request->description;

        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('products', 'public');
        }

        $product->save();

        return redirect()->route('products.index');
    }

    // 編集画面
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = ['春', '夏', '秋', '冬'];

        return view('edit', compact('product', 'categories'));
    }

    // 更新処理
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required',
            'price'       => 'required|integer',
            'category'    => 'required',
            'image'       => 'nullable|image',
            'description' => 'nullable',
        ]);

        $product = Product::findOrFail($id);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->description = $request->description;

        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('products', 'public');
        }

        $product->save();

        return redirect()->route('products.detail', $id);
    }

    // 検索
    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $products = Product::where('name', 'LIKE', "%{$keyword}%")
            ->orWhere('category', 'LIKE', "%{$keyword}%")
            ->get();

        return view('index', compact('products', 'keyword'));
    }

    // 削除
    public function delete($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('products.index');
    }
}