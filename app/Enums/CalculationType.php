<?php

namespace App\Enums;

enum CalculationType: string
{
    case WITH_TAX = 'with_tax';
    case WITHOUT_TAX = 'without_tax';

    public static function values(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
}
