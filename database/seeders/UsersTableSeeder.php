<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'User1',
            'email' => 'user1@example.com',
            'password' => bcrypt('123456789'),
        ]);
        User::create([
            'name' => 'User2',
            'email' => 'user2@example.com',
            'password' => bcrypt('123456789'),
        ]);
    }
}
