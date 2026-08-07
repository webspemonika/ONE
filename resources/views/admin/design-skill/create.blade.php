@extends('layout.admin')

@section('content')


    <div class="card">


        <div class="card-header">
            <h4 class="card-title">Create Design Skill</h4>
        </div>



        <div class="card-body">
            <form
                action="{{ route('admin.design-skill.store') }}"
                method="POST"
            >
                @csrf
                @include('admin.design-skill.partials.form')


            </form>


        </div>

    </div>


@endsection
