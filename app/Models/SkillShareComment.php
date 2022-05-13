<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillShareComment extends Model
{
    use HasFactory;

    public function shareSkill()
    {
        return $this->belongsTo(ShareSkill::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
