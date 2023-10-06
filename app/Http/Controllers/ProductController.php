<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpsertPostRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

use Exception;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('products.index', [
            'products' => Product::paginate(3)
        ]);
    }

      /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create',[
            'categories' => ProductCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpsertPostRequest $request): RedirectResponse
    {      
        $product = new Product($request->validated());
        if ($request->hasFile('image')) {
            $product->image_path = $request->file('image')->store('products', 'public');
        } else {
            return redirect(route('products.create'))->withErrors(['image' => 'Plik obrazu jest wymagany']);
        }
        $product->save();
        return redirect(route('products.index'))->with('status', __('shop.product.status.store.success'));
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', [
            'product'=> $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        $categories = ProductCategory::all();
        return view('products.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpsertPostRequest $request, Product $product): RedirectResponse
    {
      
        $oldImagePath = $product->image_path;
        $product->fill($request->validated());
        if ($request->hasFile('image') && request('image') !='') {
            if (Storage::disk('public')->exists($oldImagePath)) {
                Storage::disk('public')->delete($oldImagePath);
            }
            
            $product->image_path = $request->file('image')->store('products', 'public');
        
        }

        $product->save();
        return redirect(route('products.index'))->with('status', __('shop.product.status.update.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            Session::flash('status', __('shop.product.status.delete.success'));
            return response()->json([
                'status' => 'success'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Wystąpił błąd'
            ])->setStatusCode(500);
        }
    }


    /**
     * Download image of the specified resource in storage.
     *
     * @param  Product  $product
     * @return RedirectResponse|StreamedResponse
     */
    
     public function downloadImage(Product $product): RedirectResponse|StreamedResponse
     {
         if (Storage::disk('public')->exists($product->image_path)) {
             return Storage::disk('public')->download($product->image_path);
         }
         return Redirect::back();
     }
     

}