<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Nama Lengkap') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $user?->email) }}" id="email" placeholder="Email">
            {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="telephone" class="form-label">{{ __('Telephone') }}</label>
            <input type="number" name="telephone" class="form-control @error('telephone') is-invalid @enderror"
                value="{{ old('telephone', $user?->telephone) }}" id="telephone" placeholder="Telephone">
            {!! $errors->first('telephone', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            <small class="text-danger">* Minimal 11 digit Maximal 15 digit</small>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="gender" class="form-label">{{ __('Jenis Kelamin') }}</label>
            <select name="gender" id="gender" class="form-select">
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki" {{ old('gender', $user?->gender) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                </option>
                <option value="Perempuan" {{ old('gender', $user?->gender) == 'Laki-laki' ? 'selected' : '' }}>Perempuan
                </option>
            </select>
            {!! $errors->first('gender', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tgl_lahir" class="form-label">{{ __('tgl_lahir') }}</label>
            <input type="date" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror"
                value="{{ old('tgl_lahir', $user?->tgl_lahir) }}" id="tgl_lahir" placeholder="tgl_lahir">
            {!! $errors->first('tgl_lahir', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="alamat" class="form-label">{{ __('Alamat') }}</label>
            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                value="{{ old('alamat', $user?->alamat) }}" id="alamat" placeholder="alamat"></textarea>
            {!! $errors->first('alamat', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nik" class="form-label">{{ __('NIK') }}</label>
            <input type="number" name="nik" class="form-control @error('nik') is-invalid @enderror"
                value="{{ old('nik', $user?->nik) }}" id="nik" placeholder="nik">
            {!! $errors->first('nik', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                value="" id="password" placeholder="Masukkan password baru">
            <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password</small>
            {!! $errors->first('password', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="role" class="form-label">{{ __('Role') }}</label>
            <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" required>
                <option value="">{{ __('-- Select Role --') }}</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}"
                        {{ old('role', $user?->role ?? $user?->getRoleNames()->first()) == $role->name ? 'selected' : '' }}>
                        {{ ucfirst($role->name) }}
                    </option>
                @endforeach
            </select>
            @error('role')
                <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>
            @enderror
        </div>
    </div>

</div>
<div class="col-md-12 mt20 mt-2">
    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
</div>
</div>
