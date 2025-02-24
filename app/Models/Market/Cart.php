<?php

namespace App\Models\Market;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    // Relation with cart items
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    // Realtion with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation with coupan
    public function coupan()
    {
        return $this->belongsTo(Coupan::class);
    }

}
