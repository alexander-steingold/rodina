<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromCollection, WithHeadings
{
    protected $orders;
    protected $selectedFields; // Array to hold the selected custom fields

    public function __construct($orders, $selectedFields)
    {
        $this->orders = $orders;
        $this->selectedFields = $selectedFields;
    }

    public function collection()
    {
        // Return a collection of orders with only the selected custom fields
        return $this->orders->map(function ($order) {
            return collect($order)->only($this->selectedFields)->toArray();
        });
    }

    public function headings(): array
    {
        return $this->selectedFields; // Use selected custom fields as headings
    }
}
