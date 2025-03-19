<?php
namespace App\Enums;

enum NewStatus : int {

    case New = 0;
    case Old = 1;

    public static function toArray(): array {
        $items = [];
        foreach (self::cases() as $case) {
            $items[$case->value] = $case->name;
        }
        return $items;
    }

}
