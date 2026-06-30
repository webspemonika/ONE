<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CelestialUI Admin</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/typicons.font/font/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    {{--  custom css  --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    {{--  font awesome   --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    {{--  summer note  --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs4.min.css" rel="stylesheet">
    {{--  dropify    --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">

    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ 'assets/images/favicon.png' }}" />
    {{--  YAJRA DATA TABLE  --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    {{--  TOASTR  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


</head>

<body>


    <div class="container-scroller">

        @include('layout.partials.settings')

        @include('layout.partials.header')

        <div class="container-fluid page-body-wrapper">

            @include('layout.partials.sidebar')

            <div class="main-panel">

                <div class="content-wrapper">

                    @yield('content')

                </div>

                @include('layout.partials.footer')

            </div>

        </div>

        <!-- container-scroller -->
        <!-- base:js -->
        <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>

        {{--  <!-- Summernote -->  --}}
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs4.min.js"></script>

        {{--  <!-- Dropify -->  --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

        <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
        <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
        <script src="{{ asset('assets/js/template.js') }}"></script>
        <script src="{{ asset('assets/js/settings.js') }}"></script>
        <script src="{{ asset('assets/js/todolist.js') }}"></script>
        <!-- endinject -->
        <!-- plugin js for this page -->
        <script src="{{ asset('assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
        <!-- End plugin js for this page -->
        <!-- Custom js for this page-->
        <script src="{{ asset('assets/js/file-upload.js') }}"></script>
        <script src="{{ asset('assets/js/typeahead.js') }}"></script>
        <script src="{{ asset('assets/js/select2.js') }}"></script>
        <!-- End custom js for this page-->

        {{--  YAJRA DATA TABLE  --}}
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

        {{--  SWEETALERT   --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{--  TOASTR  --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        {{--  CUSTOM JS  --}}
        <script src="{{ asset('assets/js/custom-js/delete-confirm.js') }}"></script>
        {{--    --}}
        {{--  <!-- Show dynamic validation errors -->  --}}
        <script>
            @if (!empty($errors->all()))
                @foreach ($errors->all() as $error)
                    toastr.error("{{ $error }}", )
                @endforeach
            @endif
        </script>
   <script>
toastr.options = {
    "closeButton": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "timeOut": "3000"
};

@if(session('success'))
    toastr.success("{{ session('success') }}");
@endif

@if(session('error'))
    toastr.error("{{ session('error') }}");
@endif

@if(session('warning'))
    toastr.warning("{{ session('warning') }}");
@endif

@if(session('info'))
    toastr.info("{{ session('info') }}");
@endif

@if($errors->any())
    @foreach($errors->all() as $error)
        toastr.error("{{ $error }}");
    @endforeach
@endif
</script>
        {{--    --}}
        <script>
            $(document).ready(function() {
                // Csrf token
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // sweet alert for delete
                $('body').on('click', '.delete-item', function(e) {
                    e.preventDefault();
                    let deleteUrl = $(this).attr('href');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: 'DELETE',
                                url: deleteUrl,
                                data: {
                                    _token: "{{ csrf_token() }}"
                                },
                                success: function(data) {
                                    if (data.status == 'error') {
                                        Swal.fire(
                                            'You can not delete!',
                                            'This category contain items cant be deleted!',
                                            'error'
                                        )
                                    } else {
                                        Swal.fire(
                                            'Deleted!',
                                            'Your file has been deleted.',
                                            'success'
                                        )
                                        window.location.reload();
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.log(error);
                                }
                            })
                        }
                    })
                })
            })
        </script>
        @stack('scripts')






</body>

</html>
