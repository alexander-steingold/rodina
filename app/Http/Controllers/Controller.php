<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {

        // Get quotes count
        $quoteCount = Quote::where('status', 'waiting')->count();

        // Get latest 5 quotes
        $latestQuotes = Quote::where('status', 'waiting')->latest()->take(5)->get();
        // Share data with all views
        View::share('quoteCount', $quoteCount);
        View::share('latestQuotes', $latestQuotes);
    }
}
