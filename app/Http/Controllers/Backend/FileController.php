<?php

namespace App\Http\Controllers\Backend;

use App\Models\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(File $file)
    {
        try {
            Storage::delete($file->url);
            $directoryPath = dirname($file->url);
            // Delete the directory if it's empty
            if (Storage::exists($directoryPath) && empty(Storage::allFiles($directoryPath))) {
                Storage::deleteDirectory($directoryPath);
            }
            $file->delete();
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return redirect()->back()->with('success', __('general.alerts.file_successfully_deleted'));
    }
}
