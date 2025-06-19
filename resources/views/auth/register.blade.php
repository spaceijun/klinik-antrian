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
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="card mt-4 card-bg-fill">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Register Account</h5>
                                    <p class="text-muted">Get your free account now.</p>
                                </div>

                                <div class="p-2 mt-4">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="row">
                                            <!-- Name -->
                                            <div class="col-md-6 mb-3">
                                                <label for="name" class="form-label">Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="name" name="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    value="{{ old('name') }}" placeholder="Enter your name" required
                                                    autofocus>
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Email -->
                                            <div class="col-md-6 mb-3">
                                                <label for="email" class="form-label">Email <span
                                                        class="text-danger">*</span></label>
                                                <input type="email" id="email" name="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    value="{{ old('email') }}" placeholder="Enter your email" required>
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Telephone -->
                                            <div class="col-md-6 mb-3">
                                                <label for="telephone" class="form-label">WhatsApp <span
                                                        class="text-danger">*</span></label>
                                                <input type="number" id="telephone" name="telephone"
                                                    class="form-control @error('telephone') is-invalid @enderror"
                                                    value="{{ old('telephone') }}" placeholder="Enter WhatsApp number"
                                                    required>
                                                @error('telephone')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Gender -->
                                            <div class="col-md-6 mb-3">
                                                <label for="gender" class="form-label">Jenis Kelamin <span
                                                        class="text-danger">*</span></label>
                                                <select name="gender" id="gender"
                                                    class="form-select @error('gender') is-invalid @enderror" required>
                                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                                    <option value="Laki-laki"
                                                        {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                                                    </option>
                                                    <option value="Perempuan"
                                                        {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan
                                                    </option>
                                                </select>
                                                @error('gender')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Tanggal lahir -->
                                            <div class="col-md-6 mb-3">
                                                <label for="tgl_lahir" class="form-label">Tanggal Lahir <span
                                                        class="text-danger">*</span></label>
                                                <input type="date" id="tgl_lahir" name="tgl_lahir"
                                                    class="form-control @error('tgl_lahir') is-invalid @enderror"
                                                    value="{{ old('tgl_lahir') }}" required>
                                                @error('tgl_lahir')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- NIK -->
                                            <div class="col-md-6 mb-3">
                                                <label for="nik" class="form-label">No Identitas (KTP) <span
                                                        class="text-danger">*</span></label>
                                                <input type="number" id="nik" name="nik"
                                                    class="form-control @error('nik') is-invalid @enderror"
                                                    value="{{ old('nik') }}" placeholder="Enter KTP number" required>
                                                @error('nik')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Alamat -->
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat Lengkap <span
                                                    class="text-danger">*</span></label>
                                            <textarea id="alamat" name="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror"
                                                placeholder="Enter your complete address" required>{{ old('alamat') }}</textarea>
                                            @error('alamat')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <!-- Password -->
                                            <div class="col-md-6 mb-3">
                                                <label for="password" class="form-label">Password <span
                                                        class="text-danger">*</span></label>
                                                <div class="position-relative auth-pass-inputgroup">
                                                    <input type="password" id="password" name="password"
                                                        class="form-control pe-5 password-input @error('password') is-invalid @enderror"
                                                        placeholder="Enter password" required>
                                                    <button
                                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none"
                                                        type="button">
                                                        <i class="ri-eye-fill align-middle"></i>
                                                    </button>
                                                </div>
                                                @error('password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Confirm Password -->
                                            <div class="col-md-6 mb-3">
                                                <label for="password_confirmation" class="form-label">Confirm Password
                                                    <span class="text-danger">*</span></label>
                                                <div class="position-relative auth-pass-inputgroup">
                                                    <input type="password" id="password_confirmation"
                                                        name="password_confirmation"
                                                        class="form-control pe-5 password-input @error('password_confirmation') is-invalid @enderror"
                                                        placeholder="Confirm password" required>
                                                    <button
                                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none"
                                                        type="button">
                                                        <i class="ri-eye-fill align-middle"></i>
                                                    </button>
                                                </div>
                                                @error('password_confirmation')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="mt-4">
                                            <button class="btn btn-success w-100" type="submit">Create Account</button>
                                        </div>


                                    </form>
                                    <div class="mt-4 text-center">
                                        <p class="mb-0">Sudah Punya Akun ? <a href="{{ route('login') }}"
                                                class="fw-semibold text-primary text-decoration-underline"> Login </a>
                                        </p>
                                    </div>

                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> {{ $settingWebsite->title }}. Crafted with <i
                                    class="mdi mdi-heart text-danger"></i> by
                                SwaraningCode
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <script>
        // Password toggle functionality
        document.querySelectorAll('.password-addon').forEach(function(element) {
            element.addEventListener('click', function() {
                const passwordInput = this.previousElementSibling;
                const icon = this.querySelector('i');

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    icon.classList.remove('ri-eye-fill');
                    icon.classList.add('ri-eye-off-fill');
                } else {
                    passwordInput.type = 'password';
                    icon.classList.remove('ri-eye-off-fill');
                    icon.classList.add('ri-eye-fill');
                }
            });
        });
    </script>
@endsection
