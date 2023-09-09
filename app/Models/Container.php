<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Container extends Model
{
    use HasFactory;

    protected $fillable = [
        'cid',
        'company',
        'order_date',
        'departure_date',
        'arrival_date',
        'remarks',
        'weight',
        'country_id',
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(ContainerOrder::class);
    }

    public function trackers(): HasMany
    {
        return $this->hasMany(Tracker::class);
    }

    public function scopeFilter(Builder|QueryBuilder $query, array $filters)
    {
        $filterColumns = [
            'country_id' => '=',
        ];
        foreach ($filterColumns as $filter => $operator) {
            $value = $filters[$filter] ?? null;
            $query->when($value, function ($query) use ($filter, $operator, $value) {
                if (is_callable($operator)) {
                    $operator($query, $value);
                } else {
                    $query->where($filter, $operator, $value);
                }
            });
        }


        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('company', 'like', '%' . $search . '%')
                    ->orWhere('remarks', 'like', '%' . $search . '%')
                    ->orWhere('cid', 'like', '%' . $search . '%')
                    ->orWhere('remarks', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['barcode_id'] ?? null, function ($query, $barcodeId) {
            $query->whereHas('orders', function ($subQuery) use ($barcodeId) {
                $subQuery->where('order_id', $barcodeId);
            });
        });

        $query->when($filters['date_range'] ?? null, function ($query, $dateRange) {
            $dates = explode(__('general.to'), $dateRange);
            if (count($dates) === 2) {
                [$startDate, $endDate] = $dates;
                $query->where(function ($query) use ($startDate, $endDate) {
                    $query->whereDate('order_date', '>=', $startDate)
                        ->whereDate('order_date', '<=', $endDate)
                        ->orWhere(function ($query) use ($startDate, $endDate) {
                            $query->whereDate('departure_date', '>=', $startDate)
                                ->whereDate('departure_date', '<=', $endDate);
                        })
                        ->orWhere(function ($query) use ($startDate, $endDate) {
                            $query->whereDate('arrival_date', '>=', $startDate)
                                ->whereDate('arrival_date', '<=', $endDate);
                        });
                });
            }
        });

    }
}
