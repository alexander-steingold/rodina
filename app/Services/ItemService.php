<?php

namespace App\Services;

use App\Models\Item;
use Illuminate\Database\Eloquent\Builder;

class ItemService
{
    public function index()
    {
        $filters = request()->only(
            'search',
            'target',
            'type',
            'bedrooms',
            'bathrooms',
            'building',
            'area',
            'price',
            'available',
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
            'wifi',

        );
        $products = Item::select(['id',
            'title',
            'bedrooms',
            'bathrooms',
            'area',
            'type',
            'target',
            'city',
            'address',
            'price',

        ])
            ->with('company', 'firstImage')
            ->latest()
            ->filter($filters)
            ->active()
            ->paginate(10);

        $products->appends(request()->query());
        return $products;
    }
}
