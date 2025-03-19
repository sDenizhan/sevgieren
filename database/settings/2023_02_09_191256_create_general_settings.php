<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', 'Sevgieren');
        $this->migrator->add('general.site_logo', '');
        $this->migrator->add('general.mail_address', 'info@sevgieren.com');
        $this->migrator->add('general.address', '');
        $this->migrator->add('general.phone_number', '+905553332211');
        $this->migrator->add('general.copyright_text', '');
        $this->migrator->add('general.twitter', '');
        $this->migrator->add('general.facebook', '');
        $this->migrator->add('general.instagram', '');
        $this->migrator->add('general.youtube', '');
    }
}
