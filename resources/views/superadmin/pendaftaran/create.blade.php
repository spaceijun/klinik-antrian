@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Pendaftaran
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col">

                <div class="card card-animate">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Pendaftaran</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('superadmin.pendaftarans.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('superadmin.pendaftaran.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
