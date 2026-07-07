@extends('layout.admin')

@section('content')
    <div class="card">

        <div class="card-header">
            <h4 class="card-title">Update Eduction Section's Header  </h4>
        </div>

        <div class="card-body">
<form action="{{ route('admin.education-header.update',1) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3 form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control"
            value="{{ old('title', $educationHeader->title ?? '') }}">
    </div>

    <div class="mb-3 form-group">
        <label>Heading</label>
        <input type="text" name="heading" class="form-control"
            value="{{ old('heading', $educationHeader->heading ?? '') }}">
    </div>

    <div class="mb-3 form-group">
        <label>Description</label>
        <textarea name="description" rows="5" class="form-control">{{ old('description', $educationHeader->description ?? '') }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">
        Update Education Header
    </button>
</form>

        </div>

    </div>
@endsection
