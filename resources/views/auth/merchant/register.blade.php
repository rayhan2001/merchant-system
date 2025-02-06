<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Merchant Register</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<style>
    .cardbody-color {
        background-color: #ebf2fa;
        border-radius: 25px;
    }

    a {
        text-decoration: none;
    }
</style>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card my-5 border-0">
                    <form id="loginForm" class="card-body cardbody-color p-lg-5">
                        <div class="text-center">
                            <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png"
                                class="img-fluid img-thumbnail rounded-circle my-3" width="200px" alt="profile">
                        </div>

                        <div class="mb-3">
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Enter your name">
                            <span class="text-danger" id="name-error"></span>
                        </div>

                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="Enter your email">
                            <span class="text-danger" id="email-error"></span>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="shop_name" class="form-control" id="shop_name"
                                placeholder="Enter your shop name">
                            <span class="text-danger" id="shop-name-error"></span>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Enter password">
                            <span class="text-danger" id="password-error"></span>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-danger submitBtn px-5 mb-5 w-100">Register</button>
                        </div>

                        <div class="form-text text-center mb-5 text-dark">Already Registered?
                            <a href="{{ route('merchant.login') }}" class="text-dark fw-bold">Login</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#loginForm").on("submit", function(e) {
                e.preventDefault();
                $(".submitBtn").attr("disabled", true).html("Processing...");

                var data = {
                    _token: $('meta[name="csrf-token"]').attr("content"),
                    name: $("#name").val(),
                    email: $("#email").val(),
                    shop_name: $("#shop_name").val(),
                    password: $("#password").val(),
                };

                $.ajax({
                    type: "POST",
                    url: "{{ route('merchant.register.submit') }}",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        toastr.success("Registration successful");
                        setTimeout(() => {
                            window.location.href = "/merchant/login";
                        }, 1000);
                    },
                    error: function(xhr) {
                        $(".submitBtn").attr("disabled", false).html("Register");

                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            $("#name-error").text(errors?.name ? errors.name[0] : "");
                            $("#email-error").text(errors?.email ? errors.email[0] : "");
                            $("#shop-name-error").text(errors?.shop_name ? errors.shop_name[0] : "");
                            $("#password-error").text(errors?.password ? errors.password[0] : "");
                        } else {
                            toastr.error("Something went wrong. Please try again.");
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>
