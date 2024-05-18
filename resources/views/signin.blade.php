<!DOCTYPE html>
<!--
  HOW TO USE:
  data-layout: fluid (default), boxed
  data-sidebar-theme: dark (default), colored, light
  data-sidebar-position: left (default), right
  data-sidebar-behavior: sticky (default), fixed, compact
-->
<html lang="en" data-bs-theme="light" data-layout="fluid" data-sidebar-theme="light" data-sidebar-position="left"
    data-sidebar-behavior="sticky">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 5 Admin &amp; Dashboard Template">
    <meta name="author" content="Bootlab">

    <title>Sign In | AppStack - Bootstrap 5 Admin &amp; Dashboard Template</title>

    <link rel="canonical" href="https://appstack.bootlab.io/auth-sign-in.html" />
    <link rel="shortcut icon" href="img/favicon.ico">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

    <link href="{{ url('appstack/css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div class="auth-full-page d-flex">
        <div class="auth-form p-3">

            <div class="text-center">
                <h1 class="h2">Welcome back!</h1>
                <p class="lead">
                    Sign in to your account to continue
                </p>
            </div>

            <div class="mb-3">
              
                <div class="row">
                    <div class="col">
                        <hr>
                    </div>
                </div>
                <form>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input class="form-control form-control-lg" type="email" name="email"
                            placeholder="Enter your email" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input class="form-control form-control-lg" type="password" name="password"
                            placeholder="Enter your password" />
                        <small>
                            <a href="auth-reset-password.html">Forgot password?</a>
                        </small>
                    </div>
                    <div>
                        <div class="form-check align-items-center">
                            <input id="customControlInline" type="checkbox" class="form-check-input" value="remember-me"
                                name="remember-me" checked>
                            <label class="form-check-label text-small" for="customControlInline">Remember me</label>
                        </div>
                    </div>
                    <div class="d-grid gap-2 mt-3">
                        <a href="dashboard-default.html" class="btn btn-lg btn-primary">Sign in</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="js/app.js"></script>

</body>

</html>
