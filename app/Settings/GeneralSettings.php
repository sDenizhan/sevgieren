<?php
namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public ?string $site_name = '';
    public ?string $mail_address = '';
    public ?string $phone_number = '';
    public ?string $address = '';
    public ?string $site_logo = '';
    public ?string $copyright_text = '';
    public ?string $facebook = '';
    public ?string $twitter = '';
    public ?string $instagram = '';
    public ?string $youtube = '';

    public static function group(): string {
        return 'general';
    }
}
