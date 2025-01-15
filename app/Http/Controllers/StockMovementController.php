<?php
namespace App\Http\Controllers;

use App\Models\Stockmovement;
use App\Models\Product;
use Illuminate\Http\Request;

class StockMovementController extends Controller
{
    /**
     * Display a listing of stock movements.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $stockmovements = Stockmovement::with('product')->get();
        return view('stockmovements.index', compact('stockmovements'));
    }

    /**
     * Show the form for creating a new stock movement.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $products = Product::all();
        return view('stockmovements.create', compact('products'));
    }

    /**
     * Store a newly created stock movement in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'type' => 'required|in:inward,outward,damaged',
            'description' => 'nullable|string|max:255',
        ]);
    
        $product = Product::findOrFail($request->product_id);
    
        if ($request->type === 'outward' && $request->quantity > $product->quantity) {
            return redirect()->back()->with('error', 'Outward quantity cannot exceed available stock.');
        }
    
        if ($request->type === 'inward') {
            $product->quantity += $request->quantity; // Increase stock for inward
        } elseif ($request->type === 'outward') {
            $product->quantity -= $request->quantity; // Decrease stock for outward
        }
    
        $product->save();
    
        Stockmovement::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'type' => $request->type,
            'description' => $request->description,
            'performed_by' => auth()->id(),
        ]);
    
        return redirect()->route('stockmovements.index')->with('success', 'Stock movement recorded successfully.');
    }
    
    public function show(Stockmovement $stockmovement)
    {
        return view('stockmovements.show', compact('stockmovement'));
    }
    /**
     * Show the form for editing the specified stock movement.
     *
     * @param  \App\Models\Stockmovement  $stockmovement
     * @return \Illuminate\View\View
     */
    public function edit(Stockmovement $stockmovement)
    {
        // if (!$stockMovement->exists) {
        //     abort(404, 'Stock Movement not found.');
        // }
    
        $products = Product::all();
        return view('stockmovements.edit', compact('stockmovement', 'products'));
    }
    
    /**
     * Update the specified stock movement in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stockmovement  $stockmovement
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Stockmovement $stockmovement)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'type' => 'required|in:inward,outward,damaged',
            'description' => 'nullable|string|max:255',
        ]);
    
        $product = Product::findOrFail($request->product_id);
    
        // Revert the previous stock movement's effect
        if ($stockmovement->type === 'inward') {
            $product->quantity -= $stockmovement->quantity;
        } elseif ($stockmovement->type === 'outward') {
            $product->quantity += $stockmovement->quantity;
        }
    
        // Apply the new stock movement's effect
        if ($request->type === 'outward' && $request->quantity > $product->quantity) {
            return redirect()->back()->with('error', 'Outward quantity cannot exceed available stock.');
        }
    
        if ($request->type === 'inward') {
            $product->quantity += $request->quantity;
        } elseif ($request->type === 'outward') {
            $product->quantity -= $request->quantity;
        }
    
        $product->save();
    
        $stockmovement->update([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'type' => $request->type,
            'description' => $request->description,
            'performed_by' => auth()->id(),
        ]);
    
        return redirect()->route('stockmovements.index')->with('success', 'Stock movement updated successfully.');
    }
    
    /**
     * Remove the specified stock movement from storage.
     *
     * @param  \App\Models\StockMovement  $stockmovement
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Stockmovement $stockmovement)
    {
        $stockmovement->delete();

        return redirect()->route('stockmovements.index')->with('success', 'Stock movement deleted successfully.');
    }
}
