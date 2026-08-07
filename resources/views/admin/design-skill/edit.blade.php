@extends('layout.admin')


@section('content')
    <div class="card">


        <div class="card-header">
            <h4 class="card-title">Edit Design Skill</h4>
        </div>


        <div class="card-body">


            <form
                action="{{ route('admin.design-skill.update', $designSkill->id) }}"
                method="POST"
            >
                @csrf
                @method('PUT')

                @include('admin.design-skill.partials.form')


            </form>


        </div>

    </div>
@endsection
