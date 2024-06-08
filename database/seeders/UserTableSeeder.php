<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->insert([

        // Admin
        [
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'username' => '9248307691',
            'phone' => '0864527553769',
            'password' => Hash::make('123456789'), //Default Password
            'role' => 'Admin'
        ],
        // Alumni
        [
            'name' => 'Alumni',
            'email' => 'alumni@email.com',
            'username' => '2887571113',
            'phone' => '0408289578',
            'password' => Hash::make('123456789'), //Default Password
            'role' => 'Alumni'
        ],
        // User
        [
            'name' => 'User',
            'email' => 'user@email.com',
            'username' => '0404677884',
            'phone' => '0296200563',
            'password' => Hash::make('123456789'), //Default Password
            'role' => 'User'
        ],
    ]);
    }
}
