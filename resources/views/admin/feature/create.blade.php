@extends('layout.admin')

@section('content')

<div class="mx-auto col-md-8 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Create New Feature</h4>

            <form action="{{ route('admin.feature.store') }}"
                  method="POST"
                  enctype="multipart/form-data" 
            >

                @csrf

                @include('admin.feature.partials.form')

                <button class="btn btn-primary">
                    <i class="mr-2 fa-solid fa-floppy-disk"></i>
                    Save Feature
                </button>

            </form>

        </div>
    </div>
</div>

@endsection









