@extends('layouts.app')

@section('template_title')
    {{ $pendaftaran->name ?? __('Show') . " " . __('Pendaftaran') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-animate">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Pendaftaran</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('pendaftarans.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Pasien Id:</strong>
                                    {{ $pendaftaran->pasien_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Dokter Id:</strong>
                                    {{ $pendaftaran->dokter_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tgl Pendaftaran:</strong>
                                    {{ $pendaftaran->tgl_pendaftaran }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Queue Number:</strong>
                                    {{ $pendaftaran->queue_number }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Queue Position:</strong>
                                    {{ $pendaftaran->queue_position }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Status:</strong>
                                    {{ $pendaftaran->status }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Keluhan Utama:</strong>
                                    {{ $pendaftaran->keluhan_utama }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Catatan:</strong>
                                    {{ $pendaftaran->catatan }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Registered At:</strong>
                                    {{ $pendaftaran->registered_at }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Called At:</strong>
                                    {{ $pendaftaran->called_at }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Started At:</strong>
                                    {{ $pendaftaran->started_at }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Completed At:</strong>
                                    {{ $pendaftaran->completed_at }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
