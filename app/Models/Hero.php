<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $fillable =[
            'greeting_text',
            'title',
            'description',
            'hero_img',
            'profile_dark_img',
            'profile_light_img',
            
    ];
}
