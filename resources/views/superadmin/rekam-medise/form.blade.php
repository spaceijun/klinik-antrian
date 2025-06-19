<div class="row padding-1 p-1">
    <div class="col-md-12">
        <input type="hidden" value="{{ old('pendaftaran_id', $rekamMedise?->pendaftaran_id) }}" name="pendaftaran_id">
        <input type="hidden" value="{{ old('pasien_id', $rekamMedise->pasien_id) }}" name="pasien_id">
        <input type="hidden" value="{{ old('dokter_id', $rekamMedise->dokter_id) }}" name="dokter_id">

        <div class="row">
            <!-- Kolom Kiri - Data Vital -->
            <div class="col-md-6">
                <div class="form-group mb-2 mb20">
                    <label for="berat_badan" class="form-label">{{ __('Berat Badan') }}</label>
                    <input type="number" name="berat_badan"
                        class="form-control @error('berat_badan') is-invalid @enderror"
                        value="{{ old('berat_badan', $rekamMedise?->berat_badan) }}" id="berat_badan"
                        placeholder="Berat Badan (kg)">
                    {!! $errors->first('berat_badan', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>

                <div class="form-group mb-2 mb20">
                    <label for="tinggi_badan" class="form-label">{{ __('Tinggi Badan') }}</label>
                    <input type="number" name="tinggi_badan"
                        class="form-control @error('tinggi_badan') is-invalid @enderror"
                        value="{{ old('tinggi_badan', $rekamMedise?->tinggi_badan) }}" id="tinggi_badan"
                        placeholder="Tinggi Badan (cm)">
                    {!! $errors->first('tinggi_badan', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>

                <div class="form-group mb-2 mb20">
                    <label for="tekanan_darah" class="form-label">{{ __('Tekanan Darah') }}</label>
                    <input type="text" name="tekanan_darah"
                        class="form-control @error('tekanan_darah') is-invalid @enderror"
                        value="{{ old('tekanan_darah', $rekamMedise?->tekanan_darah) }}" id="tekanan_darah"
                        placeholder="Tekanan Darah (mmHg)">
                    {!! $errors->first(
                        'tekanan_darah',
                        '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
                    ) !!}
                </div>

                <div class="form-group mb-2 mb20">
                    <label for="tempratur" class="form-label">{{ __('Temperatur') }}</label>
                    <input type="number" step="0.1" name="tempratur"
                        class="form-control @error('tempratur') is-invalid @enderror"
                        value="{{ old('tempratur', $rekamMedise?->tempratur) }}" id="tempratur"
                        placeholder="Temperatur (°C)">
                    {!! $errors->first('tempratur', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>

                <div class="form-group mb-2 mb20">
                    <label for="denyut_nadi" class="form-label">{{ __('Denyut Nadi') }}</label>
                    <input type="number" name="denyut_nadi"
                        class="form-control @error('denyut_nadi') is-invalid @enderror"
                        value="{{ old('denyut_nadi', $rekamMedise?->denyut_nadi) }}" id="denyut_nadi"
                        placeholder="Denyut Nadi (bpm)">
                    {!! $errors->first('denyut_nadi', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
                <div class="form-group mb-2 mb20">
                    <label for="kunjungan_berikutnya" class="form-label">{{ __('Kunjungan Berikutnya') }}
                        <span class="text-muted">*Opsional</span>
                    </label>
                    <input type="date" name="kunjungan_berikutnya"
                        class="form-control @error('kunjungan_berikutnya') is-invalid @enderror"
                        value="{{ old('kunjungan_berikutnya', $rekamMedise?->kunjungan_berikutnya) }}"
                        id="kunjungan_berikutnya" placeholder="Kunjungan Berikutnya">
                    {!! $errors->first(
                        'kunjungan_berikutnya',
                        '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
                    ) !!}
                </div>

                <div class="form-group mb-2 mb20">
                    <label for="catatan_berikutnya" class="form-label">{{ __('Catatan Berikutnya') }} <span
                            class="text-muted">*Opsional</span></label>
                    <input type="text" name="catatan_berikutnya"
                        class="form-control @error('catatan_berikutnya') is-invalid @enderror"
                        value="{{ old('catatan_berikutnya', $rekamMedise?->catatan_berikutnya) }}"
                        id="catatan_berikutnya" placeholder="Catatan Berikutnya">
                    {!! $errors->first(
                        'catatan_berikutnya',
                        '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
                    ) !!}
                </div>
            </div>

            <!-- Kolom Kanan - Diagnosis dan Pengobatan -->
            <div class="col-md-6">
                <div class="form-group mb-2 mb20">
                    <label for="diagnosis" class="form-label">{{ __('Diagnosis') }}</label>
                    <textarea name="diagnosis" class="form-control @error('diagnosis') is-invalid @enderror" id="diagnosis"
                        placeholder="Diagnosis" rows="4">{{ old('diagnosis', $rekamMedise?->diagnosis) }}</textarea>
                    {!! $errors->first('diagnosis', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>

                <div class="form-group mb-2 mb20">
                    <label for="rencana_pengobatan" class="form-label">{{ __('Rencana Pengobatan') }}</label>
                    <textarea name="rencana_pengobatan" class="form-control @error('rencana_pengobatan') is-invalid @enderror"
                        id="rencana_pengobatan" placeholder="Rencana Pengobatan" rows="4">{{ old('rencana_pengobatan', $rekamMedise?->rencana_pengobatan) }}</textarea>
                    {!! $errors->first(
                        'rencana_pengobatan',
                        '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
                    ) !!}
                </div>

                <div class="form-group mb-2 mb20">
                    <label for="resep_obat" class="form-label">{{ __('Resep Obat') }}</label>
                    <textarea name="resep_obat" class="form-control @error('resep_obat') is-invalid @enderror" id="resep_obat"
                        placeholder="Resep Obat" rows="4">{{ old('resep_obat', $rekamMedise?->resep_obat) }}</textarea>
                    {!! $errors->first('resep_obat', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>

                <div class="form-group mb-2 mb20">
                    <label for="notes" class="form-label">{{ __('Notes') }}</label>
                    <textarea name="notes" class="form-control @error('notes') is-invalid @enderror" id="notes"
                        placeholder="Notes" rows="4">{{ old('notes', $rekamMedise?->notes) }}</textarea>
                    {!! $errors->first('notes', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>

                <div class="form-group mb-2 mb20">
                    <label for="keluhan_utama" class="form-label">{{ __('Keluhan Utama') }}</label>
                    <textarea name="keluhan_utama" class="form-control @error('keluhan_utama') is-invalid @enderror" id="keluhan_utama"
                        placeholder="Keluhan Utama" rows="4">{{ old('keluhan_utama', $rekamMedise?->keluhan_utama) }}</textarea>
                    {!! $errors->first(
                        'keluhan_utama',
                        '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
                    ) !!}
                </div>

                <div class="form-group mb-2 mb20">
                    <label for="riwayat_penyakit" class="form-label">{{ __('Riwayat Penyakit') }} <span
                            class="text-muted">*Opsional</span></label>
                    <textarea name="riwayat_penyakit" class="form-control @error('riwayat_penyakit') is-invalid @enderror"
                        id="riwayat_penyakit" placeholder="Riwayat Penyakit" rows="4">{{ old('riwayat_penyakit', $rekamMedise?->riwayat_penyakit) }}</textarea>
                    {!! $errors->first(
                        'riwayat_penyakit',
                        '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
                    ) !!}
                </div>


            </div>
        </div>
    </div>

    <div class="col-md-12 mt20 mt-2">
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-sm px-5">{{ __('Submit') }}</button>
        </div>
    </div>
</div>
