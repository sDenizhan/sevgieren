<?php
namespace App\Enums;

enum Status : int {

    case Passive = 0;
    case Active = 1;

    public static function toArray(): array {
        $items = [];
        foreach (self::cases() as $case) {
            $items[$case->value] = $case->name;
        }
        return $items;
    }

    public static function lang(?int $level, ?string $lang = 'tr'){
        $langs = [
            'tr' => [
                0 => 'Pasif',
                1 => 'Aktif',
            ]
        ];

        return $langs[$lang][$level];
    }
}
