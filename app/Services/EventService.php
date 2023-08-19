<?php

namespace App\Services;

use App\Http\Requests\EventRequest;

use App\Models\Event;
use App\Models\OrderAssociation;
use App\Models\Route;
use Illuminate\Support\Facades\DB;


class EventService
{
    public function index()
    {
        $filters = request()->only(
            'month',
            'year',
        );
        $events = Event::filter($filters)
            ->latest()
            ->with(['orderAssociations',
                'orderAssociations.order',
                'orderAssociations.courier',
                'orderAssociations.route'
            ])
            ->get();
        return $events;
    }

    public function store(EventRequest $request)
    {
        $validatedData = $request->validated();
        try {
            DB::beginTransaction();
            $event = Event::create([
                'date' => $validatedData['date'],
            ]);
            DB::commit();

        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            DB::rollBack();
            return false;
        }

        $routeId = $validatedData['route_id'];
        $courierId = $validatedData['courier_id'];
        try {
            foreach ($validatedData['order_ids'] as $orderId) {
                OrderAssociation::create([
                    'event_id' => $event->id,
                    'route_id' => $routeId,
                    'courier_id' => $courierId,
                    'order_id' => $orderId,
                ]);
            }
        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            DB::rollBack();
            return false;
        }

        return true;
    }

    public function update(EventRequest $request, Route $route)
    {
        try {
            DB::beginTransaction();
            $route->update($request->validated());
            DB::commit();
            return true;
        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            DB::rollBack();
            return false;
        }
    }

}
