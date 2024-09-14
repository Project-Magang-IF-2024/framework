<head>
    <meta http-equiv="refresh" content="2;url=<?php echo base_url() ?>dashboard" />
    <body>
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
       <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
        <script>
      Swal.fire({
                 title: 'Login Success',
                    text: 'Redirecting...',
                    icon: 'success',
                    timer: 2000,
                    showCancelButton: false, // There won't be any cancel button
showConfirmButton: false // There won't be any confirm button
            })
            .then(() => {
    dispatch(redirect('<?php echo base_url() ?>dashboard'));
})
        </script>
    </body>
</head>