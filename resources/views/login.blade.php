<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - Blog</title>
</head>
<body>

    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="bg-blue p-2 rounded mb-2" style="background-color: #7852b2">
                    <p class="text-white text-center mb-0">Login Page</p>
                </div>
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label>Alamat Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <button class="btn btn-login btn-block btn-success">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".btn-login").click( function() {
                var email = $("#email").val();
                var password = $("#password").val();
                var token = $("meta[name='csrf-token']").attr("content");

                if(email.length == "") {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Alamat Email Wajib Diisi!'
                    });

                } else if(password.length == "") {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Password Wajib Diisi!'
                    });

                } else {

                    $.ajax({

                        url: "{{ route('auth.post') }}",
                        type: "POST",
                        dataType: "JSON",
                        cache: false,
                        data: {
                            "email": email,
                            "password": password,
                            "_token": token
                        },

                        success: (response) => {
                            if (response.success) {

                                Swal.fire({
                                    type: 'success',
                                    title: 'Login Berhasil!',
                                    text: 'Anda akan di arahkan dalam 3 Detik',
                                    timer: 3000,
                                    showCancelButton: false,
                                    showConfirmButton: false
                                })
                                    .then (function() {
                                        window.location.href = "{{ route('post.index') }}";
                                    });

                            }
                        },

                        error: (response) => {
                            Swal.fire({
                                type: 'error',
                                title: 'Login Gagal!',
                                text: 'silahkan coba lagi!'
                            });
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>