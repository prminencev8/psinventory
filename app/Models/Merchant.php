<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Merchant extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $fillable=['full_name','username','email','email_verified_at','password','address','photo','phone','status','is_verified'];
    

}