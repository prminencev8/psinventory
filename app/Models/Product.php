<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['title','slug','summary','description','stock','additional_info','return_cancellation','price','status','photo','brand_id','cat_id','child_cat_id','size','user_id','added_by'];/* checked ep41 1035 */

    public function brand(){
        return $this->belongsTo('App\Models\Brand');
    }

    public function rel_prods(){
        return $this->hasMany('App\Models\Product','cat_id','cat_id')->where('status','active')->limit(10);
    }

    public static function getProductByCart($id){
        return self::where('id',$id)->get()->toArray();
    }

    public function attributes(){
        return $this->hasMany('App\Models\ProductAttribute');
    }

    public function orders(){
        return $this->belongsToMany(Order::class,'product_orders')->withPivot('quantity');
    }
}
