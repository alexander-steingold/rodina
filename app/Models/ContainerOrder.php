<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContainerOrder extends Model
{
    use HasFactory;

    protected $fillable = ['container_id', 'order_id'];

    public function container(): BelongsTo
    {
        return $this->belongsTo(Container::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
