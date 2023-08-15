<?php

namespace App\Enums;

enum UserStatuses: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';

    //case DELETED = 'deleted';

    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => 'active',
            self::INACTIVE => 'inactive',
            // self::DELETED => 'deleted',
        };
    }


    public static function keyLabels(): array
    {
        return array_reduce(self::cases(), function ($carry, UserStatuses $item) {
            $carry[$item->value] = $item->label();
            return $carry;
        }, []);
    }

}
