@extends('layout.admin')


@section('content')
    <div class="card">


        <div class="card-header">

            <div class="d-flex justify-content-between align-items-center ">


                <h4 class="mb-0 card-title"> All TypeWriter </h4>

                <a
                    href="{{ route('admin.type-writer.create') }}"
                    class=" btn btn-success"
                >
                    <i class="mr-2 fa-solid fa-plus"></i>
                    Add Type Writer
                </a>


            </div>


        </div>



        <div class="card-body">
            <div class="table-responsive">

                <table class="table align-middle table-bordered table-hover">


                    <thead>

                        <tr>

                            <td> SL No </td>

                            <td> Typewritter Text </td>

                            <td> Actions</td>

                        </tr>

                    </thead>



                    <tbody>

                        @forelse ($typewriter as $item)
                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td> {{ $item->typewriter_text }}</td>

                                <td>
                                    <a href="{{ route('admin.type-writer.edit', $item->id) }}">
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('admin.type-writer.destroy', $item->id) }}"
                                        method="POST"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="button"
                                            class="btn btn-danger delete-item"
                                        >
                                            Delete
                                        </button>
                                    </form>

                                </td>




                            </tr>

                            {{--  empty   --}}
                            @empty
                                <tr>
                                    <td
                                        colspan="4"
                                        class="text-center text-primary "
                                    >
                                        No Data Found
                                    </td>
                                </tr>

                                {{--    --}}
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

                e.preventDefault(); // 1

                let form = $(this).closest('form'); // 2

                Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "Cancel"
                    }) // 3
                    .then((result) => {

                        if (result.isConfirmed) {

                            Swal.fire({
                                    title: "Deleted!",
                                    text: "Your item has been deleted.",
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


    <tbody>

    {{--  @foreach ($typewriter as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>

            <td>{{ $item->typewriter_text }}</td>

            <td>
                <a href="{{ route('admin.type-writer.edit', $item->id) }}">
                    Edit
                </a>

                <form
                    action="{{ route('admin.type-writer.destroy', $item->id) }}"
                    method="POST"
                >
                    @csrf
                    @method('DELETE')

                    <button
                        type="button"
                        class="btn btn-danger delete-item"
                    >
                        Delete
                    </button>
                </form>
            </td>
        </tr>
    @endforeach

    @if ($typewriter->isEmpty())
        <tr>
            <td colspan="4" class="text-center text-primary">
                No Data Found
            </td>
        </tr>
    @endif

</tbody>  --}}
