<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderExport implements FromCollection, WithHeadings
{
    protected $orders;

    public function __construct($orders)
    {
        $this->orders = $orders;
    }

    public function collection()
    {
        return $this->orders;
    }

    public function headings(): array
    {
        return [
            __('general.order.order_number'),
            __('general.user.first_name'),
            __('general.user.last_name'),
            __('general.user.city'),
            __('general.user.address'),
            __('general.user.email'),
            __('general.user.phone'),
            __('general.user.mobile'),
            __('general.order.weight'),
            __('general.order.price'),
            __('general.order.discount'),
            __('general.order.payment'),
            __('general.user.remarks'),
            __('general.user.country'),
        ];
    }
}
