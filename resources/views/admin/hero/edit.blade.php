@extends('layout.admin')

@section('content')
<div class="card">

    <div class="card-header">
        <h4 class="card-title">Update Hero Section</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.hero.update')}}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3 form-group">
                <label>Greeting Text</label>
                <input type="text"
                       name="greeting_text"
                       class="form-control"
                       value="{{ old('greeting_text', $hero->greeting_text) }}">
            </div>

            <div class="mb-3 form-group">
                <label>Title</label>
                <input type="text"
                       name="title"
                       class="form-control"
                       value="{{ old('title', $hero->title) }}">
            </div>

            <div class="mb-3 form-group">
                <label>Description</label>
                <textarea name="description"
                          rows="5"
                          class="form-control">{{ old('description', $hero->description) }}</textarea>
            </div>

            <div class="mb-3 form-group">
                <label>Hero Image</label><br>
@if($hero->hero_img)
    <img src="{{ asset($hero->hero_img) }}" width="120">
@endif

                <input type="file"
                       name="hero_img"
                       class="form-control">
            </div>

            <div class="mb-3 form-group">
                <label>Profile Dark Image</label><br>

                <img src="{{ asset($hero->profile_dark_img) }}"
                     width="120"
                     class="mb-2">

                <input type="file"
                       name="profile_dark_img"
                       class="form-control">
            </div>

            <div class="mb-3 form-group">
                <label>Profile Light Image</label><br>

                <img src="{{ asset($hero->profile_light_img) }}"
                     width="120"
                     class="mb-2">

                <input type="file"
                       name="profile_light_img"
                       class="form-control">
            </div>

            <button class="btn btn-primary">
                Update Hero
            </button>

        </form>

    </div>

</div>
@endsection
