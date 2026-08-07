<div class="">


    <div class="">

        <label class="form-label"> Typewritter Text <span class="text-danger"> * </span> </label>
        <input
            type="text"
            name='typewriter_text'
            value="{{ old('typewriter_text' , $typeWriter->typewriter_text ?? '') }}"
            {{--  value="{{ old('tech_percent', $designSkill->tech_percent ?? '') }}"  --}}
            placeholder='Enter TypeWritter Text ..'
            class='form-control @error('typewriter_text') is-invalid @enderror'
        >


        @error('typewriter_text')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror


    </div>



    {{--  buttons   --}}
    <div class="mt-5 ">
        <button
            type='submit'
            class="btn btn-primary"
        >
          <i class="fa-solid fa-floppy-disk me-1"></i>
            Save
        </button>

        {{--  cancel button  --}}
        <a
            href="{{ route('admin.type-writer.index') }}"
            class="btn btn-secondary "
        >
            cancel
        </a>
    </div>

</div>
