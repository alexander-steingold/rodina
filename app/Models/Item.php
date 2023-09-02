<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Carbon\Carbon;

class Item extends Model
{
    use HasFactory;

    public static array $type = ['house', 'apartment', 'land', 'commercial', 'garage', 'lot'];
    public static array $target = ['sale', 'rent'];
    public static array $features = [
        'air_condition',
        'balcony',
        'free_parking',
        'central_heating',
        'window_covering',
        'security',
        'gym',
        'alarm',
        'garage',
        'swimming_pool',
        'laundry_room',
        'wifi'
    ];
    protected $fillable = [
        'title',
        'description',
        'type',
        'target',
        'year_built',
        'price',
        'bedrooms',
        'bathrooms',
        'area',
        'city',
        'address',
        'contact_name',
        'contact_email',
        'contact_phone',
        'available_from',
        'status',
        'air_condition',
        'free_parking',
        'central_heating',
        'window_covering',
        'security',
        'gym',
        'alarm',
        'garage',
        'swimming_pool',
        'laundry_room',
        'wifi',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(File::class);
    }

    public function firstImage(): HasOne
    {
        return $this->hasOne(File::class)->orderBy('id', 'asc');
    }

    public function scopeActive(Builder|QueryBuilder $query)
    {
        $query->where('status', '=', '1');
    }


    public function scopeFilter(Builder|QueryBuilder $query, array $filters)
    {
        $filterColumns = [
            'bedrooms' => '=',
            'bathrooms' => '=',
            'type' => '=',
            'target' => '=',
            'area' => '>=',
            'price' => '<=',
            'available' => function ($query, $available) {
                $startDate = $available == '-1' ? Carbon::now() : Carbon::now()->addMonths($available - 1);
                $query->where('available_from', '>=', $startDate);
            },
            'building' => function ($query, $building) {
                $currentYear = Carbon::now()->year;
                $lowerBound = $currentYear - $building;
                $query->whereBetween('year_built', [$lowerBound, $currentYear]);
            }
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
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('city', 'like', '%' . $search . '%')
                    ->orWhere('address', 'like', '%' . $search . '%')
                    ->orWhere('contact_name', 'like', '%' . $search . '%');
            });
        });

        foreach (self::$features as $feature) {
            $query->when($filters[$feature] ?? null, function ($query) use ($feature) {
                $query->where($feature, '=', 1);
            });
        }
    }

}
