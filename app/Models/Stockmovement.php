<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'product_id',
        'quantity',
        'type',
        'description',
        'performed_by',  // Make sure performed_by is fillable
    ];

    // Relationship with the Product model
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
