<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] =  "List of products";
        $viewData["products"] = Product::all();
        return view('product.index')->with("viewData", $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $product = Product::with('comments')->findOrFail($id);
        $viewData["title"] = $product["name"]." - Online Store";
        $viewData["subtitle"] =  $product["name"]." - Product information";
        $viewData["product"] = $product;
        return view('product.show')->with("viewData", $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData["title"] = "Create product";

        return view('product.create')->with("viewData", $viewData);
    }

    public function save(Request $request)
    {
        $productData = $request->validate([
            "name" => "required",
            "price" => "required|numeric|min:0",
            "description" => "nullable|string",
        ]);

        Product::create($productData);

        return redirect()->route('product.index');
    }

    public function edit(string $id): View
    {
        $viewData = [
            "title" => "Edit product",
            "product" => Product::findOrFail($id),
        ];

        return view('product.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, string $id)
    {
        $productData = $request->validate([
            "name" => "required",
            "price" => "required|numeric|min:0",
            "description" => "nullable|string",
        ]);

        Product::findOrFail($id)->update($productData);

        return redirect()->route('product.show', ['id' => $id]);
    }

    public function destroy(string $id)
    {
        Product::findOrFail($id)->delete();

        return redirect()->route('product.index');
    }
}
