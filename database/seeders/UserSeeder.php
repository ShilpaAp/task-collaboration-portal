<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
            'name' => 'admin1',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin1'),
            'role' => 'Admin'
            ],

             [
            'name' => 'developer1',
            'email' => 'developer@gmail.com',
            'password' => Hash::make('developer1'),
            'role' => 'Developer'
            ],

             [
            'name' => 'client1',
            'email' => 'client@gmail.com',
            'password' => Hash::make('client1'),
            'role' => 'Client'
            ],

             [
            'name' => 'developer2',
            'email' => 'developer2@gmail.com',
            'password' => Hash::make('developer2'),
            'role' => 'Developer'
            ],

             [
            'name' => 'client2',
            'email' => 'client2@gmail.com',
            'password' => Hash::make('client2'),
            'role' => 'Client'
            ],
        ]);
    }
}
