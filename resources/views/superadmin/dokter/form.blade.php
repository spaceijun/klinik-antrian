<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="nama_dokter" class="form-label">{{ __('Nama Dokter') }}</label>
            <input type="text" name="nama_dokter" class="form-control @error('nama_dokter') is-invalid @enderror"
                value="{{ old('nama_dokter', $dokter?->nama_dokter) }}" id="nama_dokter" placeholder="Nama Dokter">
            {!! $errors->first('nama_dokter', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="spesialis" class="form-label">{{ __('Spesialis') }}</label>
            <select name="spesialis" id="spesialis" class="form-select">
                <option value="">-- Pilih Spesialis --</option>
                <option value="Dokter Umum"
                    {{ old('spesialis', $dokter?->spesialis) == 'Dokter Umum' ? 'selected' : '' }}>Dokter Umum
                </option>
                <option value="Dokter Spesialis"
                    {{ old('spesialis', $dokter?->spesialis) == 'Dokter Spesialis' ? 'selected' : '' }}>Dokter
                    Spesialis</option>
            </select>
            {!! $errors->first('spesialis', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="telephone" class="form-label">{{ __('Telephone') }}</label>
            <input type="number" name="telephone" class="form-control @error('telephone') is-invalid @enderror"
                value="{{ old('telephone', $dokter?->telephone) }}" id="telephone" placeholder="Telephone">
            {!! $errors->first('telephone', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="alamat" class="form-label">{{ __('Alamat') }}</label>
            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat">{{ old('alamat', $dokter?->alamat) }}</textarea>
            {!! $errors->first('alamat', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="waktu_mulai_praktik" class="form-label">{{ __('Waktu Mulai Praktik') }}</label>
            <input type="time" name="waktu_mulai_praktik"
                class="form-control @error('waktu_mulai_praktik') is-invalid @enderror"
                value="{{ old('waktu_mulai_praktik', $dokter?->waktu_mulai_praktik) }}" id="waktu_mulai_praktik"
                placeholder="Waktu Mulai Praktik" onchange="validateTime()">
            {!! $errors->first(
                'waktu_mulai_praktik',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="waktu_selesai_praktik" class="form-label">{{ __('Waktu Selesai Praktik') }}</label>
            <input type="time" name="waktu_selesai_praktik"
                class="form-control @error('waktu_selesai_praktik') is-invalid @enderror"
                value="{{ old('waktu_selesai_praktik', $dokter?->waktu_selesai_praktik) }}" id="waktu_selesai_praktik"
                placeholder="Waktu Selesai Praktik" onchange="validateTime()">
            {!! $errors->first(
                'waktu_selesai_praktik',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
            <div id="time-error" class="invalid-feedback" style="display: none;">
                <strong>Waktu selesai praktik harus lebih dari waktu mulai praktik</strong>
            </div>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="active" class="form-label">Aktif</label>
            <!-- Hidden input untuk memastikan nilai false dikirim jika checkbox tidak dicentang -->
            <input type="hidden" name="is_active" value="0">
            <div class="form-check form-switch">
                <input class="form-check-input @error('is_active') is-invalid @enderror" type="checkbox"
                    name="is_active" role="switch" id="flexSwitchCheckChecked" value="1"
                    {{ old('is_active', $dokter?->is_active ?? true) ? 'checked' : '' }}>
                <label class="form-check-label" for="flexSwitchCheckChecked">Tetap Centang Jika Aktif</label>
            </div>
            {!! $errors->first('is_active', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary" id="submit-btn">{{ __('Submit') }}</button>
    </div>
</div>

<script>
    function validateTime() {
        const startTime = document.getElementById('waktu_mulai_praktik').value;
        const endTime = document.getElementById('waktu_selesai_praktik').value;
        const timeError = document.getElementById('time-error');
        const endTimeInput = document.getElementById('waktu_selesai_praktik');
        const submitBtn = document.getElementById('submit-btn');

        if (startTime && endTime) {
            if (endTime <= startTime) {
                timeError.style.display = 'block';
                endTimeInput.classList.add('is-invalid');
                submitBtn.disabled = true;
            } else {
                timeError.style.display = 'none';
                endTimeInput.classList.remove('is-invalid');
                submitBtn.disabled = false;
            }
        } else {
            timeError.style.display = 'none';
            endTimeInput.classList.remove('is-invalid');
            submitBtn.disabled = false;
        }
    }

    // Validate on page load if values exist
    document.addEventListener('DOMContentLoaded', function() {
        validateTime();
    });
</script>
