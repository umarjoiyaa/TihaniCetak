<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>TIHANI CETAK LOGIN</title>
    <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/img/tihani.png') }}" rel="shortcut icon" />
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-4">
                    <div class="form-input-content">
                        <div class="card login-form mb-0 mt-5">
                            <div class="card-body pb-0">
                                <div class="box">
                                    <div class="upper">
                                        <img src="{{ asset('assets/img/tihani.png') }}" style="width:50px; margin-right:5px;" alt="">
                                        <div>
                                            <h1>TIHANI CETAK</h1>
                                            <p>PENCETAK PILIHAN RAMAI YANG DIPERCAYAI</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="hed">
                                    <h1>LOGIN</h1>
                                </div>
                                <hr>
                                <form class="login-input" action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <div class="d-flex">
                                            <span class="input-group-text" style="cursor: pointer;"><iconify-icon
                                                    icon="fa:eye-slash" id="togglePassword" style="color: black;"
                                                    width="20" height="20"></iconify-icon></span>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password">
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" id="btn"
                                        class="btn btn-block">LOGIN <iconify-icon icon="gridicons:arrow-right"></iconify-icon></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="{{ asset('assets/js/iconify-icon.min.js') }}"></script>
    <script>
        const togglePassword = document
            .querySelector('#togglePassword');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', () => {
            // Toggle the type attribute using
            // getAttribure() method
            const type = password
                .getAttribute('type') === 'password' ?
                'text' : 'password';
            password.setAttribute('type', type);
            if (password.getAttribute('type') === 'password') {
                // Toggle the eye and bi-eye icon
                togglePassword.setAttribute('icon', 'fa:eye-slash');
            } else if (password.getAttribute('type') === 'text') {
                // Toggle the eye and bi-eye icon
                togglePassword.setAttribute('icon', 'fa:eye');
            }
        });
    </script>
</body>

</html>
