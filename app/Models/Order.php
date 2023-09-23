<?php

namespace App\Models;

use App\Enums\OrderStatuses;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'oid',
        'first_name',
        'last_name',
        'city',
        'address',
        'email',
        'phone',
        'mobile',
        'box_price',
        'payment',
        'price',
        'discount',
        'total_payment',
        'remarks',
        'content',
        'country_id',
        'customer_id',
        'weight_kg',
        'weight_gr',
        'barcode',
    ];

    public static function getAllOrders()
    {
        $result = Order::get()->toArray();
        return $result;
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }


    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);

    }

    public function route(): BelongsTo
    {
        return $this->belongsTo(Route::class);
    }

    public function files(): HasMany
    {
        return $this->hasMany(File::class);
    }

    public function statuses(): HasMany
    {
        return $this->hasMany(OrderStatus::class);
    }

    public function trackers(): HasMany
    {
        return $this->hasMany(Tracker::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function barcodes(): HasMany
    {
        return $this->hasMany(Barcode::class);
    }


    public function container(): hasOne
    {
        return $this->hasOne(ContainerOrder::class);
    }

    public function scopeUnused(Builder $query)
    {
        $query->whereDoesntHave('container');
    }

    public function associations()
    {
        return $this->hasMany(OrderAssociation::class, 'order_id');
    }

    public function currentStatus(): HasOne
    {
        return $this->hasOne(OrderStatus::class)->orderBy('id', 'desc');
    }

    public function scopeLastOrder(Builder|QueryBuilder $query)
    {
        $query->orderByDesc('created_at')->limit(1);
    }


    public function scopeCall(Builder|QueryBuilder $query)
    {
        $query->whereHas('currentStatus', function ($query) {
            $query->where('status', '=', 'call');
        });
    }

    public function scopeLegal(Builder|QueryBuilder $query)
    {
        $unlegalStatuses = [
            OrderStatuses::PICKUP,
            OrderStatuses::ARRIVED,
            OrderStatuses::ABSORBED,
            OrderStatuses::WAITING,
            OrderStatuses::PACKAGED,
            OrderStatuses::TAXES,
            OrderStatuses::TRANSFER,
            OrderStatuses::TAXES_DESTINATION,
            OrderStatuses::ARRIVED_DESTINATION,
            OrderStatuses::DELIVERED,
        ];

        $query->where(function ($query) {
            $query->whereHas('currentStatus', function ($query) {
                $query->where('status', '=', 'call');
            })->orWhere(function ($query) {
                $query->whereHas('currentStatus', function ($query) {
                    $query->where('status', '=', 'supply');
                });
            });
        })->whereDoesntHave('currentStatus', function ($query) use ($unlegalStatuses) {
            $query->whereIn('status', $unlegalStatuses);
        })->whereNotExists(function ($query) {
            $query->selectRaw(1)
                ->from('order_associations')
                ->whereRaw('order_associations.order_id = orders.id');
        })->with('currentStatus'); // Include the relationship in all cases
    }


//    public function scopeFilter(Builder|QueryBuilder $query, array $filters)
//    {
//
//        // logger('info', [$filters]);
//        $filterColumns = [
//            'total_payment' => '>=',
//            'courier_id' => '=',
//        ];
//
//        $query->when($filters['status'] ?? null, function ($query, $status) {
//            $query->whereHas('currentStatus', function ($query) use ($status) {
//                $query->where('status', '=', $status);
//            });
//        });
//
//        foreach ($filterColumns as $filter => $operator) {
//            $value = $filters[$filter] ?? null;
//            $query->when($value, function ($query) use ($filter, $operator, $value) {
//                if (is_callable($operator)) {
//                    $operator($query, $value);
//                } else {
//                    $query->where($filter, $operator, $value);
//                }
//            });
//        }
//
//        $query->when($filters['date_range'] ?? null, function ($query, $dateRange) {
//            $dates = explode(__('general.to'), $dateRange);
//            if (count($dates) === 2) {
//                [$startDate, $endDate] = $dates;
//                $query->whereDate('created_at', '>=', $startDate)
//                    ->whereDate('created_at', '<=', $endDate);
//            }
//        });
//
//        $currentYear = Carbon::now()->year;
//        $query->when($filters['months'] ?? null, function ($query, $months) use ($currentYear) {
//            $query->where(function ($query) use ($months, $currentYear) {
//                foreach ($months as $month) {
//                    $query->orWhere(function ($query) use ($month, $currentYear) {
//                        $query->whereMonth('created_at', $month)
//                            ->whereYear('created_at', $currentYear);
//                    });
//                }
//            });
//        });
//
//
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
//
//    }

    public function scopeFilter(Builder|QueryBuilder $query, array $filters)
    {
        // Define filter columns and their corresponding operators
        $filterColumns = [
            'total_payment' => '>=',
            'courier_id' => '=',
        ];

        // Apply the "status" filter if it is provided
        if (isset($filters['status'])) {
            $status = $filters['status'];

            $query->join('order_statuses as latest_statuses', function ($join) use ($status) {
                $join->on('orders.id', '=', 'latest_statuses.order_id')
                    ->where('latest_statuses.status', '=', $status)
                    ->whereRaw('latest_statuses.id = (SELECT MAX(id) FROM order_statuses WHERE order_id = orders.id)');
            });
        }

        // Apply other filters based on filter columns and operators
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

        // Apply date range filter
        $query->when($filters['date_range'] ?? null, function ($query, $dateRange) {
            $dates = explode(__('general.to'), $dateRange);
            if (count($dates) === 2) {
                [$startDate, $endDate] = $dates;
                $query->whereDate('created_at', '>=', $startDate)
                    ->whereDate('created_at', '<=', $endDate);
            }
        });

        // Apply month filter
        $currentYear = Carbon::now()->year;
        $query->when($filters['months'] ?? null, function ($query, $months) use ($currentYear) {
            $query->where(function ($query) use ($months, $currentYear) {
                foreach ($months as $month) {
                    $query->orWhere(function ($query) use ($month, $currentYear) {
                        $query->whereMonth('created_at', $month)
                            ->whereYear('created_at', $currentYear);
                    });
                }
            });
        });

        // Apply search filter
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('first_name', 'like', '%' . $search . '%')
                    ->orWhere('last_name', 'like', '%' . $search . '%')
                    ->orWhere('address', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('phone', 'like', '%' . $search . '%')
                    ->orWhere('mobile', 'like', '%' . $search . '%')
                    ->orWhere('oid', 'like', '%' . $search . '%')
                    ->orWhere('created_at', 'like', '%' . $search . '%')
                    ->orWhere('barcode', 'like', '%' . $search . '%')
                    ->orWhere('remarks', 'like', '%' . $search . '%')
                    ->orWhereHas('customer', function ($query) use ($search) {
                        $query->where('first_name', 'like', '%' . $search . '%')
                            ->orWhere('last_name', 'like', '%' . $search . '%')
                            ->orWhere('address', 'like', '%' . $search . '%');
                    });
            });
        });
    }

}
