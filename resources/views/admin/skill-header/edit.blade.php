@extends('layout.admin')

@section('content')
<div class="card">

    <div class="card-header">
        <h4 class="card-title">Update Skill Header</h4>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.skill-header.update', $skillHeader->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3 form-group">
                <label>Title</label>
                <input
                    type="text"
                    name="title"
                    class="form-control"
                    value="{{ old('title', $skillHeader->title) }}"
                >
            </div>

            <div class="mb-3 form-group">
                <label>Heading</label>
                <input
                    type="text"
                    name="heading"
                    class="form-control"
                    value="{{ old('heading', $skillHeader->heading) }}"
                >
            </div>

            <div class="mb-3 form-group">
                <label>Description</label>
                <textarea
                    name="description"
                    class="form-control"
                    rows="4"
                >{{ old('description', $skillHeader->description) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                Update Skill Header
            </button>

        </form>
    </div>

</div>
@endsection
