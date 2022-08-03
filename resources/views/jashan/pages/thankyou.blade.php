

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Payment Successful</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
      .swal-overlay {
  background-color: rgba(43, 165, 137, 0.45);
}
.swal2-styled.swal2-confirm {
    display:none ! important;
}
  </style>
</head>
<body>
  
    <script>
    

    Swal.fire({
        title: 'Payment Successful',
        icon: 'success',
        text: 'Please check your email for order details , you will be redirected to home page Soon',
        
        // toast: true,
        // position: 'top-right',
        timer: 10000,
        // showConfirmButton: false,
         timerProgressBar: true,
         allowOutsideClick: false,
         
    })
    
    setTimeout(function(){
            window.location.href = "{{url('/')}}";
         }, 10000);
 
    </script>

</body>
</html>

