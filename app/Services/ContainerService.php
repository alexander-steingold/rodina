<?php

namespace App\Services;

use App\Http\Requests\ContainerRequest;
use App\Models\Container;
use App\Models\ContainerBarcode;
use App\Models\OrderAssociation;
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
            ->withCount('barcodes')
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

        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            DB::rollBack();
            return false;
        }

        try {
            foreach ($validatedData['barcode_ids'] as $barcodeId) {
                ContainerBarcode::create([
                    'container_id' => $container->id,
                    'barcode_id' => $barcodeId,
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

        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            DB::rollBack();
            return false;
        }


        if (isset($validatedData['barcode_ids'])) {
            try {
                foreach ($validatedData['barcode_ids'] as $barcodeId) {
                    ContainerBarcode::create([
                        'container_id' => $container->id,
                        'barcode_id' => $barcodeId,
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
