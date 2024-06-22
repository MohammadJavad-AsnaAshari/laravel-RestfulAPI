<?php

namespace App\Models;

use App\Enums\Product\ProductStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property string $description
 * @property int $quantity
 * @property string|ProductStatus $status
 * @property string $image
 * @property int|Seller $seller_id
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'status',
        'image',
        'seller_id'
    ];

    public function isAvailable(): bool
    {
        return $this->status = ProductStatus::AVAILABLE_PRODUCT->value;
    }
}
