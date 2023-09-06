<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\ContainerService;
use App\Services\CourierService;
use App\Services\CustomerService;
use App\Services\EventService;
use App\Services\OrderService;
use App\Services\ReportsService;
use App\Services\RouteService;


class AdminDashboardController extends Controller
{
    public function __construct(
        private OrderService     $orderService,
        private CustomerService  $customerService,
        private CourierService   $courierService,
        private ReportsService   $reportsService,
        private EventService     $eventService,
        private RouteService     $routeService,
        private ContainerService $containerService,
    )
    {
        parent::__construct();
    }

    public function index()
    {

        $data = [
//            'lastOrder' => $this->orderService->lastOrder(),
//            'lastCustomer' => $this->customerService->lastCustomer(),
//            'lastCourier' => $this->courierService->lastCourier(),
            'orderByStatus' => $this->reportsService->ordersByStatus(),
            'totals' => $this->reportsService->getTotals(),
            'total_payments' => $this->reportsService->getTotalPayments(),
            'total_payments_3months' => $this->reportsService->getThreeMonthsPayments(),
            'currentWeekEvents' => $this->eventService->getCurrentWeekEvents()
        ];

        //return $data;
        return view('backend.dashboard.index', ['data' => $data]);
    }
}
