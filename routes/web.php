<?php

use App\Http\Controllers\Admin\DesignSkillController;
use App\Http\Controllers\Admin\DesignSkillHeaderController;
use App\Http\Controllers\Admin\EducationHeaderController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\SkillHeaderController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\TypeWriterController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// admin route
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth'])
    ->group(function () {
// 1. hero section
        Route::get('/hero/edit', [HeroController::class, 'edit'])
            ->name('hero.edit');

        Route::put('/hero/update', [HeroController::class, 'update'])
            ->name('hero.update');
            Route::resource('social-link' , SocialLinkController::class);
            Route::resource('type-writer' , TypeWriterController::class);
// 02. feature section
        Route::resource('feature', FeatureController::class);
        //03 education section
        Route::resource('education-header' , EducationHeaderController::class);


        // 04
        Route::resource('skill-header' ,SkillHeaderController::class );
        Route::resource('design-skill-header' , DesignSkillHeaderController::class);
        Route::resource('design-skill' ,DesignSkillController::class);

    });
