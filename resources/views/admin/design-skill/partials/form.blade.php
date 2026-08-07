<div class="row">

    {{-- Technology Name --}}
    <div class="mb-3 col-md-6">
        <label class="form-label">Technology Name <span class="text-danger">*</span></label>


        <input
            type="text"
            name="tech_name"
            value="{{ old('tech_name', $designSkill->tech_name ?? '') }}"
            placeholder="Enter Technology Name"
            class="form-control @error('tech_name') is-invalid @enderror"
        >



        @error('tech_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror



    </div>

    {{-- Technology Percentage --}}
    <div class="mb-3 col-md-6">
        <label class="form-label">Technology Percentage <span class="text-danger">*</span></label>

        <input
            type="number"
            min="0"
            max="100"
            name="tech_percent"
            value="{{ old('tech_percent', $designSkill->tech_percent ?? '') }}"
            placeholder="Enter Percentage"
            class="form-control @error('tech_percent') is-invalid @enderror"
        >

        @error('tech_percent')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

    </div>

</div>


{{--  buttons   --}}
<div class="mt-3">


    {{--   save button --}}
    <button
        type="submit"
        class="btn btn-primary"
    >
        <i class="fa-solid fa-floppy-disk me-1"></i>
        Save
    </button>


    {{--   cancel button --}}
    <a
        href="{{ route('admin.design-skill.index') }}"
        class="btn btn-secondary"
    >
        Cancel
    </a>


</div>
