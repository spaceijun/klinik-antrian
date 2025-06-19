@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        @php
            $activePendaftaran = collect();
            if (!empty($pendaftaran) && $pendaftaran->count() > 0) {
                $activePendaftaran = $pendaftaran->filter(function ($item) {
                    return in_array($item->status, ['Terdaftar', 'Menunggu', 'Diproses']);
                });
            }
        @endphp

        @if ($activePendaftaran->count() > 0)
            @foreach ($activePendaftaran as $item)
                <div class="row mb-3">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Pendaftaran</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <th>Nama Pasien</th>
                                                <td>{{ $item->user->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>NIK</th>
                                                <td>{{ $item->user->nik }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Pendaftaran</th>
                                                <td>{{ \Carbon\Carbon::parse($item->tgl_pendaftaran)->format('d F Y') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Nomor Antrian</th>
                                                <td><span class="badge bg-primary fs-6">{{ $item->queue_number }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Dokter</th>
                                                <td>{{ $item->dokter->nama_dokter }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <!-- Show "Anda Belum Mendaftar" card when no active registrations -->
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="card">
                        <div class="card-body text-center py-5">
                            <div class="mb-4">
                                <i class="ri-calendar-2-line text-muted" style="font-size: 4rem;"></i>
                            </div>
                            <h4 class="card-title mb-3">Anda Belum Mendaftar</h4>
                            <p class="text-muted mb-4">
                                Anda belum memiliki pendaftaran aktif. Silakan lakukan pendaftaran untuk melakukan kunjungan
                                ke dokter.
                            </p>
                            <div class="d-flex gap-2 justify-content-center">
                                <a href="{{ route('pasien.pendaftaran.create') }}" class="btn btn-primary">
                                    <i class="ri-add-line me-1"></i> Daftar Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
