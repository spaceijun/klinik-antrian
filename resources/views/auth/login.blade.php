@extends('layouts.guest')
@section('content')
    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="/" class="d-inline-block auth-logo">
                                    <span
                                        style="font-size: 20px; font-weight: bold; color: #ffffff;">{{ $settingWebsite->title }}</span>
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium">{{ $settingWebsite->description }}</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4 card-bg-fill">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Selamat Datang Kembali!</h5>
                                    <p class="text-muted">Silakan login untuk melanjutkan ke akun Anda.</p>
                                </div>

                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                <!-- Alert untuk kesalahan login -->
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                                        <div>
                                            <strong>Login Gagal!</strong>
                                            @if ($errors->has('email'))
                                                Email atau password yang Anda masukkan salah.
                                            @elseif($errors->has('password'))
                                                Password yang Anda masukkan salah.
                                            @elseif($errors->has('throttle'))
                                                Terlalu banyak percobaan login. Silakan coba lagi nanti.
                                            @else
                                                Terjadi kesalahan saat login. Silakan coba lagi.
                                            @endif
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                <div class="p-2 mt-4">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="email" class="form-label">{{ __('Email') }}</label>
                                            <input type="email"
                                                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                id="email" name="email" value="{{ old('email') }}"
                                                placeholder="Masukkan email Anda" required autofocus
                                                autocomplete="username">
                                        </div>

                                        <div class="mb-3">
                                            <div class="float-end">
                                                @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}" class="text-muted">Lupa
                                                        password?</a>
                                                @endif
                                            </div>
                                            <label class="form-label" for="password">{{ __('Password') }}</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password"
                                                    class="form-control pe-5 password-input {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                                    placeholder="Masukkan password Anda" id="password" name="password"
                                                    required autocomplete="current-password">
                                                <button
                                                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none"
                                                    type="button" id="password-addon"><i
                                                        class="ri-eye-fill align-middle"></i></button>
                                            </div>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember_me"
                                                name="remember">
                                            <label class="form-check-label" for="remember_me">Ingat saya</label>
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-success w-100" type="submit">Masuk</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="mt-4 text-center">
                            <p class="mb-0">Belum memiliki akun? <a href="{{ route('register') }}"
                                    class="fw-semibold text-primary text-decoration-underline">Daftar</a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> {{ $settingWebsite->title }}. All Rights Reserved.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Error handler for missing dependencies -->
    <script>
        // Create a safety wrapper for JavaScript libraries
        function safeExecute(fn) {
            try {
                fn();
            } catch (e) {
                console.warn('Error suppressed:', e.message);
            }
        }

        // Safe initializers for various components
        document.addEventListener('DOMContentLoaded', function() {
            // Password visibility toggle
            var passwordAddon = document.getElementById('password-addon');
            if (passwordAddon) {
                passwordAddon.addEventListener('click', function() {
                    var passwordInput = document.getElementById('password');
                    if (passwordInput.type === "password") {
                        passwordInput.type = "text";
                        this.querySelector('i').classList.remove('ri-eye-fill');
                        this.querySelector('i').classList.add('ri-eye-off-fill');
                    } else {
                        passwordInput.type = "password";
                        this.querySelector('i').classList.remove('ri-eye-off-fill');
                        this.querySelector('i').classList.add('ri-eye-fill');
                    }
                });
            }

            // Handle Bootstrap components safely
            if (typeof bootstrap !== 'undefined') {
                // Initialize alerts if they exist
                var alertList = document.querySelectorAll('.alert')
                if (alertList.length > 0) {
                    alertList.forEach(function(alert) {
                        new bootstrap.Alert(alert);
                    });
                }
            }

            // Patch any missing functions from the template
            window.SimpleBar = window.SimpleBar || function() {
                return {
                    recalculate: function() {}
                };
            };
        });

        // Error handling for missing elements
        window.addEventListener('error', function(e) {
            // Prevent errors from missing elements in app.js and simplebar.min.js
            if (e.message && (e.message.includes('querySelector(...) is null') ||
                    e.message.includes('this.el is null'))) {
                console.warn('Ignoring non-critical error:', e.message);
                e.preventDefault();
                e.stopPropagation();
                return true;
            }
        }, true);

        // Prevent global errors
        window.onerror = function(msg, url, line, col, error) {
            // Check if error is related to missing elements
            if (msg.includes('querySelector') || msg.includes('is null') ||
                url.includes('simplebar.min.js') || url.includes('dashboard-projects.init.js')) {
                console.warn('Ignoring JS error:', msg);
                return true; // prevents the firing of the default event handler
            }
        };

        // Define fallbacks for common JavaScript objects used in the template
        window.SimpleBar = window.SimpleBar || function() {};
        window.Waves = window.Waves || {
            attach: function() {},
            init: function() {}
        };
        window.List = window.List || function() {};
        window.Swiper = window.Swiper || function() {};
    </script>
@endsection
