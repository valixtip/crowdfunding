<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'User',
            'email' => 'dmin@example.com',
            'password' => Hash::make('password'),
            'balance' => 5000.00,
        ]);

        User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'balance' => 1500.00,
        ]);

        // Додавання більше користувачів за бажанням
        User::factory(10)->create();
    }
}
