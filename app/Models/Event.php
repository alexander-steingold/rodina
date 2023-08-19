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
        'date'
    ];

    public function routes()
    {
        return $this->belongsToMany(Route::class)->withPivot('courier_id')->using(RouteEventCourier::class);
    }

    public function orderAssociations()
    {
        return $this->hasMany(OrderAssociation::class, 'event_id');
    }

    public function scopeFilter(Builder|QueryBuilder $query, array $filters)
    {
        // dd($filters);
        // logger('info', [$filters]);
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

//        $query->when($filters['date_range'] ?? null, function ($query, $dateRange) {
//            $dates = explode(__('general.to'), $dateRange);
//            if (count($dates) === 2) {
//                [$startDate, $endDate] = $dates;
//                $query->whereDate('created_at', '>=', $startDate)
//                    ->whereDate('created_at', '<=', $endDate);
//            }
//        });


//        $query->when($filters['search'] ?? null, function ($query, $search) {
//            $query->where(function ($query) use ($search) {
//                $query->where('first_name', 'like', '%' . $search . '%')
//                    ->orWhere('last_name', 'like', '%' . $search . '%')
//                    ->orWhere('address', 'like', '%' . $search . '%')
//                    ->orWhere('email', 'like', '%' . $search . '%')
//                    ->orWhere('phone', 'like', '%' . $search . '%')
//                    ->orWhere('mobile', 'like', '%' . $search . '%')
//                    ->orWhere('oid', 'like', '%' . $search . '%')
//                    ->orWhere('created_at', 'like', '%' . $search . '%')
//                    ->orWhere('barcode', 'like', '%' . $search . '%')
//                    ->orWhere('remarks', 'like', '%' . $search . '%')
//                    ->orWhereHas('customer', function ($query) use ($search) {
//                        $query->where('first_name', 'like', '%' . $search . '%')
//                            ->orWhere('last_name', 'like', '%' . $search . '%')
//                            ->orWhere('address', 'like', '%' . $search . '%');
//                    });
//
//
//            });
//        });

    }
}
