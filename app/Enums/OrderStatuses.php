<?php

namespace App\Enums;

enum OrderStatuses: string
{
    case CALL = 'call';
    case SUPPLY = 'supply';
    case PICKUP = 'pickup';
    case ARRIVED = 'arrived';
    case ABSORBED = 'absorbed';
    case WAITING = 'waiting';
    case PACKAGED = 'packaged';
    case TAXES = 'taxes';
    case TRANSFER = 'transfer';
    case TAXES_DESTINATION = 'taxes_destination';
    case ARRIVED_DESTINATION = 'arrived_destination';
    case DELIVERED = 'delivered';

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
