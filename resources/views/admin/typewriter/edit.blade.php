@extends('layout.admin')

@section('content')
    <div class="card">



        <div class="card-header">


            <h4>Edit Typewriter</h4>


        </div>


    </div>


    <div class="card-body">
        <form
            action="{{ route('admin.type-writer.update', $typeWriter->id) }}"
            method='POST'
        >
            @csrf

            @method('PUT')

            @include('admin.typewriter.partials.form')

        </form>
    </div>
@endsection
