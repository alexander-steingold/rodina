<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Barcode extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'barcode'];
//
//    public static $rules = [
//        'barcode' => 'required',
//    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function containerBarcodes(): HasMany
    {
        return $this->hasMany(ContainerBarcode::class);
    }

    public function scopeLegal(Builder $query)
    {
        $query->whereDoesntHave('containerBarcodes');
    }
}
