<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ShippingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //categories
        DB::table('shippings')->insert([

            //Parent Categories
            [
                'shipping_address'=>'Lot 619, Blok 16 KCLD, Jalan Song, 93350 Kuching, Sarawak',
                'delivery_time'=>'10',
                'delivery_charge'=>'10',                
                'status'=>'active',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'shipping_address'=>'Level 2 & 3 Lot 4, Block B1 Saradise, 93350 Kuching, Sarawak',
                'delivery_time'=>'20',
                'delivery_charge'=>'15',                
                'status'=>'active',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],

            [
                'shipping_address'=>'NA',
                'delivery_time'=>'0',
                'delivery_charge'=>'0',                
                'status'=>'active',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
        ]);
    }
}
