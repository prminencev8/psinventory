<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //brands
        DB::table('brands')->insert([
            //Parent Categories
            [
                'title'=>'Misc',
                'slug'=>'misc',
                'photo'=>'frontend/img/partner-img/7.jpg',
                'status'=>'active',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'aetna',
                'slug'=>'aetna',
                'photo'=>'frontend/img/partner-img/6.jpg',
                'status'=>'active',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],

            [
                'title'=>'Zara',
                'slug'=>'zara',
                'photo'=>'frontend/img/partner-img/2.jpg',
                'status'=>'active',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'Adidas',
                'slug'=>'adidas',
                'photo'=>'frontend/img/partner-img/3.jpg',
                'status'=>'active',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'Nike',
                'slug'=>'nike',
                'photo'=>'frontend/img/partner-img/4.jpg',
                'status'=>'active',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'H&M',
                'slug'=>'h-m',
                'photo'=>'frontend/img/partner-img/1.jpg',
                'status'=>'active',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
        ]);
    }
}
