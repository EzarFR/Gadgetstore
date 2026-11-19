<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Total data
        $totalProducts = Product::count();
        $totalCategories = Category::count();

        // Total stok
        $totalStock = (int) Product::sum('stock');

        // Produk dengan stok rendah
        $lowStockProducts = Product::where('stock', '<=', 5)->count();

        // Total nilai inventaris
        $inventoryValue = (float) Product::selectRaw(
            'COALESCE(SUM(price * stock), 0) as total'
        )->value('total');

        // Statistik kategori
        $categoryStats = Category::query()
            ->leftJoin('products', 'categories.id', '=', 'products.category_id')
            ->select(
                'categories.name',
                DB::raw('COUNT(products.id) as product_count'),
                DB::raw('COALESCE(SUM(products.stock), 0) as stock_total')
            )
            ->groupBy('categories.id', 'categories.name')
            ->orderBy('categories.name')
            ->get();

        // Status stok
        $stockStatus = [
            Product::where('stock', '<=', 5)->count(),
            Product::whereBetween('stock', [6, 20])->count(),
            Product::where('stock', '>', 20)->count(),
        ];

        // Produk terbaru
        $latestProducts = Product::with('category')
            ->latest()
            ->take(5)
            ->get();

        // Tampilkan dashboard
        return view('dashboard', compact(
            'totalProducts',
            'totalCategories',
            'totalStock',
            'lowStockProducts',
            'inventoryValue',
            'categoryStats',
            'stockStatus',
            'latestProducts'
        ));
    }
}
