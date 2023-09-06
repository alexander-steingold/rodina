<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'status'];

    public function trackers(): HasMany
    {
        return $this->hasMany(Tracker::class);
    }

    public function scopeFilter(Builder|QueryBuilder $query, array $filters)
    {

        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('phone', 'like', '%' . $search . '%');
            });
        });

    }
}
