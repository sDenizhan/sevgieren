<?php
namespace App\Enums;

enum ContactTypes : int {

    case General = 1;
    case Complaint = 2;
    case Offer = 3;

    public static function toArray(){
        return (array) collect(self::cases())->mapWithKeys(function($value, $key){
            return [$value->value => $value->name];
        });
    }
}
