// <!-- Show dynamic validation errors -->





$(document).ready(function () {
    //01. block : 01
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    //01. block : 02  // sweet alert for delete
    $('body').on('click', '.delete-item', function (e) {
        // block : 2.01
        e.preventDefault();
        let form = $(this).closest('form');
        let deleteUrl = form.attr('action');


        // block : 2.2
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonColor: '#d33'
        })


        // block : 2.3
        .then((result) => {

            if (result.isConfirmed) {
                $.ajax({


                    // part :1
                    type: 'DELETE',
                    url: deleteUrl,
                    data: { _token: "{{ csrf_token() }}" },


                    // part :2
                    success: function (data) {

                        if (data.status == 'error') {

                            Swal.fire(
                                'You can not delete!',
                                'This category contain items cannot be deleted!',
                                'error'
                            )


                        }

                        else {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            window.location.reload();
                        }
                    },


                    // block : 3
                    error: function (xhr, status, error) {

                        console.log(xhr.status);
                        console.log(xhr.responseText);

                    }
                })
            }
        })
    })
})

