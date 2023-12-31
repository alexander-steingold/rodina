<?php

namespace App\Services;


use App\Http\Requests\OrderRequest;
use App\Http\Requests\TrackingRequest;
use App\Models\Order;
use App\Models\TempFile;
use Illuminate\Support\Facades\DB;


class OrderService
{
    public function __construct(private UploadService $uploadService)
    {

    }

    public function index($perPage = 10)
    {
        $filters = request()->only(
            'search',
            'status',
            'total_payment',
            'total_payment',
            'date_range',
            'courier_id',
            'months',
        );
        $orders = Order::filter($filters)
            ->with('currentStatus')
            ->with(['customer' => function ($q) {
                $q->select('id', 'first_name', 'last_name');
            }])
            ->withCount('associations')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage = $perPage);
        $orders->appends(request()->query());

        return $orders;
    }

    public function store(OrderRequest $request)
    {
        try {
            DB::beginTransaction();
            $order = Order::create($request->validated());
            DB::commit();


            DB::beginTransaction();
            $order->statuses()->create($request->validated());
            DB::commit();

//            if ($request->has('barcode')) {
//                $barcodes = $request->get('barcode');
//                foreach ($barcodes as $barcode) {
//                    if (!empty($barcode)) {
//                        DB::beginTransaction();
//                        $order->barcodes()->create([
//                            'barcode' => $barcode,
//                        ]);
//                        DB::commit();
//                    }
//                }
//            }

            if ($request->has('item')) {
                $items = $request->get('item');
                foreach ($items as $key => $value) {
                    if ($value) {
                        DB::beginTransaction();
                        $order->items()->create([
                            'item' => $key,
                            'qty' => $value,
                        ]);
                        DB::commit();
                    }
                }
            }

            $tmpFiles = TempFile::all();
            if (!$tmpFiles->isEmpty()) {
                foreach ($tmpFiles as $file) {
                    if ($filePath = $this->uploadService->upload($file)) {
                        DB::beginTransaction();
                        $order->files()->create([
                            'url' => $filePath,
                            'name' => $file->file
                        ]);
                        DB::commit();
                    }
                }
            }

            DB::beginTransaction();
            $order->trackers()->create($request->validated());
            DB::commit();

            return true;
        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            DB::rollBack();
            return false;
        }
    }

    public function update(OrderRequest $request, Order $order)
    {
        try {
            DB::beginTransaction();
            $order->update($request->validated());
            DB::commit();

            $currentStatus = $order->currentStatus->status;
            //logger('info', [$request->validated('status')]);
            if ($currentStatus != $request->validated('status')) {
                DB::beginTransaction();
                $order->statuses()->create($request->validated());
                DB::commit();
            }

            if ($request->has('item')) {
                $items = $request->input('item', []);
//                logger('info', [$items]);
//                logger('info', [$order->items]);
                foreach ($items as $key => $value) {
                    $item = $order->items->firstWhere('item', $key);
//                    logger('info', [$item]);

                    if ($value) {
                        if ($item) {
                            DB::beginTransaction();
                            $item->update([
                                'item' => $key,
                                'qty' => $value,
                            ]);
                            DB::commit();
                        } else {
                            DB::beginTransaction();
                            $order->items()->create([
                                'item' => $key,
                                'qty' => $value,
                            ]);
                            DB::commit();
                        }
                    } else {
                        if ($item) {
                            DB::beginTransaction();
                            $item->delete();
                            DB::commit();
                        }
                    }

                }
            }
//            if ($request->has('barcode')) {
//                //$barcodes = $request->get('barcode');
//                $barcodes = $request->input('barcode', []);
//                foreach ($barcodes as $index => $barcodeValue) {
//                    $existingBarcode = $order->barcodes->get($index);
//                    if (empty($barcodeValue)) {
//                        if ($existingBarcode) {
//                            $existingBarcode->delete();
//                        }
//                    } else {
//                        if ($existingBarcode) {
//                            if ($existingBarcode->barcode != $barcodeValue) {
//                                $existingBarcode->update(['barcode' => $barcodeValue]);
//                            }
//                        } else {
//                            $order->barcodes()->create(['barcode' => $barcodeValue]);
//                        }
//                    }
//                }
//            }

            $tmpFiles = TempFile::all();
            if (!$tmpFiles->isEmpty()) {
                foreach ($tmpFiles as $file) {
                    if ($filePath = $this->uploadService->upload($file)) {
                        DB::beginTransaction();
                        $order->files()->create([
                            'url' => $filePath,
                            'name' => $file->file
                        ]);
                        DB::commit();
                    }
                }
            }
            //  dd($request->validated());
            DB::beginTransaction();
            $order->trackers()->create($request->validated());
            DB::commit();

            return true;
        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            DB::rollBack();
            return false;
        }
    }

    public function getOrderStatus(TrackingRequest $request)
    {
        $order = Order::where('barcode', $request->validated('oid'))
            ->with('currentStatus')->first();
        return $order;
    }

    public function lastOrder()
    {
        $order = Order::lastOrder()->get();
        return $order;
    }

}
