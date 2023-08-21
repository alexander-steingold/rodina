<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderAssociation extends Model
{
    protected $table = 'order_associations';
    protected $fillable = [
        'event_id',
        'route_id',
        'courier_id',
        'order_id'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function courier()
    {
        return $this->belongsTo(Courier::class, 'courier_id');
    }

    public function route()
    {
        return $this->belongsTo(Route::class, 'route_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
