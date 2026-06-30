// <!-- Show dynamic validation errors -->





$(document).ready(function () {
    // Csrf token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // sweet alert for delete
    $('body').on('click', '.delete-item', function (e) {
        e.preventDefault();
        let form = $(this).closest('form');
        let deleteUrl = form.attr('action');

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
                    data: { _token: "{{ csrf_token() }}" },
                    success: function (data) {
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
                    error: function (xhr, status, error) {

                        console.log(xhr.status);
                        console.log(xhr.responseText);

                    }
                })
            }
        })
    })
})

