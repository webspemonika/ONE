<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        Hero::create([
            'greeting_text'    => 'Hello, I am',
            'title'            => 'Your Name',
            'description'      => 'Laravel Developer',
            'hero_img'         => '',
            'profile_dark_img' => '',
            'profile_light_img'=> '',
        ]);
    }
}
