<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContainerBarcode extends Model
{
    use HasFactory;

    protected $fillable = ['container_id', 'barcode_id'];

    public function container(): BelongsTo
    {
        return $this->belongsTo(Container::class);
    }

    public function barcode(): BelongsTo
    {
        return $this->belongsTo(Barcode::class);
    }
}
