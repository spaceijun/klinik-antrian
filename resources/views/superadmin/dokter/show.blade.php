@extends('layouts.app')

@section('template_title')
    {{ $dokter->name ?? __('Show') . " " . __('Dokter') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-animate">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Dokter</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('dokters.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nama Dokter:</strong>
                                    {{ $dokter->nama_dokter }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Spesialis:</strong>
                                    {{ $dokter->spesialis }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telephone:</strong>
                                    {{ $dokter->telephone }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Alamat:</strong>
                                    {{ $dokter->alamat }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Waktu Mulai Praktik:</strong>
                                    {{ $dokter->waktu_mulai_praktik }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Waktu Selesai Praktik:</strong>
                                    {{ $dokter->waktu_selesai_praktik }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Is Active:</strong>
                                    {{ $dokter->is_active }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
