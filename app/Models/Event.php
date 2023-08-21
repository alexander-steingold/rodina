<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'remarks',
        'courier_id',
        'route_id',
    ];

//    public function routes()
//    {
//        return $this->belongsToMany(Route::class)->withPivot('courier_id')->using(RouteEventCourier::class);
//    }


    public function courier()
    {
        return $this->belongsTo(Courier::class, 'courier_id');
    }

    public function route()
    {
        return $this->belongsTo(Route::class, 'route_id');
    }

    public function orderAssociations()
    {
        return $this->hasMany(OrderAssociation::class, 'event_id');
    }


    public function scopeDateRange($query, $startDate, $endDate)
    {
        return $query->whereBetween('date', [$startDate, $endDate]);
    }

    public function scopeFilter(Builder|QueryBuilder $query, array $filters)
    {

        $filterColumns = [
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

        $query->when($filters['year'] ?? null, function ($query, $year) {
            $query->whereYear('date', $year);
        });

        $query->when($filters['month'] ?? null, function ($query, $month) {
            $query->whereMonth('date', $month);
        });


        $query->when($filters['courier_id'] ?? null, function ($query, $courierId) {
            $query->where('courier_id', $courierId);
        });

        $query->when($filters['route_id'] ?? null, function ($query, $routeId) {
            $query->where('route_id', $routeId);
        });

//        $query->when($filters['courier_id'] ?? null, function ($query, $courierId) {
//            $query->whereHas('orderAssociations', function ($subQuery) use ($courierId) {
//                $subQuery->where('courier_id', $courierId);
//            });
//        });

//        $query->when($filters['route_id'] ?? null, function ($query, $routeId) {
//            $query->whereHas('orderAssociations', function ($subQuery) use ($routeId) {
//                $subQuery->where('route_id', $routeId);
//            });
//        });

    }
}
