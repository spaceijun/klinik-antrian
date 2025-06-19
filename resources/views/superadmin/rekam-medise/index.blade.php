@extends('layouts.app')

@section('template_title')
    Rekam Medises
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
            @include('layouts.messages')
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Rekam Medises') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('superadmin.rekam-medises.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Pendaftaran Id</th>
									<th >Pasien Id</th>
									<th >Dokter Id</th>
									<th >Berat Badan</th>
									<th >Tinggi Badan</th>
									<th >Tekanan Darah</th>
									<th >Tempratur</th>
									<th >Denyut Nadi</th>
									<th >Keluhan Utama</th>
									<th >Riwayat Penyakit</th>
									<th >Diagnosis</th>
									<th >Rencana Pengobatan</th>
									<th >Resep Obat</th>
									<th >Notes</th>
									<th >Kunjungan Berikutnya</th>
									<th >Catatan Berikutnya</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($rekamMedises as $rekamMedise)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $rekamMedise->pendaftaran_id }}</td>
										<td >{{ $rekamMedise->pasien_id }}</td>
										<td >{{ $rekamMedise->dokter_id }}</td>
										<td >{{ $rekamMedise->berat_badan }}</td>
										<td >{{ $rekamMedise->tinggi_badan }}</td>
										<td >{{ $rekamMedise->tekanan_darah }}</td>
										<td >{{ $rekamMedise->tempratur }}</td>
										<td >{{ $rekamMedise->denyut_nadi }}</td>
										<td >{{ $rekamMedise->keluhan_utama }}</td>
										<td >{{ $rekamMedise->riwayat_penyakit }}</td>
										<td >{{ $rekamMedise->diagnosis }}</td>
										<td >{{ $rekamMedise->rencana_pengobatan }}</td>
										<td >{{ $rekamMedise->resep_obat }}</td>
										<td >{{ $rekamMedise->notes }}</td>
										<td >{{ $rekamMedise->kunjungan_berikutnya }}</td>
										<td >{{ $rekamMedise->catatan_berikutnya }}</td>

                                            <td>
                                                <form action="{{ route('superadmin.rekam-medises.destroy', $rekamMedise->id) }}" method="POST">
                                                <button type="button" class="btn btn-sm btn-primary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#showModal{{ $rekamMedise->id }}">
                                                        <i class="las la-eye"></i> {{ __('Show') }}
                                                    </button>                                                    
                                                    <a class="btn btn-sm btn-success" href="{{ route('superadmin.rekam-medises.edit', $rekamMedise->id) }}"><i class="las la-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="las la-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @include('superadmin.rekamMedise.partials.modal-rekamMedise')
                                    @empty
                                        <tr>
                                                <td colspan="100%" class="text-center py-4">
                                                    <div class="text-muted">
                                                        <i class="las la-inbox la-3x mb-2"></i>
                                                        <p class="mb-0">{{ __('No data available') }}</p>
                                                    </div>
                                                </td>
                                            </tr>                                   
                                     @endforelse
                                </tbody>
                            </table>
                        </div>
                         @include('layouts.pagination', ['paginator' => $rekamMedises])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
