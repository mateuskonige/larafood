<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreUpdateProduct;

class ProductController extends Controller
{
    public function __construct(Product $product){
        $this->middleware('can:products');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate();
        return view('admin.pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProduct  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProduct $request)
    {
        $data = $request->all();

        $tenant = auth()->user()->tenant;

        if($request->hasFile('image') && $request->image->isValid()) {
            $data['image'] = $request->image->store("tenants/{$tenant->uuid}/products");
        }

        Product::create($data);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.pages.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.pages.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateProduct  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProduct $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->all();

        $tenant = auth()->user()->tenant;

        if ($request->hasFile('image') && $request->image->isValid()) {

            if (Storage::exists($product->image)) {
                Storage::delete($product->image);
            }

            $data['image'] = $request->image->store("tenants/{$tenant->uuid}/products");
        }

        $product->update($data);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if (Storage::exists($product->image)) {
            Storage::delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $products = Product::where('title', 'LIKE', "%{$request->filter}%")
            ->orWhere('description', 'LIKE', "%{$request->filter}%")
            ->latest()
            ->paginate(1);

        return view('admin.pages.products.index', compact('products', 'filters'));
    }
}
