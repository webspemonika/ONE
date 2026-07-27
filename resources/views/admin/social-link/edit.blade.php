@extends('layout.admin')

@section('content')
    <div class="card">

        <div class="card-header">
            <h4 class="card-title">Update Social Links</h4>
        </div>

        <div class="card-body">
            <form
                action="{{ $socialLink->exists ? route('admin.social-link.update', $socialLink) : route('admin.social-link.store') }}"
                method="POST"
            >

                @csrf
                @if ($socialLink->exists)
                    @method('PUT')
                @endif

                {{-- Title --}}
                <div class="mb-3 form-group">
                    <label>Title</label>
                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        value="{{ old('title', $socialLink->title) }}"
                    >
                </div>

                {{-- Facebook --}}
                <div class="mb-3 form-group">
                    <label>Facebook URL</label>
                    <input
                        type="text"
                        name="facebook_url"
                        class="form-control"
                        value="{{ old('facebook', $socialLink->facebook_url) }}"
                    >
                </div>

                {{-- Whatsapp --}}
                <div class="mb-3 form-group">
                    <label>Whatsapp URL</label>
                    <input
                        type="text"
                        name="whatsapp_url"
                        class="form-control"
                        value="{{ old('whatsapp', $socialLink->whatsapp_url) }}"
                    >
                </div>

                {{-- Linkedin --}}
                <div class="mb-3 form-group">
                    <label>Linkedin URL</label>
                    <input
                        type="text"
                        name="linkedin_url"
                        class="form-control"
                        value="{{ old('linkedin', $socialLink->linkedin_url) }}"
                    >
                </div>

                {{-- Github --}}
                <div class="mb-3 form-group">
                    <label>Github URL</label>
                    <input
                        type="text"
                        name="github_url"
                        class="form-control"
                        value="{{ old('github', $socialLink->github_url) }}"
                    >
                </div>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Update Social Link
                </button>

            </form>
        </div>

    </div>
@endsection
