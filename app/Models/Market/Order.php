<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];


    // Relation with order items table
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Sort based on status filter
    public function scopeFilter($query, array $filters)
    {
        if($filters['status'] ?? false) {
            $query->where('order_status', request('status'));
        }
    }


    // Get status
    public function getStatusLabelAttribute()
    {
        $statuses = [
            0 => 'در انتظار پرداخت',
            1 => 'در حال پردازش',
            2 => 'نحویل شده',
            3 => 'لغو شده',
            4 => 'مرجوعی',
        ];

        return $statuses[$this->order_status] ?? 'Unknown';
    }


}
