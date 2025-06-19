@extends('layouts.app')

@section('template_title')
    {{ $rekamMedise->name ?? __('Show') . " " . __('Rekam Medise') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-animate">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Rekam Medise</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('rekam-medises.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Pendaftaran Id:</strong>
                                    {{ $rekamMedise->pendaftaran_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Pasien Id:</strong>
                                    {{ $rekamMedise->pasien_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Dokter Id:</strong>
                                    {{ $rekamMedise->dokter_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Berat Badan:</strong>
                                    {{ $rekamMedise->berat_badan }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tinggi Badan:</strong>
                                    {{ $rekamMedise->tinggi_badan }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tekanan Darah:</strong>
                                    {{ $rekamMedise->tekanan_darah }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tempratur:</strong>
                                    {{ $rekamMedise->tempratur }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Denyut Nadi:</strong>
                                    {{ $rekamMedise->denyut_nadi }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Keluhan Utama:</strong>
                                    {{ $rekamMedise->keluhan_utama }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Riwayat Penyakit:</strong>
                                    {{ $rekamMedise->riwayat_penyakit }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Diagnosis:</strong>
                                    {{ $rekamMedise->diagnosis }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Rencana Pengobatan:</strong>
                                    {{ $rekamMedise->rencana_pengobatan }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Resep Obat:</strong>
                                    {{ $rekamMedise->resep_obat }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Notes:</strong>
                                    {{ $rekamMedise->notes }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Kunjungan Berikutnya:</strong>
                                    {{ $rekamMedise->kunjungan_berikutnya }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Catatan Berikutnya:</strong>
                                    {{ $rekamMedise->catatan_berikutnya }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
