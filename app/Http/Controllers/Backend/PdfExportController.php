<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfExportController extends Controller
{
    public function export()
    {
        $pdf = Pdf::loadView('backend/export/pdf');
        return $pdf->download('invoice.pdf');
    }
}
