<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //categories
        DB::table('categories')->insert([

            //Parent Categories
            [
                'title'=>'Miscellaneous',
                'slug'=>'miscellaneous-inventory',
                'photo'=>'frontend/img/category/cata-1.jpg',
                'is_parent'=>1,
                'parent_id'=>null,
                'status'=>'active',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'Womens Inventory',
                'slug'=>'women-inventory',
                'photo'=>'frontend/img/category/cata-2.jpg',
                'is_parent'=>1,
                'parent_id'=>null,
                'status'=>'active',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],

            [
                'title'=>'Mens Inventory',
                'slug'=>'mens-inventory',
                'photo'=>'frontend/img/category/cata-4.jpg',
                'is_parent'=>1,
                'parent_id'=>null,
                'status'=>'active',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
        ]);
    }
}
