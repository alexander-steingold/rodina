<?php

namespace App\Http\Controllers\Backend;

use App\Enums\OrderStatuses;
use App\Exports\OrderExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\TrackingRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Courier;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderAssociation;
use App\Services\OrderService;
use Barryvdh\DomPDF\Facade\Pdf;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

//use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{

    protected $statuses;

    public function __construct(private OrderService $orderService)
    {
        parent::__construct();
        $this->statuses = OrderStatuses::keyLabels();
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $orders = $this->orderService->index();
        $cities = City::all();
        $couriers = Courier::all();

        return view('backend.order.index',
            [
                'orders' => $orders,
                'statuses' => $this->statuses,
                'cities' => $cities,
                'couriers' => $couriers
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        $customers = Customer::active()
            ->orderBy('first_name', 'asc')
            ->orderBy('last_name', 'asc')
            ->get();
        $couriers = Courier::active()->get();
//        $barcodes = json_encode(old('barcode', []));

        return view('backend.order.create', [
            'countries' => $countries,
            'customers' => $customers,
            'couriers' => $couriers,
            'statuses' => $this->statuses,
            //'barcodes' => $barcodes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        if ($this->orderService->store($request) === true) {
            return redirect()->route('order.index')->with('success', __('general.order.alerts.order_successfully_created'));
        } else {
            return redirect()->route('order.index')->with('error', __('general.alerts.operation_failed'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $o = $order->load([
            'customer',
            'country',
            'statuses',
            //'associations',
            'associations.event',
            'associations.courier',
            'associations.route'
        ]);
        // return $o;
        return view('backend.order.show', ['order' => $o]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $countries = Country::all();
        $customers = Customer::orderBy('first_name', 'asc')
            ->orderBy('last_name', 'asc')
            ->get();
        $couriers = Courier::orderBy('first_name', 'asc')
            ->orderBy('last_name', 'asc')
            ->get();

        $barcodes = $order->load('barcodes')->barcodes->toArray();
        $barcodes_array = array_map(function ($barcode) {
            return $barcode['barcode'];
        }, $barcodes);
        //  return $barcodes_array;
        $barcodes = json_encode(old('barcode', $barcodes_array));
        return view('backend.order.edit', [
            'countries' => $countries,
            'customers' => $customers,
            'couriers' => $couriers,
            'statuses' => $this->statuses,
            'order' => $order->load('currentStatus'),
            'barcodes' => $barcodes

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, Order $order)
    {
        if ($this->orderService->update($request, $order) === true) {
            return redirect()->route('order.index')->with('success', __('general.order.alerts.order_successfully_updated'));
        } else {
            return redirect()->route('order.index')->with('error', __('general.alerts.operation_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderAssociation $order)
    {
        try {
            // $this->authorize('delete', $event);
            $order->delete();
            return redirect()->back()->with('success', __('general.event.alerts.event_order_successfully_deleted'));
        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            return redirect()->back()->with('error', __('general.alerts.operation_failed'));
        }
    }


    public function exportExcel(Request $request)
    {
        $orderIds = $request->input('orders');
        $orders = Order::whereIn('id', $orderIds)
            ->select([
                'oid',
                'first_name',
                'last_name',
                'city',
                'address',
                'email',
                'phone',
                'mobile',
                'weight',
                'payment',
                'discount',
                'total_payment',
                'remarks',
                DB::raw('(SELECT name FROM countries WHERE id = orders.country_id) AS country_name'),
            ])
            ->get();

        return Excel::download(new OrderExport($orders), 'orders.xlsx');

    }

    public function exportPdf($id)
    {
        $order = Order::with(['customer', 'country'])
            ->withCount('barcodes')
            ->with('barcodes')
            ->find($id);
        //return $order;
        return view('backend/export/pdf', ['order' => $order]);
        $pdf = Pdf::loadView('backend/export/pdf', ['order' => $order])->setPaper('a4', 'landscape');
        return $pdf->stream('order.pdf');
        //return $pdf->download('invoice.pdf');
        // $htmlContent = View::make('backend/export/pdf')->render();

        // return response()->json(['html' => $htmlContent]);


    }

    public function exportSelectedOrders(Request $request)
    {
        $selectedOrderIds = $request->input('selectedOrders');
        $selectedFields = ['first_name', 'last_name', 'city']; // Add your custom field names
        $selectedOrders = Order::whereIn('id', $selectedOrderIds)->get();
        $exportData = new OrdersExport($selectedOrders, $selectedFields);

        // Generate the Excel export file
        //$exportPath = 'public/selected_orders.xlsx';
        $exportFile = storage_path('app/public/selected_orders.xlsx');
        logger('info', [$exportFile]);
        Excel::store($exportData, 'selected_orders.xlsx');
        //Storage::setVisibility($exportPath, 'public');
        // Create a response with the download headers
        return Response::download($exportFile, 'selected_orders.xlsx', [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'attachment; filename=selected_orders.xlsx',
        ]);
    }

    public function tracking(TrackingRequest $request)
    {
        $order = $this->orderService->getOrderStatus($request);
        if ($order) {
            return redirect()->route('index')->with('success', __('general.order.current_status_is') . '<br><h5 class="text-success">' . __('general.order.statuses.' . $order->currentStatus->status) . '</h5>');
        } else {
            return redirect()->route('index')->with('error', __('general.order.alerts.order_not_found'));
        }

    }
}
