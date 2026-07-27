<?php

// Laravel-এর File Facade ইমপোর্ট করা হচ্ছে (ফাইল চেক, ডিলিট ইত্যাদির জন্য)
use Illuminate\Support\Facades\File;

// uploadImage() function  আগে থেকে তৈরি আছে কিনা তা চেক করা হচ্ছে
if (!function_exists('uploadImage')) {

    // uploadImage() নামে একটি Helper Function তৈরি করা হচ্ছে
    function uploadImage($request, $inputName, $folder, $oldImage = null)
    {
        // Request-এ নির্দিষ্ট input name-এর কোনো file আছে কিনা চেক করা হচ্ছে
        if (!$request->hasFile($inputName)) {

            // যদি file না থাকে, তাহলে পুরোনো image path-ই return করা হবে
            return $oldImage;
        }

        // যদি old image path থাকে এবং সেই ফাইলটি public folder-এ বিদ্যমান থাকে
        if ($oldImage && File::exists(public_path($oldImage))) {

            // তাহলে পুরোনো image file delete করা হবে
            File::delete(public_path($oldImage));
        }

        // Request থেকে uploaded file object নেওয়া হচ্ছে
        $file = $request->file($inputName);

        // একটি unique filename তৈরি করা হচ্ছে
        // time() = বর্তমান timestamp
        // $inputName = input field-এর নাম
        // getClientOriginalExtension() = file-এর original extension (jpg, png ইত্যাদি)
        $name = time() . '_' . $inputName . '.' . $file->getClientOriginalExtension();

        // File-টি public/$folder directory-তে move (upload) করা হচ্ছে
        $file->move(public_path($folder), $name);

        // Database-এ সংরক্ষণের জন্য image path return করা হচ্ছে
        return $folder . '/' . $name;
    }
}
