<?php

namespace App\Http\Controllers\Backend;


use App\Enums\OrderStatuses;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\CourierService;
use App\Services\CustomerService;
use App\Services\OrderService;
use App\Services\ReportsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminDashboardController extends Controller
{
    public function __construct(
        private OrderService    $orderService,
        private CustomerService $customerService,
        private CourierService  $courierService,
        private ReportsService  $reportsService
    )
    {

    }

    public function index()
    {

        $data = [
            'lastOrder' => $this->orderService->lastOrder(),
            'lastCustomer' => $this->customerService->lastCustomer(),
            'lastCourier' => $this->courierService->lastCourier(),
            'orderByStatus' => $this->reportsService->ordersByStatus(),
            'totals' => $this->reportsService->getTotals(),
            'total_payments' => $this->reportsService->getTotalPayments(),
            'total_payments_3months' => $this->reportsService->getThreeMonthsPayments()
        ];

        //return $data;
        return view('backend.dashboard.index', ['data' => $data]);
    }
}
