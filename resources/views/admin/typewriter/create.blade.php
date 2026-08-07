@extends('layout.admin')


@section('content')
    <div class="card">


        <div class="card-header">
            <h4 class="card-title"> Create Type Writer </h4>
        </div>


        <div class="card-body">

            <form
                action="{{ route('admin.type-writer.store') }}"
                method="POST"
            >
                @csrf

                @include('admin.typewriter.partials.form')

            </form>


        </div>


    </div>
@endsection
