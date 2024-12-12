<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
}
