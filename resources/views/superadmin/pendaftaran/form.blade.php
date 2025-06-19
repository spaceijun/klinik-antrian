<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="pasien_id" class="form-label">{{ __('Pasien') }}</label>
            <select name="pasien_id" class="form-control @error('pasien_id') is-invalid @enderror" id="pasien_id">
                <option value="">-- Pilih Pasien --</option>
                @foreach ($pasiens as $pasien)
                    <option value="{{ $pasien->id }}"
                        {{ old('pasien_id', $pendaftaran?->pasien_id) == $pasien->id ? 'selected' : '' }}>
                        {{ $pasien->name }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('pasien_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="dokter_id" class="form-label">{{ __('Dokter') }}</label>
            <select name="dokter_id" class="form-control @error('dokter_id') is-invalid @enderror" id="dokter_id">
                <option value="">-- Pilih Dokter --</option>
                @foreach ($dokters as $dokter)
                    <option value="{{ $dokter->id }}"
                        {{ old('dokter_id', $pendaftaran?->dokter_id) == $dokter->id ? 'selected' : '' }}>
                        {{ $dokter->nama_dokter }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('dokter_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tgl_pendaftaran" class="form-label">{{ __('Tgl Pendaftaran') }}</label>
            <input type="date" name="tgl_pendaftaran"
                class="form-control @error('tgl_pendaftaran') is-invalid @enderror"
                value="{{ old('tgl_pendaftaran', $pendaftaran?->tgl_pendaftaran) }}" id="tgl_pendaftaran"
                placeholder="Tgl Pendaftaran">
            {!! $errors->first(
                'tgl_pendaftaran',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="queue_number" class="form-label">{{ __('Queue Number') }}</label>
            <input type="text" name="queue_number" class="form-control @error('queue_number') is-invalid @enderror"
                value="{{ old('queue_number', $pendaftaran?->queue_number) }}" id="queue_number"
                placeholder="Queue Number">
            {!! $errors->first('queue_number', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="queue_position" class="form-label">{{ __('Queue Position') }}</label>
            <input type="text" name="queue_position"
                class="form-control @error('queue_position') is-invalid @enderror"
                value="{{ old('queue_position', $pendaftaran?->queue_position) }}" id="queue_position"
                placeholder="Queue Position">
            {!! $errors->first(
                'queue_position',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="status" class="form-label">{{ __('Status') }}</label>
            <input type="text" name="status" class="form-control @error('status') is-invalid @enderror"
                value="{{ old('status', $pendaftaran?->status) }}" id="status" placeholder="Status">
            {!! $errors->first('status', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="keluhan_utama" class="form-label">{{ __('Keluhan Utama') }}</label>
            <input type="text" name="keluhan_utama" class="form-control @error('keluhan_utama') is-invalid @enderror"
                value="{{ old('keluhan_utama', $pendaftaran?->keluhan_utama) }}" id="keluhan_utama"
                placeholder="Keluhan Utama">
            {!! $errors->first(
                'keluhan_utama',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="catatan" class="form-label">{{ __('Catatan') }}</label>
            <input type="text" name="catatan" class="form-control @error('catatan') is-invalid @enderror"
                value="{{ old('catatan', $pendaftaran?->catatan) }}" id="catatan" placeholder="Catatan">
            {!! $errors->first('catatan', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="registered_at" class="form-label">{{ __('Registered At') }}</label>
            <input type="text" name="registered_at" class="form-control @error('registered_at') is-invalid @enderror"
                value="{{ old('registered_at', $pendaftaran?->registered_at) }}" id="registered_at"
                placeholder="Registered At">
            {!! $errors->first(
                'registered_at',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="called_at" class="form-label">{{ __('Called At') }}</label>
            <input type="text" name="called_at" class="form-control @error('called_at') is-invalid @enderror"
                value="{{ old('called_at', $pendaftaran?->called_at) }}" id="called_at" placeholder="Called At">
            {!! $errors->first('called_at', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="started_at" class="form-label">{{ __('Started At') }}</label>
            <input type="text" name="started_at" class="form-control @error('started_at') is-invalid @enderror"
                value="{{ old('started_at', $pendaftaran?->started_at) }}" id="started_at" placeholder="Started At">
            {!! $errors->first('started_at', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="completed_at" class="form-label">{{ __('Completed At') }}</label>
            <input type="text" name="completed_at"
                class="form-control @error('completed_at') is-invalid @enderror"
                value="{{ old('completed_at', $pendaftaran?->completed_at) }}" id="completed_at"
                placeholder="Completed At">
            {!! $errors->first('completed_at', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
