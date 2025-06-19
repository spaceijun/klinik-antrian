<div id="showModal{{ $pendaftaran->id }}" class="modal flip" tabindex="-1"
    aria-labelledby="showModalLabel{{ $pendaftaran->id }}" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel{{ $pendaftaran->id }}">
                    Detail Pendaftaran
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('superadmin.pendaftarans.updateStatus', $pendaftaran->id) }}" method="POST">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <strong>Nama Pasien</strong>
                        </div>
                        <div class="col-sm-8">
                            {{ $pendaftaran->user->name }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <strong>Nama Dokter</strong>
                        </div>
                        <div class="col-sm-8">
                            {{ $pendaftaran->dokter->nama_dokter }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <strong>No Antrian</strong>
                        </div>
                        <div class="col-sm-8">
                            {{ $pendaftaran->queue_number }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <strong>Status</strong>
                        </div>
                        <div class="col-sm-8">
                            @if ($pendaftaran->status == 'Selesai' || $pendaftaran->status == 'Batal')
                                <input type="text" class="form-control" value="Selesai" readonly>
                                <input type="hidden" name="status" value="Selesai">
                                <small class="text-muted">Status sudah selesai dan tidak dapat diubah</small>
                            @else
                                <select name="status" id="status{{ $pendaftaran->id }}" class="form-select" required
                                    onchange="toggleDeveloperField({{ $pendaftaran->id }})">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="Terdaftar"
                                        {{ $pendaftaran->status == 'Terdaftar' ? 'selected' : '' }}>
                                        Terdaftar</option>
                                    <option value="Menunggu"
                                        {{ $pendaftaran->status == 'Menunggu' ? 'selected' : '' }}>
                                        Menunggu</option>
                                    <option value="Diproses"
                                        {{ $pendaftaran->status == 'Diproses' ? 'selected' : '' }}>
                                        Diproses</option>
                                    <option value="Selesai" {{ $pendaftaran->status == 'Selesai' ? 'selected' : '' }}>
                                        Selesai</option>
                                    <option value="Batal" {{ $pendaftaran->status == 'Batal' ? 'selected' : '' }}>
                                        Batal</option>
                                </select>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <strong>Keluhan Utama</strong>
                        </div>
                        <div class="col-sm-8">
                            {{ $pendaftaran->keluhan_utama }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <strong>Catatan</strong>
                        </div>
                        <div class="col-sm-8">
                            {{ $pendaftaran->catatan }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <strong>Registered At</strong>
                        </div>
                        <div class="col-sm-8">
                            {{ $pendaftaran->registered_at }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <strong>Called At</strong>
                        </div>
                        <div class="col-sm-8">
                            {{ $pendaftaran->called_at }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <strong>Started At</strong>
                        </div>
                        <div class="col-sm-8">
                            {{ $pendaftaran->started_at }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <strong>Completed At</strong>
                        </div>
                        <div class="col-sm-8">
                            {{ $pendaftaran->completed_at }}
                        </div>
                    </div>
                </div>

                <div class="modal-header">
                    <h5 class="modal-title text-info" id="showModalLabel{{ $pendaftaran->id }}">
                        Rekam Medis
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <strong>Berat Badan</strong>
                        </div>
                        <div class="col-sm-8">
                            {{ $pendaftaran->rekamMedise->berat_badan ?? 'Tidak Ada Berat Badan' }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <strong>Tinggi Badan</strong>
                        </div>
                        <div class="col-sm-8">
                            {{ $pendaftaran->rekamMedise->tinggi_badan ?? 'Tidak Ada Tinggi Badan' }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <strong>Tekanan Darah</strong>
                        </div>
                        <div class="col-sm-8">
                            {{ $pendaftaran->rekamMedise->tekanan_darah ?? 'Tidak Ada Tekanan Darah' }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <strong>Tempratur</strong>
                        </div>
                        <div class="col-sm-8">
                            {{ $pendaftaran->rekamMedise->tempratur ?? 'Tidak Ada Tempratur' }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <strong>Denyut Nadi</strong>
                        </div>
                        <div class="col-sm-8">
                            {{ $pendaftaran->rekamMedise->denyut_nadi ?? 'Tidak Ada Denyut Nadi' }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <strong>Keluhan Utama</strong>
                        </div>
                        <div class="col-sm-8">
                            {{ $pendaftaran->rekamMedise->keluhan_utama ?? 'Tidak Ada Keluhan' }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <strong>Riwayat Penyakit</strong>
                        </div>
                        <div class="col-sm-8">
                            {{ $pendaftaran->rekamMedise->riwayat_penyakit ?? 'Tidak Ada Riwayat Penyakit' }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <strong>Diagnosis</strong>
                        </div>
                        <div class="col-sm-8">
                            {{ $pendaftaran->rekamMedise->diagnosis ?? 'Tidak Ada Diagnosis' }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <strong>Rencana Pengobatan</strong>
                        </div>
                        <div class="col-sm-8">
                            {{ $pendaftaran->rekamMedise->rencana_prengobatan ?? 'TIdak Ada Rencana Pengobatan' }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <strong>Resep Obat</strong>
                        </div>
                        <div class="col-sm-8">
                            {{ $pendaftaran->rekamMedise->resep_obat ?? 'Tidak Ada Resep Obat' }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <strong>Notes</strong>
                        </div>
                        <div class="col-sm-8">
                            {{ $pendaftaran->rekamMedise->notes ?? 'Tidak Ada Notes/Catatan' }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <strong>Kunjungan Berikutnya</strong>
                        </div>
                        <div class="col-sm-8">
                            {{ $pendaftaran->rekamMedise->kunjungan_berikutnya ?? 'Tidak Ada Kunjungan Berikutnya' }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <strong>Catatan Berikutnya</strong>
                        </div>
                        <div class="col-sm-8">
                            {{ $pendaftaran->rekamMedise->catatan_berikutnya ?? 'Tidak Ada Catatan Berikutnya' }}
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    @if ($pendaftaran->status != 'Selesai' || $pendaftaran->status != 'Batal')
                        <button type="submit" class="btn btn-primary">Update Status</button>
                    @endif
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
