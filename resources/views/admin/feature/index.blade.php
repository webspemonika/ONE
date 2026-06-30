@extends('layout.admin')

@section('content')
    <div class="card">

        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0 card-title">All Features</h4>

                <a href="{{ route('admin.feature.create') }}" class="btn btn-success">
                    <i class="fa-solid fa-plus me-1"></i>
                    Add Feature
                </a>


            </div>
        </div>

        <div class="card-body">
            <div class="">
                {{ $dataTable->table() }}
            </div>


        </div>

    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
