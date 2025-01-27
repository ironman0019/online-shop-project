<?php

namespace App\Models\Ticket;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TicketAdmin extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    // Relation with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
