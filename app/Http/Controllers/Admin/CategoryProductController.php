<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryProductController extends Controller
{
    public function categories($idProduct)
    {
        if (!$product = Product::where('id', $idProduct)->first()) {
            return redirect()->back();
        }

        $categories = $product->categories()->paginate();

        return view('admin.pages.products.categories.categories', compact('product', 'categories'));
    }

    public function products($id)
    {
        if (!$category = Category::find($id)) {
            return redirect()->back();
        }

        $products = $category->products()->paginate();

        return view('admin.pages.categories.products.products', compact('category', 'products'));
    }

    public function categoriesAvailable(Request $request, $idProduct)
    {
        if (!$product = Product::where('id', $idProduct)->first()) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $categories = $product->categoriesAvailable($request->filter);

        return view('admin.pages.products.categories.available', compact('product', 'categories', 'filters'));
    }

    public function attachCategoriesProduct(Request $request, $idProduct)
    {
        if (!$product = Product::where('id', $idProduct)->first()) {
            return redirect()->back();
        }

        if (!$request->categories || count($request->categories) == 0) {
            return redirect()->back()
                ->with('error', 'Escolha pelo menos uma perfil para vincular.');
        }

        $product->categories()->attach($request->categories);

        return redirect()->route('products.categories', $product->id);
    }

    public function detachCategoriesAvailable($idProduct, $idCategory)
    {
        $product = Product::where('id', $idProduct)->first();
        $category = Category::find($idCategory);

        if (!$product || !$category) {
            return redirect()->back();
        }

        $product->categories()->detach($category);

        return redirect()->back();
    }
}
