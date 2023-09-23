<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Courier;
use App\Models\Event;
use App\Models\Order;
use App\Models\Route;
use App\Services\EventService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct(private EventService $eventService,)
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;
        $currentDay = Carbon::now()->day;

        $year = $request->input('year', $currentYear);
        $month = $request->input('month', $currentMonth);

//        if (!$request->has('year') || !$request->has('month')) {
//            return redirect()->route('event.index', ['year' => $currentYear, 'month' => $currentMonth]);
//        }


        // Calculate days of the selected month
        $daysInMonth = Carbon::createFromDate($year, $month)->daysInMonth;
        $days = [];
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $date = Carbon::create($year, $month, $day);
            $days[] = [
                'date' => $date,
                'isSaturday' => $date->dayOfWeek == Carbon::SATURDAY,
                'isCurrentDate' => $date->day == $currentDay && $date->month == $currentMonth && $date->year == $currentYear,
            ];
        }

        // Calculate previous and next months
        $prevDate = Carbon::create($year, $month)->subMonth();
        $nextDate = Carbon::create($year, $month)->addMonth();
        $prevMonthDate = Carbon::create($year, $month)->subMonth();
        $nextMonthDate = Carbon::create($year, $month)->addMonth();

        $prevMonthName = $prevMonthDate->format('F');
        $nextMonthName = $nextMonthDate->format('F');


        $events = $this->eventService->index();
//return $events;
        $couriers = Courier::active()->get();
        $routes = Route::all();
        //return $couriers;
        foreach ($days as &$day) {
            $day['events'] = $events->where('date', $day['date']->toDateString())->all();
        }
        return view('backend.event.index', compact(
            'year',
            'month',
            'days',
            'prevDate',
            'nextDate',
            'prevMonthName',
            'nextMonthName',
            'events',
            'couriers',
            'routes'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $routes = Route::all();
        $couriers = Courier::active()->get();
        $orders = Order::latest()->get();

        return view('backend.event.create',
            compact(
                'routes',
                'couriers',
                'orders'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(EventRequest $request)
    {
        if ($this->eventService->store($request) === true) {
            return redirect()->route('event.index')->with('success', __('general.event.alerts.event_successfully_created'));
        } else {
            return redirect()->route('event.index')->with('error', __('general.alerts.operation_failed'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $routes = Route::all();
        $couriers = Courier::active()->get();
        $orders = Order::legal()
            ->latest()->get();

        $event = $event->load(['orderAssociations',
            'orderAssociations.order',
        ]);

        // return $event;
        return view('backend.event.edit',
            compact(
                'routes',
                'couriers',
                'orders',
                'event'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, Event $event)
    {
        if ($this->eventService->update($request, $event) === true) {
            return redirect()->route('event.index')->with('success', __('general.event.alerts.event_successfully_updated'));
        } else {
            return redirect()->route('event.index')->with('error', __('general.alerts.operation_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        try {
            // $this->authorize('delete', $event);
            $event->delete();
            return redirect()->route('event.index')->with('success', __('general.event.alerts.event_successfully_deleted'));
        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            return redirect()->route('event.index')->with('error', __('general.alerts.operation_failed'));
        }
    }
}
