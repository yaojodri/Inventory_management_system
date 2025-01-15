<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Stockmovement;
use App\Models\Category;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Fetch inventory-related data
        $products = Product::all();  // Fetch all products
        $suppliers = Supplier::all(); // Fetch all suppliers
        $stockmovements = Stockmovement::latest()->take(5)->get(); // Get latest 5 stock movements
        $categories = Category::all(); // Fetch all categories

        // You can also calculate total inventory value, stock quantities, etc.
        $totalStockValue = $products->sum('price'); // Example to calculate total stock value

        return view('dashboard', compact(
            'products', 
            'suppliers', 
            'stockmovements', 
            'categories',
            'totalStockValue' // Optional, just an example of additional info to show
        ));
    }
}
