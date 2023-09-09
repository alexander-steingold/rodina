<?php

namespace App\Enums;

enum OrderItems: string
{
    case CLOTHES = 'CLOTHES';
    case SHOES = 'SHOES';
    case DISHES = 'DISHES';
    case CANNED_FOOD = 'CANNED FOOD';
    case FOOD = 'FOOD';
    case WASHING_POWDER = 'WASHING POWDER';
    case HYGIENE_PRODUCTS = 'HYGIENE PRODUCTS';
    case COVERED_STILLED = 'COVERED STILLED';
    case LINENS = 'LINENS';
    case ELECTRICAL_EQUIPMENT = 'ELECTRICAL EQUIPMENT';
    case HOUSEHOLD_CHEMICALS = 'HOUSEHOLD CHEMICALS';
    case BUILDING_MATERIALS = 'BUILDING MATERIALS';
    case TOOLS = 'TOOLS';

    public function label(): string
    {
        return match ($this) {
            self::CLOTHES => __('general.goods.clothes'),
            self::SHOES => __('general.goods.shoes'),
            self::DISHES => __('general.goods.dishes'),
            self::CANNED_FOOD => __('general.goods.canned_food'),
            self::FOOD => __('general.goods.food'),
            self::WASHING_POWDER => __('general.goods.washing_powder'),
            self::HYGIENE_PRODUCTS => __('general.goods.hygiene_products'),
            self::COVERED_STILLED => __('general.goods.covered_stilled'),
            self::LINENS => __('general.goods.linens'),
            self::ELECTRICAL_EQUIPMENT => __('general.goods.electrical_equipment'),
            self::HOUSEHOLD_CHEMICALS => __('general.goods.household_chemicals'),
            self::BUILDING_MATERIALS => __('general.goods.building_materials'),
            self::TOOLS => __('general.goods.tools'),
        };
    }


    public static function keyLabels(): array
    {
        return array_reduce(self::cases(), function ($carry, OrderItems $item) {
            $carry[$item->value] = $item->label();
            return $carry;
        }, []);
    }
}
