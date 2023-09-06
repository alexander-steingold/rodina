<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Http\Requests\QuoteRequest;
use App\Services\OrderService;

class LandingController extends Controller
{
    public function __construct(
        private OrderService $orderService
    )
    {

    }

    public function index()
    {
        return view('frontend.landing.index');
    }

    public function quote(QuoteRequest $request)
    {
        return $request;

    }


}
