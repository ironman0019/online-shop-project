<?php

namespace App\Models\Ticket;

use App\Models\User;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $guarded = ['id'];

    protected $cascadeDeletes = ['children'];

    // Relation with ticket admin
    public function admin()
    {
        return $this->belongsTo(TicketAdmin::class, 'reference_id');
    }

    // Relation with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation with ticket category
    public function category()
    {
        return $this->belongsTo(TicketCategory::class, 'category_id');
    }

    // Relation with self:parent
    public function parent()
    {
        return $this->belongsTo($this, 'parent_id');
    }

    // Relation with self:children
    public function children()
    {
        return $this->hasMany($this, 'parent_id');
    }

    // Relation with ticket file
    public function ticketFile()
    {
        return $this->hasOne(TicketFile::class);
    }
}
