<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    protected $fillable =[
        'title',
        'facebook_url',
        'whatsapp_url',
        'linkedin_url',
        'github_url',
    ];
}
