@extends('layouts.app')

@section('template_title')
    Dokters
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
                                {{ __('Dokters') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('superadmin.dokters.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Nama Dokter</th>
                                        <th>Spesialis</th>
                                        <th>Telephone</th>
                                        <th>Alamat</th>
                                        <th>Waktu Mulai Praktik</th>
                                        <th>Waktu Selesai Praktik</th>
                                        <th>Is Active</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($dokters as $dokter)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $dokter->nama_dokter }}</td>
                                            <td>{{ $dokter->spesialis }}</td>
                                            <td>{{ $dokter->telephone }}</td>
                                            <td>{{ $dokter->alamat }}</td>
                                            <td>{{ $dokter->waktu_mulai_praktik }}</td>
                                            <td>{{ $dokter->waktu_selesai_praktik }}</td>
                                            <td>{{ $dokter->is_active }}</td>

                                            <td>
                                                <form action="{{ route('superadmin.dokters.destroy', $dokter->id) }}"
                                                    method="POST">
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#showModal{{ $dokter->id }}">
                                                        <i class="las la-eye"></i> {{ __('Show') }}
                                                    </button>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('superadmin.dokters.edit', $dokter->id) }}"><i
                                                            class="las la-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i
                                                            class="las la-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @include('superadmin.dokter.partials.modal-dokter')
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
                        @include('layouts.pagination', ['paginator' => $dokters])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
