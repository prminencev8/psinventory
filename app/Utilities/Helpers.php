<?php

class Helper{
    public static function userDefaultImage(){
        return asset('frontend/img/default.png');
    }

    public static function minPrice(){/* coded ep30 2851 */
        return floor(\App\Models\Product::min('price'));/* coded ep30 2851 */
    }

    public static function maxPrice(){/* coded ep30 2851 */
        return floor(\App\Models\Product::max('price'));/* coded ep30 2851 */
    }
}