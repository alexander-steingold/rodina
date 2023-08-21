<?php

namespace App\Services;

use App\Enums\OrderStatuses;
use App\Models\Courier;
use App\Models\Customer;
use App\Models\Event;
use App\Models\Order;
use App\Models\TempFile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReportsService
{

    public function ordersByStatus()
    {
        $allStatuses = OrderStatuses::keyLabels();
// Fetch the counts for each status
        $statusCounts = Order::with('statuses')
            ->select('order_statuses.status', DB::raw('count(*) as count'))
            ->rightJoin('order_statuses', 'orders.id', '=', 'order_statuses.order_id')
            ->groupBy('order_statuses.status')
            ->get();

// Create an associative array with default counts of 0
        $defaultStatusCounts = array_fill_keys($allStatuses, 0);

// Merge the fetched counts with the default counts
        $statusCountsMerged = array_merge($defaultStatusCounts, $statusCounts->pluck('count', 'status')->toArray());
        return $statusCountsMerged;
    }

    public function getTotals()
    {
        $totalOrders = Order::count();
        $totalCustomers = Customer::count();
        $totalCouriers = Courier::count();
        $totals = [
            'totalOrders' => $totalOrders,
            'totalCustomers' => $totalCustomers,
            'totalCouriers' => $totalCouriers
        ];
        return $totals;
    }

    public function getTotalPayments()
    {
        $payments = Order::sum('total_payment');
        return $payments;
    }

    public function getThreeMonthsPayments()
    {
        $threeMonthsAgo = Carbon::now()->subMonths(2);

        $monthlyPayments = Order::select(DB::raw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(total_payment) as total_payment'))
            ->where('created_at', '>=', $threeMonthsAgo)
            ->groupBy(DB::raw('YEAR(created_at), MONTH(created_at)'))
            ->orderBy(DB::raw('YEAR(created_at), MONTH(created_at)'))
            ->get();

        $monthlyPaymentsWithMonthNames = [];
        foreach ($monthlyPayments as $monthlyPayment) {
            $yearMonth = Carbon::createFromDate($monthlyPayment->year, $monthlyPayment->month)->format('Y-m');
            $monthName = Carbon::createFromDate($monthlyPayment->year, $monthlyPayment->month)->format('m/Y');

            $monthlyPaymentsWithMonthNames[] = [
                'month_name' => $monthName,
                'total_payment' => $monthlyPayment->total_payment,
            ];
        }
        return $monthlyPaymentsWithMonthNames;
    }

    public function getTotalMonthsPayments()
    {
        $selectedMonths = request()->query('months', []); // Include current month if not provided
        $currentYear = Carbon::now()->year;

        $filterColumns = [
            'courier_id' => '=',
        ];

        $query = Order::select(
            DB::raw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(total_payment) as total_payment')
        );

        $query->when(request()->query('date_range') ?? null, function ($query, $dateRange) {
            $dates = explode(__('general.to'), $dateRange);
            if (count($dates) === 2) {
                [$startDate, $endDate] = $dates;
                $query->whereDate('created_at', '>=', $startDate)
                    ->whereDate('created_at', '<=', $endDate);
            }
        });

        foreach ($filterColumns as $filter => $operator) {
            $value = request()->query($filter) ?? null;
            $query->when($value, function ($query) use ($filter, $operator, $value) {
                if (is_callable($operator)) {
                    $operator($query, $value);
                } else {
                    $query->where($filter, $operator, $value);
                }
            });
        }

        if (!empty($selectedMonths)) {
            $query->where(function ($query) use ($selectedMonths) {
                foreach ($selectedMonths as $month) {
                    $query->orWhereMonth('created_at', $month);
                }
            });

            // Filter by the current year
            $query->whereYear('created_at', $currentYear);
        }

        $monthlyPayments = $query->groupBy(DB::raw('YEAR(created_at), MONTH(created_at)'))
            ->orderBy(DB::raw('YEAR(created_at), MONTH(created_at)'))
            ->get();

        $totalPaymentSum = 0;
        $startMonth = null;
        $endMonth = null;

        foreach ($monthlyPayments as $monthlyPayment) {
            $totalPaymentSum += $monthlyPayment->total_payment;

            $yearMonth = Carbon::createFromDate($monthlyPayment->year, $monthlyPayment->month)->format('m/Y');

//            if ($startMonth === null) {
//                $startMonth = $yearMonth;
//            }
//
//            $endMonth = Carbon::createFromDate($monthlyPayment->year, $monthlyPayment->month)->addMonths(1)->format('m/Y');
        }

        //  $title = count($selectedMonths) === 1 ? $startMonth : "$startMonth - $endMonth";

        return [
            'total_payment_sum' => $totalPaymentSum,
            //  'title' => $title,
        ];
    }

    public function getTotalPaymentByMonth()
    {

        $currentYear = Carbon::now()->year;

        $result = Order::select(DB::raw('MONTH(created_at) AS month'), DB::raw('SUM(total_payment) AS total'))
            ->whereYear('created_at', $currentYear)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();

        $formattedData = collect([]);

        foreach ($result as $item) {
            $formattedData->push([
                'month' => __('general.month.' . Carbon::createFromFormat('!m', $item->month)->format('F')),
                'total' => $item->total,
            ]);
        }

        return $formattedData;

    }


    public function getTotalEvents()
    {

        $query = Event::with(['orderAssociations',
            'orderAssociations.order',
        ]);

        $selectedMonths = request()->query('months', []); // Include current month if not provided
        $currentYear = Carbon::now()->year;


        $query->when(request()->query('date_range') ?? null, function ($query, $dateRange) {
            $dates = explode(__('general.to'), $dateRange);
            if (count($dates) === 2) {
                [$startDate, $endDate] = $dates;
                $query->whereDate('created_at', '>=', $startDate)
                    ->whereDate('created_at', '<=', $endDate);
            }
        });


        if (!empty($selectedMonths)) {
            $query->where(function ($query) use ($selectedMonths) {
                foreach ($selectedMonths as $month) {
                    $query->orWhereMonth('created_at', $month);
                }
            });

            $query->whereYear('created_at', $currentYear);
        }

        $events = $query->get();
        return $events;
    }

}
