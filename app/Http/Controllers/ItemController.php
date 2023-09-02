<?php

namespace App\Http\Controllers;


use App\Http\Requests\ItemRequest;
use App\Models\Item;
use App\Models\TempFile;
use App\Services\ItemService;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class ItemController extends Controller
{
    protected $targets;
    protected $types;
    protected $features;

    public function __construct(private ItemService $itemService, private UploadService $uploadService)
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
        $items = $this->itemService->index();

        return view('frontend.item.index',
            [
                'items' => $items,
                'targets' => $this->targets,
                'types' => $this->types,
                'features' => $this->features,
            ]
        );
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
        try {
            $this->authorize('store', Item::class);

            DB::beginTransaction();
            $item = $request->user()->company->items()->create($request->validated());
            DB::commit();

            $tmpFiles = TempFile::all();
            if (!$tmpFiles->isEmpty()) {
                foreach ($tmpFiles as $file) {
                    if ($filePath = $this->uploadService->upload($file)) {
                        DB::beginTransaction();
                        $item->images()->create([
                            'url' => $filePath
                        ]);
                        DB::commit();
                    }
                }
            }
            return redirect()->route('company.dashboard')->with('success', 'Property submitted successfully!');
        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            DB::rollBack();
            //return response()->json(['message' => 'Something went wrong'], 500);
        }
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
