<div class="form-group row">
    <label class="col-sm-2 col-form-label">
        Title
    </label>

    <div class="col-sm-10">
        <input type="text" name="feature_title" class="form-control"
            value="{{ old('feature_title', isset($feature) ? $feature->feature_title : '') }}"
            placeholder="Feature Title">

        @error('feature_title')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label class="col-sm-2 col-form-label">
        Description
    </label>

    <div class="col-sm-10">

        <textarea id="feature-description" name="feature_description">{{ old('feature_description', isset($feature) ? $feature->feature_description : '') }}</textarea>
        @error('feature_description')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label class="col-sm-2 col-form-label">
        Feature Icon
    </label>

    <div class="col-sm-3">

        <input type="file"
               name="feature_icon"
               class="dropify"
               @isset($feature)
               data-default-file="{{ asset($feature->feature_icon) }}"
               @endisset
               data-max-file-size="2M"
               data-allowed-file-extensions="jpg jpeg png webp svg"
        >

        @error('feature_icon')
            <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {

            $('.dropify').dropify();

            $('#feature-description').summernote({
                height: 100,
                placeholder: 'Write feature description'
            });

        });
    </script>
@endpush
