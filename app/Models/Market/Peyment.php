<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Peyment extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
}
