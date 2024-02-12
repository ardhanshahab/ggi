@extends('layouts.app', ['activePage' => 'penghitungan-gaji-management', 'activeButton' => 'laravel', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Create Penghitungan Gaji'])

@section('content')
    <div class="content">
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-12 order-xl-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Create Penghitungan Gaji') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('penghitungan_gaji.index') }}" class="btn btn-sm btn-default">{{ __('Back to list') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('penghitungan_gaji.store') }}" autocomplete="off" enctype="multipart/form-data">
                                @csrf

                                @include('alerts.success')
                                @include('alerts.errors')

                                <h6 class="heading-small text-muted mb-4">{{ __('Penghitungan Gaji Information') }}</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('periode') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-periode">{{ __('Periode') }}</label>
                                        <input type="text" name="periode" id="input-periode" class="form-control{{ $errors->has('periode') ? ' is-invalid' : '' }}" placeholder="{{ __('Periode') }}" value="{{ old('periode') }}" required autofocus>

                                        @include('alerts.feedback', ['field' => 'periode'])
                                    </div>
                                    <div class="form-group{{ $errors->has('tanggal') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-tanggal">{{ __('Bulan dan Tahun') }}</label>
                                        <input type="month" name="tanggal" id="input-tanggal" class="form-control{{ $errors->has('tanggal') ? ' is-invalid' : '' }}" value="{{ old('tanggal') }}" required>

                                        @include('alerts.feedback', ['field' => 'tanggal'])
                                    </div>
                                    <div class="form-group{{ $errors->has('kode_nik') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-kode-nik">{{ __('Kode NIK') }}</label>
                                        <input type="text" name="kode_nik" id="input-kode-nik" class="form-control{{ $errors->has('kode_nik') ? ' is-invalid' : '' }}" placeholder="{{ __('Kode NIK') }}" value="{{ old('kode_nik') }}" required>

                                        @include('alerts.feedback', ['field' => 'kode_nik'])
                                    </div>
                                    <div class="form-group{{ $errors->has('jumlah_hadir') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-jumlah-hadir">{{ __('Jumlah Hadir') }}</label>
                                        <input type="number" name="jumlah_hadir" id="input-jumlah-hadir" class="form-control{{ $errors->has('jumlah_hadir') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah Hadir') }}" value="{{ old('jumlah_hadir') }}" required>

                                        @include('alerts.feedback', ['field' => 'jumlah_hadir'])
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
                                    <div class="form-group{{ $errors->has('pot_asuransi') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-pot-asuransi">{{ __('Potongan Asuransi') }}</label>
                                        <input type="number" name="pot_asuransi" id="input-pot-asuransi" class="form-control{{ $errors->has('pot_asuransi') ? ' is-invalid' : '' }}" placeholder="{{ __('Potongan Asuransi') }}" value="{{ old('pot_asuransi') }}" required>

                                        @include('alerts.feedback', ['field' => 'pot_asuransi'])
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
