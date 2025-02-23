<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartItem extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    // Relation with cart
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    // Relation with product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
