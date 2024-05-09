<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'username' => 'admin',
                'email' => 'admin@example.com',
                'email_verified_at' => time(),
                'password' => bcrypt('password'), // Hash the password securely
                'deleted' => 0,
                'created_at' => time(),
                'updated_at' => time(),
            ],
            // Add more user data as needed
        ]);
    }
}