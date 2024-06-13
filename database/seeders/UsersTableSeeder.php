<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'LoginName' => 'admin',
                'Email' => 'admin@example.com',
                'Password' => Hash::make('Aututun2'), // Hash the password securely
                'RoleCms' => 1, // Admin role
                'Date' => date_format(now(),"Y/m/d H:i:s"),
            ],
            // Add more user data as needed
        ]);
    }
}
