<?php

namespace App\Services;

use App\Http\Requests\ContainerRequest;
use App\Models\Container;
use App\Models\ContainerOrder;
use Illuminate\Support\Facades\DB;


class ContainerService
{
    public function index()
    {
        $filters = request()->only(
            'search',
            'country_id',
            'barcode_id',
            'date_range',

        );
        $containers = Container:: latest()
            ->withCount('orders')
            ->filter($filters)
            ->paginate(10);
        $containers->appends(request()->query());

        return $containers;
    }

    public function store(ContainerRequest $request)
    {
        $validatedData = $request->validated();
        try {
            DB::beginTransaction();
            $container = Container::create($request->validated());
            DB::commit();

            DB::beginTransaction();
            $container->trackers()->create($request->validated());
            DB::commit();

        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            DB::rollBack();
            return false;
        }

        try {
            foreach ($validatedData['order_ids'] as $oid) {
                ContainerOrder::create([
                    'container_id' => $container->id,
                    'order_id' => $oid,
                ]);
            }
        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            DB::rollBack();
            return false;
        }

        return true;
    }

    public function update(ContainerRequest $request, Container $container)
    {
        $validatedData = $request->validated();
        try {
            DB::beginTransaction();
            $container->update($request->validated());
            DB::commit();

            DB::beginTransaction();
            $container->trackers()->create($request->validated());
            DB::commit();

        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            DB::rollBack();
            return false;
        }


        if (isset($validatedData['order_ids'])) {
            try {
                foreach ($validatedData['order_ids'] as $oid) {
                    ContainerOrder::create([
                        'container_id' => $container->id,
                        'order_id' => $oid,
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


}
