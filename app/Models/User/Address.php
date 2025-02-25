<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    // Relation with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation with city
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    
}
