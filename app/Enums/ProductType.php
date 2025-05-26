<?php
namespace App\Enums;

enum ProductType: string
{
    case DIGITAL = 'digital';
    case PHYSICAL = 'physical';

    public static function values(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
}
