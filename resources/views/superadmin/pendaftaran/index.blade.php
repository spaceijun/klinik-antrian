@extends('layouts.app')

@section('template_title')
    Pendaftarans
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                @include('layouts.messages')
                <div class="alert alert-info alert-dismissible alert-label-icon label-arrow fade show material-shadow"
                    role="alert">
                    <i class="ri-airplay-line label-icon"></i><strong>Info</strong> - Jika Status
                    <strong>Menunggu,</strong>Silahkan Input Data Rekam Medis Pasien.
                </div>
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Pendaftarans') }}
                            </span>

                            {{-- <div class="float-right">
                                <a href="{{ route('superadmin.pendaftarans.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div> --}}
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Pasien </th>
                                        <th>Dokter</th>
                                        <th>Tanggal</th>
                                        <th>No Antrian</th>
                                        <th>Queue Position</th>
                                        <th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pendaftarans as $pendaftaran)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $pendaftaran->user->name }}</td>
                                            <td>{{ $pendaftaran->dokter->nama_dokter }}</td>
                                            <td>{{ $pendaftaran->tgl_pendaftaran }}</td>
                                            <td>{{ $pendaftaran->queue_number }}</td>
                                            <td>{{ $pendaftaran->status }}</td>

                                            <td>
                                                <form
                                                    action="{{ route('superadmin.pendaftarans.destroy', $pendaftaran->id) }}"
                                                    method="POST">
                                                    @if ($pendaftaran->status == 'Menunggu')
                                                        <a href="{{ route('superadmin.rekam-medises.create', $pendaftaran->id) }}"
                                                            class="btn btn-sm btn-info"><i class="las la-recycle"></i>Rekam
                                                            Medis</a>
                                                    @endif
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#showModal{{ $pendaftaran->id }}">
                                                        <i class="las la-eye"></i> {{ __('Show') }}
                                                    </button>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('superadmin.pendaftarans.edit', $pendaftaran->id) }}"><i
                                                            class="las la-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    @if ($pendaftaran->status == 'Batal')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i
                                                                class="las la-trash"></i> {{ __('Delete') }}</button>
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                        @include('superadmin.pendaftaran.partials.modal-pendaftaran')
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
                        @include('layouts.pagination', ['paginator' => $pendaftarans])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
