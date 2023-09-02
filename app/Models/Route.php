<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Route extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'title', 'description'];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class)->orderBy('date', 'asc');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function trackers(): HasMany
    {
        return $this->hasMany(Tracker::class);
    }

    public function orderAssociations()
    {
        return $this->hasMany(OrderAssociation::class);
    }

    public function scopeFilter(Builder|QueryBuilder $query, array $filters)
    {
        $filterColumns = [
//            'status' => '=',
//            'city_id' => '=',

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

        $query->when(isset($filters['orders_count']), function ($query) use ($filters) {
            $count = $filters['orders_count'];
            $query->having('orders_count', '=', $count);
        });

        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('number', 'like', '%' . $search . '%')
                    ->orWhere('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        });

//        foreach (self::$features as $feature) {
//            $query->when($filters[$feature] ?? null, function ($query) use ($feature) {
//                $query->where($feature, '=', 1);
//            });
//        }
    }
}
