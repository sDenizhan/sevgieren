<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateSMTPSettings extends SettingsMigration
{
    public function up(): void {
        $this->migrator->add('smtp.smtp_host', '');
        $this->migrator->add('smtp.smtp_username', '');
        $this->migrator->add('smtp.smtp_password', '');
        $this->migrator->add('smtp.smtp_port', '');
    }
}
