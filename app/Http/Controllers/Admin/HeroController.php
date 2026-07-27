<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\HeroDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hero;
use Illuminate\Support\Facades\File;
class HeroController extends Controller
{






public function edit()
{
    $hero = Hero::first();
    //Database-এর Hero table থেকে প্রথম recordটি নিয়ে আসে।

    // যদি Database-এর Hero table-এ কোনো record না থাকে, তাহলে শর্তটি সত্য হবে।
    if (!$hero) {
        $hero = new Hero();
        // যদি Database-এর Hero table-এ কোনো record না থাকে, তাহলে একটি খালি Hero object তৈরি করা হয়।
        //  একটি খালি `Hero` model object তৈরি করে,
        // যাতে Blade ফাইলে `$hero->title`, `$hero->description` ইত্যাদি ব্যবহার করলে `null` এর কারণে error না আসে।
    }

    return view('admin.hero.edit', compact('hero'));
    // $hero objectটি edit.blade.php viewতে পাঠানো হয়।
}







public function update(Request $request)
{
    $hero = Hero::first();
    //first() method Database থেকে  Heros table-এর প্রথম record টি নিয়ে আসে।
    // যদি Database-এর Hero table-এ কোনো record না থাকে, তাহলে first() method null return  করবে।

    if (!$hero) {
        $hero = new Hero();
        }
        // যদি Database-এর Hero table-এ কোনো record না থাকে, তাহলে নতুন Hero Model Object তৈরি করা হচ্ছে।


  // Form থেকে আসা ,সব Input data ,Validation করা হচ্ছে।
    $request->validate([
        'greeting_text' => 'required|max:500',
        'title' => 'required|max:500',
        'description' => 'required|max:500',
        'hero_img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'profile_dark_img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'profile_light_img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);
// model a value assigning .............
    // Form থেকে আসা 'greeting_text' input-এর  মান Hero Model-এর greeting_text propertyতে assign করা হচ্ছে।
$hero->greeting_text = $request->greeting_text;

    // Form থেকে আসা title input-এর  মান Hero Model-এর title propertyতে assign করা হচ্ছে।
    $hero->title = $request->title;

    // Form থেকে আসা description input-এর  মান Hero Model-এর description propertyতে assign করা হচ্ছে।
    $hero->description = $request->description;



    // ==========================
    // Hero Image Upload Section
    // ==========================

    // hero_img নামে কোনো নতুন Image Upload করা হয়েছে কিনা যাচাই করা হচ্ছে।
    if ($request->hasFile('hero_img')) {

        // Database-এ সংরক্ষিত পুরনো Image-এর সম্পূর্ণ Path তৈরি করা হচ্ছে।
        $filePath = public_path($hero->hero_img);

        // যদি Database-এ Image থাকে এবং সেই Image Server-এ বিদ্যমান থাকে,
        // তাহলে পুরনো Image Delete করা হবে।
        if ($hero->hero_img && File::exists($filePath)) {

            // পুরনো Image Delete করা হচ্ছে।
            File::delete($filePath);
        }

        // Upload করা নতুন Image File নেওয়া হচ্ছে।
        $file = $request->file('hero_img');

        // বর্তমান সময় (timestamp) ব্যবহার করে Unique File Name তৈরি করা হচ্ছে।
        $fileName = time() . '_hero.' . $file->getClientOriginalExtension();

        // নতুন Image uploads/hero Folder-এ সংরক্ষণ করা হচ্ছে।
        $file->move(public_path('uploads/hero'), $fileName);

        // Database-এ Image-এর Relative Path সংরক্ষণ করা হচ্ছে।
        $hero->hero_img = 'uploads/hero/' . $fileName;
    }



    // ==============================
    // Dark Background Image Upload
    // ==============================

    // profile_dark_img নামে নতুন Image Upload হয়েছে কিনা যাচাই করা হচ্ছে।
    if ($request->hasFile('profile_dark_img')) {

        // পুরনো Dark Image থাকলে এবং Server-এ থাকলে সেটি Delete করা হচ্ছে।
        if ($hero->profile_dark_img && File::exists(public_path($hero->profile_dark_img))) {
            File::delete(public_path($hero->profile_dark_img));
        }

        // Upload করা নতুন Dark Image নেওয়া হচ্ছে।
        $file = $request->file('profile_dark_img');

        // নতুন Image-এর জন্য Unique নাম তৈরি করা হচ্ছে।
        $name = time().'_dark.'.$file->getClientOriginalExtension();

        // Image uploads/hero Folder-এ সংরক্ষণ করা হচ্ছে।
        $file->move(public_path('uploads/hero'), $name);

        // Database-এ Image Path সংরক্ষণ করা হচ্ছে।
        $hero->profile_dark_img = 'uploads/hero/'.$name;
    }



    // ===============================
    // Light Background Image Upload
    // ===============================

    // profile_light_img নামে নতুন Image Upload হয়েছে কিনা যাচাই করা হচ্ছে।
    if ($request->hasFile('profile_light_img')) {

        // পুরনো Light Image থাকলে এবং Server-এ থাকলে Delete করা হচ্ছে।
        if ($hero->profile_light_img && File::exists(public_path($hero->profile_light_img))) {
            File::delete(public_path($hero->profile_light_img));
        }

        // Upload করা নতুন Light Image নেওয়া হচ্ছে।
        $file = $request->file('profile_light_img');

        // নতুন Image-এর জন্য Unique File Name তৈরি করা হচ্ছে।
        $name = time().'_light.'.$file->getClientOriginalExtension();

        // Image uploads/hero Folder-এ সংরক্ষণ করা হচ্ছে।
        $file->move(public_path('uploads/hero'), $name);

        // Database-এ নতুন Image-এর Path সংরক্ষণ করা হচ্ছে।
        $hero->profile_light_img = 'uploads/hero/'.$name;
    }
// Hero Model-এ assign  করা সব property-এর মান Database-এর 'heroes' table-এ সংরক্ষণ করা হচ্ছে।
$hero->save();

    // Save সফল হলে Hero Edit Page-এ Redirect করা হচ্ছে
    // এবং Success Message Session-এ পাঠানো হচ্ছে।
    return redirect()
        ->route('admin.hero.edit')
        ->with('success', 'Hero updated successfully.');
}
}
