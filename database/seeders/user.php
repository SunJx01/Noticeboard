<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class user extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('my_users')->insert([
        //     'username' => 'Admin_01',
        //     'email' => 'admin_01@example.com',
        //     'password' => Hash::make('Admin_01'),
        //     'role' => 'Admin',
        //     'created_at' => date('Y-m-d h:i:s'),
        //     'updated_at' => date('Y-m-d h:i:s'),
        // ]);

        DB::table('add_users')->insert([
            'username' => 'User_01',
            'email' => '',
            'password' => 'User_01',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ]);

    }
}
