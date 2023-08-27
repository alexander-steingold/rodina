<?php

namespace App\Services;

use App\Http\Requests\EventRequest;

use App\Models\Event;
use App\Models\OrderAssociation;
use App\Models\Route;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class EventService
{
    public function index()
    {
        $filters = request()->only(
            'month',
            'year',
            'courier_id',
            'route_id',
        );

        $events = Event::filter($filters)
            ->with(['orderAssociations',
                'orderAssociations.order',
                'route',
                'courier'
            ])
            ->orderBy('date', 'asc')
            ->get();
        return $events;
    }

    public function store(EventRequest $request)
    {
        $validatedData = $request->validated();
        try {
            DB::beginTransaction();
            $event = Event::create($request->validated());
            DB::commit();

            DB::beginTransaction();
            $event->trackers()->create($request->validated());
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

    public function update(EventRequest $request, Event $event)
    {
        $validatedData = $request->validated();
        try {
            DB::beginTransaction();
            $event->update($request->validated());
            DB::commit();

            DB::beginTransaction();
            $event->trackers()->create($request->validated());
            DB::commit();
            
        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            DB::rollBack();
            return false;
        }
        if (isset($validatedData['order_ids'])) {
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
        }

        return true;
    }

    public function getCurrentWeekEvents()
    {
        $currentDate = Carbon::now();
        $startOfWeek = $currentDate->copy()->startOfWeek();
        $endOfWeek = $currentDate->copy()->endOfWeek();

        $startDate = $startOfWeek->format('Y-m-d H:i:s');
        $endDate = $endOfWeek->format('Y-m-d H:i:s');

        $events = Event::dateRange($startDate, $endDate)
            ->with(['orderAssociations',
                'orderAssociations.order',
                'route',
                'courier'
            ])
            ->orderBy('date', 'asc')
            ->get();
        return $events;
    }
}
