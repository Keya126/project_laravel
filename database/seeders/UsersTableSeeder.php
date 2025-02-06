<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Jack Nicolson',
            'email' => 'jack@example.com',
            'phone' => '0123456789',
            'password' => bcrypt('password'),
        ]);
    }
}
