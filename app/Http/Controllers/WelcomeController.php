<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index(Request $request): View|JsonResponse
    {
        $filters = $request->query('filter');
        $paginate = $request->query('paginate') ?? 6;
        $paginate = $paginate == -1 ? null : $paginate;
        
        $query = Product::query();
        
        if (!is_null($filters)) {
            if (array_key_exists('categories', $filters)) {
                $query = $query->whereIn('category_id', $filters['categories']);
            }
            if (!is_null($filters['price_min'])) {
                $query = $query->where('price', '>=', $filters['price_min']);
            }
            if (!is_null($filters['price_max'])) {
                $query = $query->where('price', '<=', $filters['price_max']);
            }

            return response()->json($query->paginate($paginate));
        }
        
        $totalProducts = Product::count();
        return view('welcome', [
            'products' => is_null($paginate) ? $query->get() : $query->paginate($paginate),
            'categories' => ProductCategory::orderBy('name', 'ASC')->get(),
            'defaultImage' => config('shop.defaultImage'),
            'isGuest' => Auth::guest(),
            'totalProducts' => $totalProducts
        ]);
    }
}