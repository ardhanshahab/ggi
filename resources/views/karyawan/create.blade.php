@extends('layouts.app', ['activePage' => 'karyawan-management', 'activeButton' => 'laravel', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Create Karyawan'])

@section('content')
    <div class="content">
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-12 order-xl-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Create Karyawan') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('karyawan.index') }}" class="btn btn-sm btn-default">{{ __('Back to list') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('karyawan.store') }}" autocomplete="off" enctype="multipart/form-data">
                                @csrf

                                @include('alerts.success')
                                @include('alerts.errors')

                                <h6 class="heading-small text-muted mb-4">{{ __('Karyawan information') }}</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('kode_nik') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-kode-nik">{{ __('Kode NIK') }}</label>
                                        <input type="text" name="kode_nik" id="input-kode-nik" class="form-control{{ $errors->has('kode_nik') ? ' is-invalid' : '' }}" placeholder="{{ __('Kode NIK') }}" value="{{ old('kode_nik') }}" required autofocus>

                                        @include('alerts.feedback', ['field' => 'kode_nik'])
                                    </div>
                                    <div class="form-group{{ $errors->has('nama_lengkap') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-nama-lengkap">{{ __('Nama Lengkap') }}</label>
                                        <input type="text" name="nama_lengkap" id="input-nama-lengkap" class="form-control{{ $errors->has('nama_lengkap') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Lengkap') }}" value="{{ old('nama_lengkap') }}" required>

                                        @include('alerts.feedback', ['field' => 'nama_lengkap'])
                                    </div>
                                    <div class="form-group{{ $errors->has('jabatan') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-jabatan">{{ __('Jabatan') }}</label>
                                        <input type="text" name="jabatan" id="input-jabatan" class="form-control{{ $errors->has('jabatan') ? ' is-invalid' : '' }}" placeholder="{{ __('Jabatan') }}" value="{{ old('jabatan') }}" required>

                                        @include('alerts.feedback', ['field' => 'jabatan'])
                                    </div>
                                    <div class="form-group{{ $errors->has('gaji_pokok') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-gaji-pokok">{{ __('Gaji Pokok') }}</label>
                                        <input type="number" name="gaji_pokok" id="input-gaji-pokok" class="form-control{{ $errors->has('gaji_pokok') ? ' is-invalid' : '' }}" placeholder="{{ __('Gaji Pokok') }}" value="{{ old('gaji_pokok') }}" required>

                                        @include('alerts.feedback', ['field' => 'gaji_pokok'])
                                    </div>
                                    <div class="form-group{{ $errors->has('insentif') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-insentif">{{ __('Insentif') }}</label>
                                        <input type="number" name="insentif" id="input-insentif" class="form-control{{ $errors->has('insentif') ? ' is-invalid' : '' }}" placeholder="{{ __('Insentif') }}" value="{{ old('insentif') }}" required>

                                        @include('alerts.feedback', ['field' => 'insentif'])
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-default mt-4">{{ __('Save') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
