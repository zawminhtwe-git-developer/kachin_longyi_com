<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShareSkill extends Model
{
    use HasFactory;
    protected $fillable=[
      'user_id',
      'description'
    ];

    public function skillShareComments(){
        return $this->hasMany(SkillShareComment::class,"share_skills_id");
    }
    public function user(){
        return $this->belongsTo(User::class,"user_id");
    }


}
