<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id', 'supplier_id', 'quantity', 'price', 'description'];

    // Relationship: A product belongs to a category.
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relationship: A product belongs to a supplier.
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    // Relationship: A product may have many stock movements.
    public function stockMovements()
    {
        return $this->hasMany(StockMovement::class);
    }
}

