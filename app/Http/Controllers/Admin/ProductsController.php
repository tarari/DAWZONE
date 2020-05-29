<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.products.index', [
            'products' => $products,
        ]);
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();

        return view('admin.products.create', [
            'brands' => $brands,
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input = $request->validate([
            'titulo' => 'required',
            'imagen' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'marca' => 'required',
            'categoria' => 'required'
        ]);

        if ($request->hasFile('imagen')){
            $imagen = $request->file('imagen');
            $nombreImagen = time().$imagen->getClientOriginalName();
            $imagen->move(public_path() . '/img/products/' , $nombreImagen);
            $input['imagen'] = $nombreImagen;
        }

        $data = [
            'title' => $input['titulo'],
            'image'  => $input['imagen'],
            'description'  => $input['descripcion'],
            'last_price' => $input['precio'],
            'price'  => $input['precio'],
            'brand_id' => $input['marca'],
            'category_id' => $input['categoria']
        ];

        $product = Product::create($data);

        return redirect()->route('admin.products.index');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $brands = Brand::all();
        $categories = Category::all();

        return view('admin.products.edit', [
            'product' => $product,
            'brands' => $brands,
            'categories' => $categories
        ]);
    }

    public function update($id, Request $request)
    {
        $product = Product::find($id);
        $product->update(['last_price' => $product->price]);

        $input = $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'marca' => 'required',
            'categoria' => 'required'
        ]);

        if ($request->hasFile('imagen')){
            $imagen = $request->file('imagen');
            $nombreImagen = time().$imagen->getClientOriginalName();
            $imagen->move(public_path() . '/img/products/' , $nombreImagen);
            $input['imagen'] = $nombreImagen;

            $data = [
                'title' => $input['titulo'],
                'image'  => $input['imagen'],
                'description'  => $input['descripcion'],
                'price'  => $input['precio'],
                'brand_id' => $input['marca'],
                'category_id' => $input['categoria']
            ];

        } else {
            $data = [
                'title' => $input['titulo'],
                'description'  => $input['descripcion'],
                'price'  => $input['precio'],
                'brand_id' => $input['marca'],
                'category_id' => $input['categoria']
            ];
        }

        $product->update($data);
        return redirect()->route('admin.products.index');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('admin.products.index');
    }
}