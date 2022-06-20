<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //home banner
        DB::table('banners')->insert([
            [
                'title'=>'',
                'description'=>'',
                'photo'=>'frontend/img/bg-img/7.jpg',
                'status'=>'active',           
            ],           
            [
                'title'=>'Large shoe inventory',
                'description'=>'Contact your personal shopper now!',
                'photo'=>'frontend/img/bg-img/6.jpg',
                'status'=>'active',                
            ],
            [                     
                'title'=>'Welcome, Shoppers!',
                'description'=>'',
                'photo'=>'frontend/img/bg-img/9.png',
                'status'=>'active',            
            ],         
        ]);
    }
}
