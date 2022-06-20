<?php

namespace Database\Factories;


use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->word,
            'slug'=>$this->faker->unique()->slug,
            'summary'=>$this->faker->text,
            'description'=>$this->faker->paragraphs(3,true),/* checked ep33 623 */
            'additional_info'=>$this->faker->paragraphs(3,true),/* checked ep33 623 */
            'return_cancellation'=>$this->faker->paragraphs(3,true),/* checked ep33 623 */
            'stock'=>$this->faker->numberBetween(2,10),



            'brand_id'=>$this->faker->randomElement(Brand::pluck('id')->toArray()),
            'cat_id'=>$this->faker->randomElement(Category::where('is_parent',1)->pluck('id')->toArray()),
            'child_cat_id'=>$this->faker->randomElement(Category::where('is_parent',0)->pluck('id')->toArray()),
            'photo'=>$this->faker->imageUrl('255','274'),            
            'price'=>$this->faker->numberBetween(100,1000),                      
            'size'=>$this->faker->randomElement(['NA','S','M','L','XL']),    
            'added_by'=>'admin',/* checked ep41 1216 */       
            'status'=>$this->faker->randomElement(['active','inactive']),
        ];
    }
}
