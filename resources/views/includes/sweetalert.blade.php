<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script>
    function changeUserStatus(id, status) {

        Swal.fire({
            title: "Are you sure do you really want to perform this action?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes continue",
            showLoaderOnConfirm: true,
        }).then((result) => {
            if (result.isConfirmed) {
                $.get('/admin/donor/changeUserStatus/' + id + '?status=' + status + ' ');
                Swal.fire({
                    title: "Success!",
                    text: "Status has been changed.",
                    icon: "success"
                });

                window.location.reload();
            }
        });
    }

    function changeBankStatus(id, status) {

        Swal.fire({
            title: "Are you sure do you really want to perform this action?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes continue",
            showLoaderOnConfirm: true,
        }).then((result) => {
            if (result.isConfirmed) {
                $.get('/admin/donor/changeBankStatus/' + id + '?status=' + status + ' ');
                Swal.fire({
                    title: "Success!",
                    text: "Status has been changed.",
                    icon: "success"
                });

                window.location.reload();
            }
        });
    }


    function changeCampaignStatus(id, status){
        Swal.fire({
            title: "Are you sure do you really want to perform this action?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes continue",
            showLoaderOnConfirm: true,
        }).then((result) => {
            if (result.isConfirmed) {
                $.get('/collector/campaign/changeCampaignStatus/' + id + '?status=' + status + ' ');
                Swal.fire({
                    title: "Success!",
                    text: "Status has been changed.",
                    icon: "success"
                });

                window.location.reload();
            }
        });
    }
    // sweetAlertInitialize();
    @if (session('success'))
        Swal.fire({
            title: 'Success',
            icon: 'success',
            text: "{{ session('Success') }}",
        })
    @endif

    @if (session('error'))
        Swal.fire({
            title: 'Error',
            icon: 'error',
            text: "{{ session('error') }}",
        })
    @endif

    @if (session('warning'))
        Swal.fire({
            title: 'Warning',
            icon: 'warning',
            text: "{{ session('warning') }}",
        })
    @endif

    @if (session('info'))
        Swal.fire({
            title: 'Info',
            icon: 'info',
            text: "{{ session('info') }}",
        })
    @endif
</script>
