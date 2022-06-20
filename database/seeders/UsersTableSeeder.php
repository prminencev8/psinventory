<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        //Customer
        DB::table('users')->insert([
            [
                'full_name'=>'Mr. Customer',
                'username'=>'Customer',
                'email'=>'customer@gmail.com',
                'password'=>Hash::make('1111'),
                'status'=>'active',
            ],
        ]);

        //Admin
        DB::table('admins')->insert([
            [
                'full_name'=>'Mr. Admin',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('1111'),
                'status'=>'active',
            ],
        ]);

        //Merchant/* coded ep40 449 */
        DB::table('merchants')->insert([
            [
                'full_name'=>'Mr. Merchant',
                'username'=>'Mr. Merchant',
                'email'=>'merchant@gmail.com',
                'address'=>'Kuching, Sarawak',
                'phone'=>'0106550017',
                'photo'=>'',
                'password'=>Hash::make('1111'),
                'is_verified'=>1,
                'status'=>'active',
            ],

            [
                'full_name'=>'Alexander',
                'username'=>'user',
                'email'=>'alex@gmail.com',
                'address'=>'Kuching, Sarawak',
                'phone'=>'0106550017',
                'photo'=>'',
                'password'=>Hash::make('1111'),
                'is_verified'=>1,
                'status'=>'active',
            ],
        ]);        
    }
}
