<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'sadid@kolaborasa.test'],
            ['name' => 'Sadid', 'password' => Hash::make('password123')]
        );
    }
}