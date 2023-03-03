<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product; //llamar al model de product
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $datos['products'] = Product::paginate(10);

        return view('product.index', $datos);
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->quantity = $request->input('quantity');
        $product->status = $request->input('status');
        $product->seller_id = auth()->user()->id; // El ID del usuario autenticado
        $product->save();

        return redirect()->route('product.index');
    }

    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->quantity = $request->input('quantity');
        $product->status = $request->input('status');
        $product->save();

        return redirect()->route('product.index');
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index');
    }

}