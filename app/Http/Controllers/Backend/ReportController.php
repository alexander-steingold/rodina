<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Courier;

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
        $this->middleware(function ($request, $next) {
            $this->authorize('is_admin', auth()->user()); // Pass the authenticated user instance
            return $next($request);
        });
    }

    public function index()
    {
        $total_payments_by_month = $this->reportsService->getTotalPaymentByMonth();
        // return $total_payments_by_month;

        if (!request()->has('months') && !request()->has('courier_id')) {
            return redirect()->route('report.index', ['months[]' => Carbon::now()->month]);
        }
        $couriers = Courier::all();
        $data = [
            'totals' => $this->reportsService->getTotals(),
            'total_payments' => $this->reportsService->getTotalPayments(),
            'total_payments_months' => $this->reportsService->getTotalMonthsPayments(),
            'orders' => $this->orderService->index(50),
            'couriers' => $couriers,
            'total_payments_by_month' => $total_payments_by_month
        ];


        // return $data;
        return view('backend.report.index', ['data' => $data]);
    }
}
