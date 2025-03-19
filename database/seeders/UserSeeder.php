<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Süleyman DENİZHAN',
                'email' => 'suleyman@denizhan.me',
                'password' => bcrypt('A13467985#asd'),
            ],
            [
                'name' => 'Gonca',
                'email' => 'gonca@sevgieren.com',
                'password' => bcrypt('gonca#eren#qwertyz'),
            ]
        ];

        DB::table('users')->insert($users);
    }
}
