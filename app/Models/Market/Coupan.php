<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupan extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    public function isValid()
    {
        return $this->status == 1 && now()->between($this->start_date, $this->end_date);
    }
}
