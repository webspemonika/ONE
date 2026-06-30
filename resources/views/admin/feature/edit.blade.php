@extends('layout.admin')

@section('content')

<div class="mx-auto col-md-8 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Edit Feature</h4>

            <form action="{{ route('admin.feature.update', $feature->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                @include('admin.feature.partials.form')

                <div class="mt-3">
                    <button type="submit" class="btn btn-warning">
                        <i class="fa-solid fa-pen"></i>
                        Update Feature
                    </button>

                    <a href="{{ route('admin.feature.index') }}" class="btn btn-secondary">
                        Cancel
                    </a>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection


@push('scripts')
<script>
    $('.dropify').dropify();

    $('#description').summernote({
        height: 200
    });
</script>
@endpush
