@extends('layout.admin')

@section('content')
    <div class="card">

        <div class="card-header">
            <h4 class="card-title">Update Hero Section</h4>
        </div>

   <div class="mb-3 form-group">
    <label>Greeting Text</label>

    {{--
        এটি Hero Section-এর Greeting Text ইনপুট ফিল্ড।
        এখানে ব্যবহারকারী Welcome Message বা Greeting (যেমন: "Hello, I'm", "Hi There")
        লিখতে পারবেন।

        old('greeting_text', $hero->greeting_text)
        -----------------------------------------------------
        ১. Form Validation Fail হলে old() ব্যবহারকারীর সর্বশেষ ইনপুট দেখাবে,
           ফলে আবার টাইপ করতে হবে না।
        ২. প্রথমবার Edit Page Load হলে Database থেকে
           $hero->greeting_text এর মান দেখাবে।
    --}}
    <input type="text"
           name="greeting_text"
           class="form-control"
           value="{{ old('greeting_text', $hero->greeting_text) }}">
</div>

<div class="card-body">

    {{--
        Update Form

        action="{{ route('admin.hero.update') }}"
Form Submit হলে Request টি admin.hero.update Route-এ যাবে।

        method="POST"
        HTML Form শুধুমাত্র GET এবং POST Method Support করে।
        তাই Laravel-এ PUT Request পাঠানোর জন্য POST ব্যবহার করা হয়েছে এবং নিচে @method('PUT') ব্যবহার করা হয়েছে।

        enctype="multipart/form-data"
        Form-এর মাধ্যমে File Upload করার জন্য enctype="multipart/form-data" attributeটি অবশ্যই দিতে হবে।
        enctype="multipart/form-data" attributeটি না দিলে File Controller-এ যাবে না।
    --}}
    <form action="{{ route('admin.hero.update') }}" method="POST" enctype="multipart/form-data">

        @csrf
        {{-- CSRF Attack থেকে Application-কে সুরক্ষিত রাখার জন্য Token যোগ করা হয় --}}

        {{-- HTTP POST Request-কে PUT Request হিসেবে Laravel-কে জানানো হচ্ছে --}}
        @method('PUT')



        <div class="mb-3 form-group">
            <label>Greeting Text</label>

            {{--
                Hero Section-এর Greeting Text ইনপুট।

                old() Validation Fail হলে আগের Input দেখাবে।
                অন্যথায় Database থেকে greeting_text দেখাবে।
            --}}
            <input type="text"
                   name="greeting_text"
                   class="form-control"
                   value="{{ old('greeting_text', $hero->greeting_text) }}">
        </div>



        <div class="mb-3 form-group">
            <label>Title</label>

            {{--
                Hero Section-এর প্রধান Title ইনপুট।

                Validation Error হলে old() এর Value দেখাবে।
                অন্যথায় Database-এর Title দেখাবে।
            --}}
            <input type="text"
                   name="title"
                   class="form-control"
                   value="{{ old('title', $hero->title) }}">
        </div>



        <div class="mb-3 form-group">
            <label>Description</label>

            {{--
                Hero Section-এর Description লেখার Textarea।

                id="description"
                ----------------
                এই id ব্যবহার করে Summernote Rich Text Editor চালু করা হয়েছে।

                old() Validation Error হলে আগের লেখা দেখাবে,
                অন্যথায় Database-এর Description দেখাবে।
            --}}
            <textarea name="description"
                      id="description"
                      class="form-control">{{ old('description', $hero->description) }}</textarea>
        </div>



        <div class="row">

            <div class="col-md-4">

                <label>Hero Image</label><br>

                {{--
                    Hero Section-এর Main Image Upload করার File Input।

                    Dropify Plugin ব্যবহার করে সুন্দর Preview দেখানো হয়।

                    data-default-file
                    -----------------
                    Database-এ আগে থেকে থাকা Image Preview হিসেবে দেখায়।
                --}}
                <input type="file"
                       name="hero_img"
                       class="dropify"
                       data-default-file="{{ asset($hero->hero_img) }}">
            </div>



            <div class="col-md-4">

                <label>Dark Background Image</label><br>

                {{--
                    Dark Mode-এর জন্য Background/Profile Image Upload।

                    পুরনো Image থাকলে data-default-file সেটি Preview হিসেবে দেখাবে।
                --}}
                <input type="file"
                       name="profile_dark_img"
                       class="dropify"
                       data-default-file="{{ asset($hero->profile_dark_img) }}">
            </div>



            <div class="col-md-4">

                <label>Light Background Image</label><br>

                {{--
                    Light Mode-এর জন্য Background/Profile Image Upload।

                    Database-এর বর্তমান Image Preview হিসেবে দেখানো হবে।
                --}}
                <input type="file"
                       name="profile_light_img"
                       class="dropify"
                       data-default-file="{{ asset($hero->profile_light_img) }}">
            </div>

        </div>



        {{--
            Form Submit Button

            Button-এ Click করলে Form-এর সব তথ্য Controller-এর
            update() Method-এ পাঠানো হবে।
        --}}
        <button class="btn btn-primary"> Update Hero </button>

    </form>

</div>

    </div>
@endsection






@push('scripts')
    <script>
        $('.dropify').dropify();
        // dropify class থাকা সব file input-এ Dropify plugin চালু করা হচ্ছে।

        $('#description').summernote({
            // id="description" থাকা textarea-কে Summernote Rich Text Editor-এ রূপান্তর করা হচ্ছে।

            height: 200
            // Summernote Rich Text Editor-এর উচ্চতা ২০০ pixel নির্ধারণ করা হয়েছে।
        });
    </script>
@endpush
{{--  ```

**ব্যাখ্যা:**

* `@push('scripts')` → এই JavaScript কোডগুলো `scripts` স্ট্যাকে যোগ করে। পরে `@stack('scripts')` যেখানে থাকবে, সেখানে এগুলো লোড হবে।
* `$('.dropify').dropify();` → Dropify প্লাগইন চালু করে, ফলে সাধারণ file input আরও সুন্দর UI পায়।
* `$('#description').summernote({...});` → `description` আইডির `<textarea>`-কে Summernote Rich Text Editor বানায়।
* `height: 200` → Summernote এডিটরের উচ্চতা ২০০ পিক্সেল সেট করে।
* `@endpush` → `@push` ব্লকের সমাপ্তি নির্দেশ করে।  --}}

