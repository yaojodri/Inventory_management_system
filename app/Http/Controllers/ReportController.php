<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Product;
use App\Models\StockMovement;
use App\Models\Supplier;
use App\Models\Category;
use Illuminate\Http\Request;
use Auth;

class ReportController extends Controller
{
    /**
     * Generate an inventory report for products.
     */
    public function generateInventoryReport(Request $request)
    {
        $user = Auth::user();
    
        // Fetch all products with their category and supplier relationships
        $products = Product::with(['category', 'supplier'])->get();
    
        // Calculate stock levels for each product
        $stockLevels = $products->map(function ($product) {
            $inward = StockMovement::where('product_id', $product->id)
                        ->where('type', 'inward')
                        ->sum('quantity');
            $outward = StockMovement::where('product_id', $product->id)
                        ->where('type', 'outward')
                        ->sum('quantity');
            $damaged = StockMovement::where('product_id', $product->id)
                        ->where('type', 'damaged')
                        ->sum('quantity');
    
            return [
                'id' => $product->id,
                'name' => $product->name,
                'stock_level' => $inward - $outward - $damaged,
            ];
        })->toArray();
    
        // Create a report record
        $report = Report::create([
            'user_id' => $user->id,
            'action' => 'Generated Inventory Report',
            'description' => 'Report showing the list of all products and their stock levels.',
        ]);
    
        // Return the report view for inventory
        return view('reports.inventory', compact('products', 'stockLevels', 'report'));
    }
    
    // /**
    //  * Generate a report for stock movements.
    //  */
    // public function generateStockMovementReport(Request $request)
    // {
    //     $user = Auth::user();

    //     // Fetch all stock movements (you can add filtering or pagination if needed)
    //     $stockMovements = StockMovement::all();

    //     // Create a report
    //     $report = Report::create([
    //         'user_id' => $user->id,
    //         'action' => 'Generated Stock Movement Report',
    //         'description' => 'Report showing the list of all stock movements.',
    //     ]);

    //     // Return the report view for stock movements
    //     return view('reports.stock_movements', compact('stockMovements', 'report'));
    // }

    // /**
    //  * Generate a report for suppliers.
    //  */
    // public function generateSupplierReport(Request $request)
    // {
    //     $user = Auth::user();

    //     // Fetch all suppliers (you can add filtering or pagination if needed)
    //     $suppliers = Supplier::all();

    //     // Create a report
    //     $report = Report::create([
    //         'user_id' => $user->id,
    //         'action' => 'Generated Supplier Report',
    //         'description' => 'Report showing the list of all suppliers.',
    //     ]);

    //     // Return the report view for suppliers
    //     return view('reports.suppliers', compact('suppliers', 'report'));
    // }

    // /**
    //  * Generate a report for categories.
    //  */
    // public function generateCategoryReport(Request $request)
    // {
    //     $user = Auth::user();

    //     // Fetch all categories (you can add filtering or pagination if needed)
    //     $categories = Category::all();

    //     // Create a report
    //     $report = Report::create([
    //         'user_id' => $user->id,
    //         'action' => 'Generated Category Report',
    //         'description' => 'Report showing the list of all categories.',
    //     ]);

    //     // Return the report view for categories
    //     return view('reports.categories', compact('categories', 'report'));
    // }
}



// class ReportController extends Controller
// {
//     /**
//      * Generate an inventory report for products.
//      */
//     public function generateInventoryReport(Request $request)
//     {
//         $user = Auth::user();

//         // Fetch all products (you can add filtering or pagination if needed)
//         $products = Product::all();

//         // Create a report
//         $report = Report::create([
//             'user_id' => $user->id,
//             'action' => 'Generated Inventory Report',
//             'description' => 'Report showing the list of all products and their stock levels.',
//         ]);

//         // Return the report view for inventory
//         return view('reports.inventory', compact('products', 'report'));
//     }

//     /**
//      * Generate a report for stock movements.
//      */
//     public function generateStockMovementReport(Request $request)
//     {
//         $user = Auth::user();

//         // Fetch all stock movements (you can add filtering or pagination if needed)
//         $stockMovements = StockMovement::all();

//         // Create a report
//         $report = Report::create([
//             'user_id' => $user->id,
//             'action' => 'Generated Stock Movement Report',
//             'description' => 'Report showing the list of all stock movements.',
//         ]);

//         // Return the report view for stock movements
//         return view('reports.stock_movements', compact('stockMovements', 'report'));
//     }

//     /**
//      * Generate a report for suppliers.
//      */
//     public function generateSupplierReport(Request $request)
//     {
//         $user = Auth::user();

//         // Fetch all suppliers (you can add filtering or pagination if needed)
//         $suppliers = Supplier::all();

//         // Create a report
//         $report = Report::create([
//             'user_id' => $user->id,
//             'action' => 'Generated Supplier Report',
//             'description' => 'Report showing the list of all suppliers.',
//         ]);

//         // Return the report view for suppliers
//         return view('reports.suppliers', compact('suppliers', 'report'));
//     }

//     /**
//      * Generate a report for categories.
//      */
//     public function generateCategoryReport(Request $request)
//     {
//         $user = Auth::user();

//         // Fetch all categories (you can add filtering or pagination if needed)
//         $categories = Category::all();

//         // Create a report
//         $report = Report::create([
//             'user_id' => $user->id,
//             'action' => 'Generated Category Report',
//             'description' => 'Report showing the list of all categories.',
//         ]);

//         // Return the report view for categories
//         return view('reports.categories', compact('categories', 'report'));
//     }
// }
