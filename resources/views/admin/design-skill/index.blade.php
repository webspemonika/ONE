@extends('layout.admin')

@section('content')
    <div class="card">

        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">


                <h4 class="mb-0 card-title">All Design Skills</h4>


                <a
                    href="{{ route('admin.design-skill.create') }}"
                    class="btn btn-success"
                >
                    <i class="fa-solid fa-plus me-1"></i>
                    Add Design Skill
                </a>


            </div>


        </div>



        <div class="card-body">


            <div class="table-responsive">


                <table class="table align-middle table-bordered table-hover">


                    <thead>

                        <tr>
                            <th width="70">SL</th>
                            <th>Technology Name</th>
                            <th> Technology Percentage</th>
                            <th width="180">Action</th>
                        </tr>

                    </thead>


                    <tbody>

                        @forelse($designSkills as $key => $designSkill)
                            <tr>
                                <td>{{ $key + 1 }}</td>

                                <td>{{ $designSkill->tech_name }}</td>

                                <td>{{ $designSkill->tech_percent }}%</td>

                                <td>
                                    {{--  edit button   --}}
                                    <a
                                        href="{{ route('admin.design-skill.edit', $designSkill->id) }}"
                                        class="btn btn-primary btn-sm"
                                    >
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>



                                    {{--  delete button   --}}

                                    <form
                                        action="{{ route('admin.design-skill.destroy', $designSkill->id) }}"
                                        method="POST"
                                        class="d-inline delete-form"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="button"
                                            class="btn btn-danger btn-sm delete-item"
                                        >
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="4"
                                    class="text-center"
                                >

                                    No Data Found

                                </td>

                            </tr>
                        @endforelse


                    </tbody>


                </table>


            </div>


        </div>


    </div>
@endsection


@push('scripts')
    <script>
        $('body').on('click', '.delete-item', function(e) {
            e.preventDefault();

            let form = $(this).closest('form');


            Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    confirmButtonText: "Yes, delete it!"
                    icon: "warning",
                    showCancelButton: true,


                })


                .then((result) => {

                    if (result.isConfirmed) {

                        Swal.fire({
                                title: "Deleted!555555555555",
                                text: "Your file has been deleted.",
                                icon: "success"


                            })
                            .then(() => {
                                form.submit();
                            });

                    }

                });
        });
    </script>
@endpush
