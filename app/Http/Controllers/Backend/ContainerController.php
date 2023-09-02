<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContainerRequest;
use App\Models\Barcode;
use App\Models\Container;
use App\Models\ContainerBarcode;
use App\Models\Country;
use App\Services\ContainerService;
use Illuminate\Http\Request;

class ContainerController extends Controller
{

    public function __construct(private ContainerService $containerService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $containers = $this->containerService->index();
        $countries = Country::all();
        $barcodes = Barcode::all();
        return view('backend.container.index',
            [
                'containers' => $containers,
                'countries' => $countries,
                'barcodes' => $barcodes
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        $barcodes = Barcode::legal()->get();

        return view('backend.container.create', [
            'countries' => $countries,
            'barcodes' => $barcodes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContainerRequest $request)
    {
        if ($this->containerService->store($request) === true) {
            return redirect()->route('container.index')->with('success', __('general.container.alerts.successfully_created'));
        } else {
            return redirect()->route('container.index')->with('error', __('general.alerts.operation_failed'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Container $container)
    {
        return view('backend.container.show', ['container' => $container->load('barcodes')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Container $container)
    {
        $countries = Country::all();
        $barcodes = Barcode::legal()->get();
        return view('backend.container.edit', [
            'container' => $container,
            'countries' => $countries,
            'barcodes' => $barcodes
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContainerRequest $request, Container $container)
    {
        if ($this->containerService->update($request, $container) === true) {
            return redirect()->route('container.index')->with('success', __('general.container.alerts.successfully_updated'));
        } else {
            return redirect()->route('container.index')->with('error', __('general.alerts.operation_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Container $container)
    {
        try {
            // $this->authorize('delete', $contact);
            $container->delete();
            return redirect()->route('container.index')->with('success', __('general.container.alerts.successfully_deleted'));
        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            return redirect()->back()->with('error', __('general.alerts.operation_failed'));
        }
    }

    public function deleteBarcode(string $id)
    {

        try {
            // $this->authorize('delete', $contact);
            $barcode = ContainerBarcode::find($id);
            $barcode->delete();
            return redirect()->back()->with('success', __('general.container.alerts.barcode_successfully_deleted'));
        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            return redirect()->back()->with('error', __('general.alerts.operation_failed'));
        }
    }


}
