// console.log('custom.js loaded');
// typeof Swal
$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('body').on('click', '.delete-item', function (e) {
        e.preventDefault();


        let form = $(this).closest('form');
        let deleteUrl = form.attr('action');
        // console.log(form);
        // console.log(deleteUrl);

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
                                'You can not delete!',
                                data.message,
                                'error'
                            );

                        } else {

                            Swal.fire(
                                'Deleted!',
                                data.message,
                                'success'
                            ).then(() => {
                                window.location.reload();
                            });

                        }

                    },

                    error: function (xhr) {

                        Swal.fire(
                            'Error!',
                            'Something went wrong.',
                            'error'
                        );

                        console.log(xhr.responseText);

                    }

                });

            }

        });

    });

});
