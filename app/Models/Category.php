<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function Post(){
        return $this->hasMany(Post::class);
    }
    public function getOrders(){
        return $this->hasManyThrough(order::class,Post::class,"category_id","post_id");
    }
    public function getUser(){
        return $this->belongsTo(User::class,"user_id");
    }
}
