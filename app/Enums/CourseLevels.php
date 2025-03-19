<?php
namespace App\Enums;

use function PHPUnit\Framework\matches;

enum CourseLevels : int {

    case Beginner = 1;
    case Medium = 2;
    case Advanced = 3;

    public static function toArray(){
        $status = [];
        foreach (self::cases() as $item) {
            $status[$item->value] = $item->name;
        }
        return $status;
    }

    public static function find(?int $level){
        $levels = self::toArray();
        return $levels[$level];
    }

    public static function lang(?int $level, ?string $lang = 'tr'){
         $langs = [
            'tr' => [
                1 => 'Başlangıç',
                2 => 'Normal',
                3 => 'İleri'
            ]
        ];

         return $langs[$lang][$level];
    }

    public function get() : string {
        return match($this) {
            CourseLevels::Beginner => 'Başlangıç Seviyesi',
            CourseLevels::Medium => 'Normal Seviye',
            CourseLevels::Advanced => 'İleri Seviye'
        };
    }
}
