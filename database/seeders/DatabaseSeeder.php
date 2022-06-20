<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(BannerTableSeeder::class);
        $this->call(BrandTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ShippingTableSeeder::class);




        /* \App\Models\User::factory(10)->create();        
        \App\Models\Product::factory(20)->create(); */
    }
}
