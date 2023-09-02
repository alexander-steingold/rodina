<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Models\Item;
use App\Services\ItemService;
use Illuminate\Http\Request;

class CompanyItemController extends Controller
{
    protected $targets;
    protected $types;
    protected $features;

    public function __construct(private ItemService $itemService)
    {
        $this->targets = Item::$target;
        $this->types = Item::$type;
        $this->features = Item::$features;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.item.create', [
                'targets' => $this->targets,
                'types' => $this->types,
                'features' => $this->features,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemRequest $request)
    {
        $this->authorize('store', Item::class);
        $request->user()->company->items()->create($request->validated());
        return redirect()->route('company.dashboard')->with('success', 'Property submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
