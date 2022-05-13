<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutZawMinHtwe extends Model
{
    use HasFactory;
    public function user(){

        //အပြန်ချိတ်ဆက်မှု အများ
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class,"about_zaw_min_htwe_id");
    }

    public function galleries(){
        return $this->hasMany(Gallery::class,"about_zaw_min_htwe_id");
    }
}
