<?php

namespace App\Services;

use App\Http\Requests\QuoteRequest;
use App\Http\Requests\UpdateQuoteRequest;
use App\Models\Quote;
use Illuminate\Support\Facades\DB;


class QuoteService
{
    public function index()
    {
        $filters = request()->only(
            'search',
        );
        $quotes = Quote::latest()
            ->filter($filters)
            ->with('lastTracker.user')
            ->paginate(10);
        $quotes->appends(request()->query());
        return $quotes;
    }

    public function store(QuoteRequest $request)
    {
        try {
            DB::beginTransaction();
            $quote = Quote::create($request->validated());
            DB::commit();

//            DB::beginTransaction();
//            $quote->trackers()->create($request->validated());
//            DB::commit();

            return true;
        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            DB::rollBack();
            return false;
        }
    }

    public function update(UpdateQuoteRequest $request, Quote $quote)
    {
        try {
            DB::beginTransaction();
            $quote->update($request->validated());
            DB::commit();

            DB::beginTransaction();
            $quote->trackers()->create($request->validated());
            DB::commit();

            return true;
        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            DB::rollBack();
            return false;
        }
    }


}
