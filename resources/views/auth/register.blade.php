<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Halaman Register</title>

    <link href="{{url('assets/plugins/notifications/css/lobibox.min.css')}}" rel="stylesheet" />
    <!-- Icons -->
    <link rel="shortcut icon" href="{{url('assets/media/favicons/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{url('assets/media/favicons/favicon-192x192.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{url('assets/media/favicons/apple-touch-icon-180x180.png')}}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <link rel="stylesheet" id="css-main" href="{{url('assets/css/codebase.min.css')}}">
</head>
<body>
<div id="page-container" class="main-content-boxed">
    <main id="main-container">
        <div class="bg-image" style="background-image: url('assets/3094352.jpg');">
            <div class="row mx-0 bg-black-50">
                <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
                    <div class="p-4">
                        <p class="fs-3 fw-semibold text-white">
                            Halaman Register
                        </p>
                        <p class="text-white-75 fw-medium">
                            Copyright &copy; <span data-toggle="year-copy"></span>
                        </p>
                    </div>
                </div>
                <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-body-extra-light">
                    <div class="content content-full">
                        <!-- Header -->
                        <div class="px-4 py-2 mb-4">
                            <a class="link-fx fw-bold" href="#">
                                <i class="fa fa-fire"></i>
                                <span class="fs-4 text-body-color">Halaman</span><span class="fs-4">Register</span>
                            </a>
                            <h1 class="h3 fw-bold mt-4 mb-2">Welcome to Registration</h1>
                            <h2 class="h5 fw-medium text-muted mb-0">Please sign up</h2>
                        </div>
                        <!-- END Header -->

                        <!-- Register Form -->
                        <form action="{{ route('register') }}" class="js-validation-register px-4" method="POST">
                            @csrf
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name"
                                       id="name" tabindex="1" value="{{ old('name') }}" required autocomplete="name" placeholder="Your Name" aria-label="Your Name">
                                <span class="invalid-feedback">Please enter your name.</span>
                                @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <label class="form-label" for="name">Name</label>
                            </div>

                            <div class="form-floating mb-4">
                                <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
                                       id="email" tabindex="2" value="{{ old('email') }}" required autocomplete="email" placeholder="email@address.com" aria-label="email@address.com">
                                <span class="invalid-feedback">Please enter a valid email address.</span>
                                @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <label class="form-label" for="email">Email</label>
                            </div>

                            <div class="form-floating mb-4">
                                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" id="password" placeholder="8+ characters required" aria-label="8+ characters required" required autocomplete="new-password" minlength="8" >
                                <span class="invalid-feedback">Please enter a valid password.</span>
                                @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <label class="form-label" for="password">Password</label>
                            </div>

                            <div class="form-floating mb-4">
                                <input type="password" class="form-control form-control-lg" name="password_confirmation" id="password-confirm" placeholder="Confirm Password" aria-label="Confirm Password" required autocomplete="new-password" minlength="8">
                                <span class="invalid-feedback">Please confirm your password.</span>
                                <label class="form-label" for="password-confirm">Confirm Password</label>
                            </div>

                            <!-- Input Level (tersembunyi) -->
                            <input type="hidden" name="level" value="pengguna">

                            <div class="mb-4">
                                <button type="submit" class="btn btn-lg btn-alt-primary fw-semibold">
                                    Register
                                </button>
                            </div>
                        </form>
                        <!-- END Register Form -->
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Codebase JS -->
<script src="{{url('assets/js/codebase.app.min.js')}}"></script>

<!-- jQuery (required for Select2 + jQuery Validation plugins) -->
<script src="{{url('assets/js/lib/jquery.min.js')}}"></script>

<!-- Page JS Plugins -->
<script src="{{url('assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>

<!-- Page JS Code -->
<script src="{{url('assets/js/pages/op_auth_register.min.js')}}"></script>
<script src="{{url('assets/plugins/notifications/js/lobibox.min.js')}}"></script>
<script src="{{url('assets/plugins/notifications/js/notifications.min.js')}}"></script>

<script>
    @if (Session::has('success'))
        Lobibox.notify('success', {
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'top right',
            icon: 'bi bi-bookmark-check-fill',
            msg: "{{ Session::get('success')}}"
        });
    @endif
</script>
<script>
    @if ($message = Session::get('error'))
    Lobibox.notify('error', {
        pauseDelayOnHover: true,
        continueDelayOnInactiveTab: false,
        position: 'top right',
        icon: 'bi bi-bookmark-x',
        msg: "{{ Session::get('error')}}"
    });
    @endif
</script>
</body>
</html>
