<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuoteRequest;
use App\Http\Requests\UpdateQuoteRequest;
use App\Models\Quote;
use App\Services\QuoteService;

class QuoteController extends Controller
{
    public function __construct(private QuoteService $quoteService)
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quotes = $this->quoteService->index();
        return view('backend.quote.index', ['quotes' => $quotes]);
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
    public function store(QuoteRequest $request)
    {
        if ($this->quoteService->store($request) === true) {
            return redirect()->route('index')->with('success', __('general.quote.alerts.successfully_created'));
        } else {
            return redirect()->route('index')->with('error', __('general.alerts.operation_failed'));
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
    public function update(UpdateQuoteRequest $request, Quote $quote)
    {
        if ($this->quoteService->update($request, $quote) === true) {
            return redirect()->route('quote.index')->with('success', __('general.quote.alerts.successfully_updated'));
        } else {
            return redirect()->route('quote.index')->with('error', __('general.alerts.operation_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function latestQuotes()
    {
        $latestQuotes = Quote::latest()->take(5)->get();
        return $latestQuotes;
    }
}
