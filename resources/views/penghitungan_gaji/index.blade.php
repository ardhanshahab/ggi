@extends('layouts.app', ['activePage' => 'penghitungan_gaji-management', 'title' => 'PT. SMM (Penghitungan Gaji)', 'navName' => 'Data Penghitungan Gaji', 'activeButton' => 'penghitungan_gaji-management'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Data Penghitungan Gaji') }}</h4>
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-primary mx-1 my-1" data-toggle="modal"
                            data-target="#modalCreate">
                            Penghitungan Gaji
                        </button>
                        <div class="card-body table-full-width table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>No</th>
                                        <th>Periode</th>
                                        <th>Tanggal Input</th>
                                        <th>Kode NIK</th>
                                        <th>Jumlah Hadir</th>
                                        <th>Gaji Pokok</th>
                                        <th>Insentif</th>
                                        <th>Potongan Asuransi</th>
                                        <th>Total Gaji</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($penghitunganGajis as $gaji)
                                            <tr>
                                                <td>{{ $gaji->id }}</td>
                                                <td>{{ $gaji->periode }}</td>
                                                <td>{{ $gaji->tanggal }}</td>
                                                <td>{{ $gaji->kode_nik }}</td>
                                                <td>{{ $gaji->jumlah_hadir }}</td>
                                                <td>{{ $gaji->gaji_pokok }}</td>
                                                <td>{{ $gaji->insentif }}</td>
                                                <td>{{ $gaji->pot_asuransi }}</td>
                                                <td>{{ $gaji->total_gaji }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm mx-1"
                                                        data-toggle="modal"
                                                        data-target="#modalDetail{{ $gaji->id }}">Detail</button>

                                                    <a href="{{ route('penghitungan_gaji.edit', ['penghitungan_gaji' => $gaji->id]) }}" class="btn btn-sm btn-primary">Edit</a>

                                                    <form action="{{ route('penghitungan_gaji.destroy', $gaji->id) }}" method="POST"
                                                        style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm mx-1"
                                                            onclick="return confirm('Anda yakin ingin menghapus?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{-- {{ $penghitungan_gaji->links() }} --}}
                                </div>
                                 <!-- Modal Create -->
                                    <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="modalCreateLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="modalCreateLabel">Tambah Barang</h4>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <form method="POST" action="{{ route('penghitungan_gaji.store') }}">
                                                                @csrf
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group{{ $errors->has('periode') ? ' has-danger' : '' }}">
                                                                            <label for="peroide" class="col-form-label text-left">Periode :</label>
                                                                            <input type="month" name="periode" id="input-periode" class="form-control{{ $errors->has('periode') ? ' is-invalid' : '' }}" value="{{ old('periode') }}" required>

                                                                            @include('alerts.feedback', ['field' => 'periode'])
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group{{ $errors->has('tanggal') ? ' has-danger' : '' }}">
                                                                            <label for="peroide" class="col-form-label text-left">Tanggal Input :</label>
                                                                            <input type="date" name="tanggal" id="input-tanggal" class="form-control{{ $errors->has('tanggal') ? ' is-invalid' : '' }}" placeholder="{{ __('Tanggal') }}" value="{{ old('tanggal') }}" required>
                                                                            @include('alerts.feedback', ['field' => 'tanggal'])
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row p-1 m-1">
                                                                    <h5 class="col-12">Daftar Barang</h5>
                                                                    <div class="col-md-12" style="overflow-x: scroll">
                                                                        <table class="table tabel table-responsive" id="tabel">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Kode NIK</th>
                                                                                    <th>Nama Lengkap</th>
                                                                                    <th>Jumlah Hadir Kerja</th>
                                                                                    <th>Gaji Pokok</th>
                                                                                    <th>Insentif</th>
                                                                                    <th>Asuransi</th>
                                                                                    <th>Total Gaji</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="barang-container">
                                                                                <tr>
                                                                                    <td>
                                                                                        <select class="form-control" name="nik[]" id="nik">
                                                                                            <option value="">Pilih NIK</option>
                                                                                            @foreach ($karyawans as $karyawan)
                                                                                                <option value="{{ $karyawan->kode_nik }}">{{ $karyawan->kode_nik }}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </td>
                                                                                    <td><input type="text" class="form-control" name="nama_lengkap[]"
                                                                                        id="nama_lengkap1" placeholder="Nama Lengkap" readonly></td>
                                                                                    <td><input type="text" class="form-control" name="jumlah_hadir[]"
                                                                                            id="jumlah_hadir" placeholder="Jumlah Hadir"></td>
                                                                                    <td><input type="number" class="form-control" name="gaji_pokok[]"
                                                                                            id="gaji_pokok1" style="width: 100px;" placeholder="Gaji Pokok" readonly></td>
                                                                                    <td><input type="number" class="form-control" name="insentif[]"
                                                                                            id="insentif1" style="width: 100px;" placeholder="Insentif" readonly></td>
                                                                                    <td><input type="number" class="form-control" name="asuransi[]"
                                                                                            id="asuransi1" style="width: 100px;" placeholder="Asuransi"></td>
                                                                                    <td><input type="number" class="form-control" name="totalgaji[]"
                                                                                            id="totalgaji1" style="width: 100px;" placeholder="Total Gaji" readonly></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <button type="button" id="tambah-data" class="btn btn-success">Tambah Data</button>
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                                <button data-dismiss="modal" class="btn btn-primary">Cancel</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .modal .modal-dialog-xl {
            min-width: 90%;
            min-height: 90%;
            justify-content: center;
        }
    </style>
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            // Fungsi untuk mengisi otomatis nama, gaji pokok, dan insentif
            $('#nik').change(function(){
                var kode_nik = $(this).val();
                if(kode_nik !== '') {
                    $.ajax({
                        url:"{{ route('get-karyawan-detail') }}",
                        method:"GET",
                        data:{kode_nik:kode_nik},
                        success:function(response) {
                            if(response) {
                                console.log(response);
                                $('#nama_lengkap1').val(response.nama_lengkap);
                                $('#gaji_pokok1').val(response.gaji_pokok);
                                $('#insentif1').val(response.insentif);
                            }
                        }
                    });
                } else {
                    $('#nama').val('');
                    $('#gaji_pokok1').val('');
                    $('#insentif1').val('');
                }
            });
              // Fungsi untuk menambahkan tabel baru
              $('#tambah-data').click(function() {
                var nikOptions = '';
                @foreach ($karyawans as $karyawan)
                    nikOptions += '<option value="{{ $karyawan->kode_nik }}">{{ $karyawan->kode_nik }}</option>';
                @endforeach

                var newRow = '<tr>' +
                                '<td>' +
                                    '<select class="form-control nik-select" name="nik[]">' +
                                        '<option value="">Pilih NIK</option>' +
                                        nikOptions +
                                    '</select>' +
                                '</td>' +
                                '<td><input type="text" class="form-control nama-lengkap" name="nama_lengkap[]" placeholder="Nama Lengkap" readonly></td>' +
                                '<td><input type="text" class="form-control jumlah-hadir" name="jumlah_hadir[]" placeholder="Jumlah Hadir"></td>' +
                                '<td><input type="number" class="form-control gaji-pokok" name="gaji_pokok[]" style="width: 100px;" placeholder="Gaji Pokok" readonly></td>' +
                                '<td><input type="number" class="form-control insentif" name="insentif[]" style="width: 100px;" placeholder="Insentif" readonly></td>' +
                                '<td><input type="number" class="form-control asuransi" name="asuransi[]" style="width: 100px;" placeholder="Asuransi"></td>' +
                                '<td><input type="number" class="form-control total-gaji" name="totalgaji[]" style="width: 100px;" placeholder="Total Gaji" readonly></td>' +
                            '</tr>';
                $('#barang-container').append(newRow);
            });
            $(document).on('change', '.nik-select, .jumlah-hadir, .asuransi', function(){
                var currentRow = $(this).closest('tr');
                hitungGajiPokok(currentRow);
                console.log(hitungGajiPokok);
            });
            // Fungsi untuk mengisi otomatis nama, gaji pokok, dan insentif
            $(document).on('change', '.nik-select', function(){

                var kode_nik = $(this).val();
                var currentRow = $(this).closest('tr');

                if(kode_nik !== '') {
                    $.ajax({
                        url:"{{ route('get-karyawan-detail') }}",
                        method:"GET",
                        data:{kode_nik:kode_nik},
                        success:function(response) {
                            if(response) {
                                currentRow.find('.nama-lengkap').val(response.nama_lengkap);
                                currentRow.find('.gaji-pokok').val(response.gaji_pokok);
                                currentRow.find('.insentif').val(response.insentif);
                            }
                        }
                    });
                } else {
                    currentRow.find('.nama-lengkap').val('');
                    currentRow.find('.gaji-pokok').val('');
                    currentRow.find('.insentif').val('');
                }
            });
            function hitungGajiPokok(row) {
                var gajiPokok;
                if (row.is(':first-child')) {
                    gajiPokok = parseFloat($('#gaji_pokok1').val());
                } else {
                    gajiPokok = parseFloat(row.find('.gaji-pokok').val());
                }
                var asuransi = parseFloat(row.find('.asuransi').val());
                var jumlahHadir = parseFloat(row.find('.jumlah-hadir').val());
                var insentif = parseFloat(row.find('.insentif').val());

                // Hitung gaji pokok berdasarkan formula
                var gajiPokokFormula = (gajiPokok - (gajiPokok * (asuransi / 100))) + (jumlahHadir * insentif);
                row.find('.total-gaji').val(gajiPokokFormula.toFixed(2));
            }

        });
    </script>
@endpush
