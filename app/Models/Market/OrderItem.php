<?php

namespace App\Models\Market;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    // Relation with users table
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Realtion with orders table
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Reltaion with products table
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
