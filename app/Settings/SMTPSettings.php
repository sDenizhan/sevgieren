<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SMTPSettings extends Settings
{

    public static function group(): string
    {
        return 'smtp';
    }
}
