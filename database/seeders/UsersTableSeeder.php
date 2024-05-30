<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([[
            'name' => 'Admin',
            'role' => 'Admin',
            'UTM_relation' => 'Admin',
            'IC_number' => '0000',
            'phone_number' => '0000',
            'email' => 'admin@gmail.com',
            'username' => 'Admin',
            'password' => Hash::make('123'),
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Manager',
            'role' => 'Event Manager',
            'UTM_relation' => 'Student',
            'IC_number' => '0000',
            'phone_number' => '0000',
            'email' => 'manager@gmail.com',
            'username' => 'Manager',
            'password' => Hash::make('123'),
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Vendor',
            'role' => 'Vendor',
            'UTM_relation' => 'Public',
            'IC_number' => '0000',
            'phone_number' => '0000',
            'email' => 'vendor@gmail.com',
            'username' => 'Vendor',
            'password' => Hash::make('123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
    }
}
