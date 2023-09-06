<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\CourierService;
use App\Services\CustomerService;
use App\Services\OrderService;
use App\Services\ReportsService;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function __construct(
        private OrderService    $orderService,
        private CustomerService $customerService,
        private CourierService  $courierService,
        private ReportsService  $reportsService
    )
    {
        parent::__construct();
        $this->middleware(function ($request, $next) {
            $this->authorize('is_admin', auth()->user()); // Pass the authenticated user instance
            return $next($request);
        });
    }

    public function index()
    {

        if (!request()->has('months') && !request()->has('date_range')) {
            return redirect()->route('report.index', ['months[]' => Carbon::now()->month]);
        }

        $data = [
            // 'totals' => $this->reportsService->getTotals(),
            'total_payments' => $this->reportsService->getTotalPayments(),
            'total_payments_months' => $this->reportsService->getTotalMonthsPayments(),
            'total_payments_by_month' => $this->reportsService->getTotalPaymentByMonth(),
            // 'total_events' => $this->reportsService->getTotalEvents()
            //  'orders' => $this->orderService->index(50),
            //couriers' => $couriers,

        ];


        //return $data;
        return view('backend.report.index', ['data' => $data]);
    }
}
