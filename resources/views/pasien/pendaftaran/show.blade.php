@extends('layouts.app')

@section('title', 'Detail Pendaftaran - ' . $pendaftaran->queue_number)

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Status Card -->
            <div class="col-xxl-4 col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Status Antrian</h4>
                    </div>
                    <div class="card-body">
                        <!-- Status Badge -->
                        <div class="text-center mb-4">
                            @php
                                $statusConfig = [
                                    'Terdaftar' => ['class' => 'bg-primary', 'icon' => 'ri-checkbox-circle-line'],
                                    'Menunggu' => ['class' => 'bg-warning', 'icon' => 'ri-time-line'],
                                    'Diproses' => ['class' => 'bg-success', 'icon' => 'ri-flashlight-line'],
                                    'Selesai' => ['class' => 'bg-secondary', 'icon' => 'ri-check-double-line'],
                                    'Batal' => ['class' => 'bg-danger', 'icon' => 'ri-close-circle-line'],
                                ];
                                $config = $statusConfig[$pendaftaran->status] ?? [
                                    'class' => 'bg-secondary',
                                    'icon' => 'ri-question-line',
                                ];
                            @endphp
                            <span class="badge {{ $config['class'] }} fs-12 px-3 py-2">
                                <i class="{{ $config['icon'] }} me-1"></i>
                                {{ $pendaftaran->status }}
                            </span>
                        </div>

                        <!-- Queue Information -->
                        <div class="row g-3 mb-4">
                            <div class="col-6">
                                <div class="text-center p-3 bg-light rounded">
                                    <h5 class="fw-bold text-primary mb-1">{{ $pendaftaran->queue_number }}</h5>
                                    <p class="text-muted mb-0 fs-13">Nomor Antrian</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center p-3 bg-light rounded">
                                    <h5 class="fw-bold mb-1">{{ $pendaftaran->queue_position }}</h5>
                                    <p class="text-muted mb-0 fs-13">Posisi Antrian</p>
                                </div>
                            </div>
                            @if ($estimasi_waktu > 0 && in_array($pendaftaran->status, ['Terdaftar', 'Menunggu']))
                                <div class="col-12">
                                    <div class="text-center p-3 bg-warning-subtle rounded">
                                        <h5 class="fw-bold text-warning mb-1">~{{ $estimasi_waktu }} menit</h5>
                                        <p class="text-muted mb-0 fs-13">Estimasi Tunggu</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Progress Timeline -->
                        <div class="border-top pt-4">
                            <h5 class="fs-15 mb-3">Timeline Progress</h5>
                            <div class="profile-timeline">
                                <!-- Registered -->
                                <div class="accordion-item border-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <i class="ri-checkbox-circle-fill text-primary fs-16"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="fs-14 mb-1">Terdaftar</h6>
                                                    <p class="text-muted fs-12 mb-0">{{ $pendaftaran->registered_at }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if ($pendaftaran->called_at)
                                    <!-- Called -->
                                    <div class="accordion-item border-0">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <i class="ri-phone-fill text-warning fs-16"></i>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="fs-14 mb-1">Dipanggil</h6>
                                                        <p class="text-muted fs-12 mb-0">
                                                            {{ $pendaftaran->called_at }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if ($pendaftaran->started_at)
                                    <!-- Started -->
                                    <div class="accordion-item border-0">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <i class="ri-play-circle-fill text-success fs-16"></i>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="fs-14 mb-1">Mulai Diperiksa</h6>
                                                        <p class="text-muted fs-12 mb-0">
                                                            {{ $pendaftaran->started_at }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if ($pendaftaran->completed_at)
                                    <!-- Completed -->
                                    <div class="accordion-item border-0">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <i class="ri-check-double-fill text-success fs-16"></i>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="fs-14 mb-1">Selesai</h6>
                                                        <p class="text-muted fs-12 mb-0">
                                                            {{ $pendaftaran->completed_at }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Button -->
                @if (in_array($pendaftaran->status, ['Terdaftar']) && $pendaftaran->pasien_id === Auth::id())
                    <div class="card">
                        <a href="{{ route('pasien.pendaftaran.edit', $pendaftaran) }}" class="btn btn-warning w-100">
                            <i class="ri-edit-line align-bottom me-1"></i> Edit
                        </a>
                    </div>
                @endif

                <!-- Cancel Button -->
                @if (in_array($pendaftaran->status, ['Terdaftar', 'Menunggu']) && $pendaftaran->pasien_id === Auth::id())
                    <div class="card">
                        <form action="{{ route('pasien.pendaftaran.destroy', $pendaftaran) }}" method="POST"
                            onsubmit="return confirm('Apakah Anda yakin ingin membatalkan pendaftaran ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="ri-close-line me-1"></i> Batalkan Pendaftaran
                            </button>
                        </form>
                    </div>
                @endif
            </div>

            <!-- Main Content -->
            <div class="col-xxl-8 col-lg-7">
                <div class="row">
                    <!-- Patient & Doctor Information -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Informasi Pendaftaran</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Patient Info -->
                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <h5 class="fs-16 mb-3">
                                                <i class="ri-user-line text-primary me-2"></i>Informasi Pasien
                                            </h5>
                                            <div class="table-responsive">
                                                <table class="table table-borderless table-sm mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td class="ps-0 text-muted" style="width: 30%;">Nama:</td>
                                                            <td class="fw-medium">{{ $pendaftaran->user->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="ps-0 text-muted">Email:</td>
                                                            <td>{{ $pendaftaran->user->email }}</td>
                                                        </tr>
                                                        @if ($pendaftaran->user->telephone)
                                                            <tr>
                                                                <td class="ps-0 text-muted">Telepon:</td>
                                                                <td>{{ $pendaftaran->user->telephone }}</td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Doctor Info -->
                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <h5 class="fs-16 mb-3">
                                                <i class="ri-user-heart-line text-success me-2"></i>Informasi Dokter
                                            </h5>
                                            <div class="table-responsive">
                                                <table class="table table-borderless table-sm mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td class="ps-0 text-muted" style="width: 30%;">Nama Dokter:
                                                            </td>
                                                            <td class="fw-medium">{{ $pendaftaran->dokter->nama_dokter }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="ps-0 text-muted">Spesialisasi:</td>
                                                            <td>{{ $pendaftaran->dokter->spesialis }}</td>
                                                        </tr>
                                                        @if ($pendaftaran->dokter->ruang)
                                                            <tr>
                                                                <td class="ps-0 text-muted">Ruang:</td>
                                                                <td>{{ $pendaftaran->dokter->ruang }}</td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Appointment Date -->
                                <div class="border-top pt-4">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <i class="ri-calendar-check-line text-primary fs-20"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="fs-15 mb-1">Tanggal Kunjungan</h6>
                                            <p class="text-muted mb-0">{{ $pendaftaran->tgl_pendaftaran }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Medical Information -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">
                                    <i class="ri-hospital-line me-2"></i>Informasi Medis
                                </h4>
                            </div>
                            <div class="card-body">
                                <!-- Main Complaint -->
                                <div class="mb-4">
                                    <h5 class="fs-15 mb-3">Keluhan Utama</h5>
                                    <div class="alert alert-danger alert-border-left alert-dismissible fade show"
                                        role="alert">
                                        <i class="ri-error-warning-line me-3 align-middle fs-16"></i>
                                        {{ $pendaftaran->keluhan_utama }}
                                    </div>
                                </div>

                                <!-- Additional Notes -->
                                @if ($pendaftaran->catatan)
                                    <div>
                                        <h5 class="fs-15 mb-3">Catatan Tambahan</h5>
                                        <div class="alert alert-info alert-border-left" role="alert">
                                            <i class="ri-information-line me-3 align-middle fs-16"></i>
                                            {{ $pendaftaran->catatan }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Important Information -->
                    @if (in_array($pendaftaran->status, ['Terdaftar', 'Menunggu']))
                        <div class="col-12">
                            <div class="alert alert-warning alert-border-left alert-label-icon" role="alert">
                                <i class="ri-alert-line label-icon"></i>
                                <strong>Reminder Penting</strong>
                                <ul class="mt-2 mb-0">
                                    <li>Harap datang 15 menit sebelum perkiraan waktu pemeriksaan</li>
                                    <li>Bawa kartu identitas dan kartu BPJS/asuransi kesehatan</li>
                                    <li>Jika berhalangan hadir, harap batalkan pendaftaran minimal 1 jam sebelumnya</li>
                                    <li>Status antrian akan diupdate secara real-time</li>
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
