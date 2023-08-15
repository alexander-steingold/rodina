<?php

namespace App\Enums;

enum OrderStatuses: string
{
    case CALL = 'Call';
    case SUPPLY = 'Supply';
    case PICKUP = 'Pickup';
    case ARRIVED = 'Arrived';
    case ABSORBED = 'Absorbed';
    case WAITING = 'Waiting';
    case PACKAGED = 'Packaged';
    case TAXES = 'Taxes';
    case TRANSFER = 'Transfer';
    case TAXES_DESTINATION = 'TaxesDestination';
    case ARRIVED_DESTINATION = 'ArrivedDestination';
    case DELIVERED = 'Delivered';

    public function label(): string
    {
        return match ($this) {
            self::CALL => 'call',
            self::SUPPLY => 'supply',
            self::PICKUP => 'pickup',
            self::ARRIVED => 'arrived',
            self::ABSORBED => 'absorbed',
            self::WAITING => 'waiting',
            self::PACKAGED => 'packaged',
            self::TAXES => 'taxes',
            self::TRANSFER => 'transfer',
            self::TAXES_DESTINATION => 'taxes_destination',
            self::ARRIVED_DESTINATION => 'arrived_destination',
            self::DELIVERED => 'delivered'
        };
    }


    public static function keyLabels(): array
    {
        return array_reduce(self::cases(), function ($carry, OrderStatuses $item) {
            $carry[$item->value] = $item->label();
            return $carry;
        }, []);
    }
}
