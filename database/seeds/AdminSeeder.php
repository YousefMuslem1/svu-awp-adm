<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([

            'name' => 'admin',
            'password' => Hash::make('123'),
            'email' => 'admin@svu.org',
            'is_admin' => true

        ]);
        User::create([

            'name' => 'yousef',
            'password' => Hash::make('123'),
            'email' => 'yousef@svu.org',
            'is_admin' => false

        ]);
        User::create([

            'name' => 'naser',
            'password' => Hash::make('123'),
            'email' => 'naser@svu.org',
            'is_admin' => false

        ]);
    }
}
