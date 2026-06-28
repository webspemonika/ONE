$(document).ready(function () {

    // CSRF Token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Delete Confirmation
    $('body').on('click', '.delete-item', function (e) {

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

                    success: function (data) {

                        if (data.status === 'error') {

                            Swal.fire(
                                'Error!',
                                'This item cannot be deleted.',
                                'error'
                            );

                        } else {

                            Swal.fire(
                                'Deleted!',
                                'Item deleted successfully.',
                                'success'
                            ).then(() => {
                                location.reload();
                            });

                        }

                    },

                    error: function (xhr) {

                        Swal.fire(
                            'Error!',
                            'Something went wrong.',
                            'error'
                        );

                        console.log(xhr);

                    }

                });

            }

        });

    });

});
