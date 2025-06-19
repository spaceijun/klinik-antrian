@extends('layouts.app')

@section('template_title')
    {{ __('Pendaftaran') }} Pasien
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-animate">
                    <div class="card-header">
                        <span class="card-title">{{ __('Pendaftaran Pasien Baru') }}</span>
                        <p class="text-muted mb-0" style="font-size: 0.875rem;">Silakan isi form pendaftaran dengan lengkap
                        </p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pasien.pendaftaran.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row padding-1 p-1">
                                <div class="col-md-12">

                                    <!-- Informasi Pasien -->
                                    <div class="mb-4">
                                        <h5 class="mb-3">Informasi Pasien</h5>
                                        <div class="bg-light p-3 rounded">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-2">
                                                        <label class="form-label text-muted">Nama Lengkap</label>
                                                        <p class="mb-0 fw-medium">{{ Auth::user()->name }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-2">
                                                        <label class="form-label text-muted">Email</label>
                                                        <p class="mb-0">{{ Auth::user()->email }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pilih Dokter -->
                                    <div class="form-group mb-2 mb20">
                                        <label for="dokter_id" class="form-label">{{ __('Pilih Dokter') }} <span
                                                class="text-danger">*</span></label>
                                        <select name="dokter_id"
                                            class="form-control @error('dokter_id') is-invalid @enderror" id="dokter_id"
                                            required>
                                            <option value="">-- Pilih Dokter --</option>
                                            @foreach ($dokters as $dokter)
                                                <option value="{{ $dokter->id }}"
                                                    {{ old('dokter_id') == $dokter->id ? 'selected' : '' }}>
                                                    {{ $dokter->nama_dokter }} - {{ $dokter->spesialis }}
                                                </option>
                                            @endforeach
                                        </select>
                                        {!! $errors->first('dokter_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                                    </div>

                                    <!-- Tanggal Pendaftaran -->
                                    <div class="form-group mb-2 mb20">
                                        <label for="tgl_pendaftaran" class="form-label">{{ __('Tanggal Kunjungan') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="tgl_pendaftaran"
                                            class="form-control @error('tgl_pendaftaran') is-invalid @enderror"
                                            value="{{ old('tgl_pendaftaran', date('Y-m-d')) }}" id="tgl_pendaftaran"
                                            min="{{ date('Y-m-d') }}" required>
                                        {!! $errors->first(
                                            'tgl_pendaftaran',
                                            '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
                                        ) !!}
                                        <small class="form-text text-muted">Pilih tanggal kunjungan (minimal hari
                                            ini)</small>
                                    </div>

                                    <!-- Keluhan Utama -->
                                    <div class="form-group mb-2 mb20">
                                        <label for="keluhan_utama" class="form-label">{{ __('Keluhan Utama') }} <span
                                                class="text-danger">*</span></label>
                                        <textarea name="keluhan_utama" class="form-control @error('keluhan_utama') is-invalid @enderror" id="keluhan_utama"
                                            rows="4" required placeholder="Jelaskan keluhan atau gejala yang Anda alami..." maxlength="1000">{{ old('keluhan_utama') }}</textarea>
                                        {!! $errors->first(
                                            'keluhan_utama',
                                            '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
                                        ) !!}
                                        <small class="form-text text-muted">Maksimal 1000 karakter</small>
                                    </div>

                                    <!-- Catatan Tambahan -->
                                    <div class="form-group mb-2 mb20">
                                        <label for="catatan" class="form-label">{{ __('Catatan Tambahan') }} <span
                                                class="text-muted">(Opsional)</span></label>
                                        <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror" id="catatan" rows="3"
                                            maxlength="1000" placeholder="Riwayat penyakit, alergi obat, atau informasi penting lainnya...">{{ old('catatan') }}</textarea>
                                        {!! $errors->first('catatan', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                                        <small class="form-text text-muted">Maksimal 1000 karakter</small>
                                    </div>

                                    <!-- Informasi Penting -->
                                    <div class="alert alert-warning mb-4" role="alert">
                                        <div class="d-flex">
                                            <div class="me-3">
                                                <i class="fas fa-exclamation-triangle text-warning"></i>
                                            </div>
                                            <div>
                                                <h6 class="alert-heading mb-2">Informasi Penting</h6>
                                                <ul class="mb-0 ps-3">
                                                    <li>Nomor antrian akan diberikan setelah pendaftaran berhasil</li>
                                                    <li>Harap datang 15 menit sebelum waktu perkiraan</li>
                                                    <li>Bawa kartu identitas dan kartu BPJS/asuransi jika ada</li>
                                                    <li>Pendaftaran dapat dibatalkan maksimal 1 jam sebelum jadwal</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- Submit Buttons -->
                                <div class="col-md-12 mt20 mt-2">
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('pasien.pendaftaran.index') }}"
                                            class="btn btn-outline-secondary">
                                            <i class="fas fa-arrow-left me-1"></i> {{ __('Kembali') }}
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-check me-1"></i> {{ __('Daftar Sekarang') }}
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-update minimum date to today
            const dateInput = document.getElementById('tgl_pendaftaran');
            const today = new Date().toISOString().split('T')[0];
            dateInput.setAttribute('min', today);

            // Character counter for textareas
            const textareas = document.querySelectorAll('textarea');
            textareas.forEach(textarea => {
                const maxLength = 1000;
                const wrapper = textarea.parentNode;

                // Create counter element
                const counter = document.createElement('div');
                counter.className = 'text-end text-muted mt-1';
                counter.style.fontSize = '0.75rem';
                counter.textContent = `${textarea.value.length}/${maxLength}`;
                wrapper.appendChild(counter);

                // Update counter on input
                textarea.addEventListener('input', function() {
                    const currentLength = this.value.length;
                    counter.textContent = `${currentLength}/${maxLength}`;

                    if (currentLength > maxLength * 0.9) {
                        counter.classList.remove('text-muted');
                        counter.classList.add('text-warning');
                    } else {
                        counter.classList.remove('text-warning', 'text-danger');
                        counter.classList.add('text-muted');
                    }

                    if (currentLength >= maxLength) {
                        counter.classList.remove('text-warning', 'text-muted');
                        counter.classList.add('text-danger');
                    }
                });
            });
        });
    </script>
@endsection
