@extends('layouts.app', ['activePage' => 'karyawan-management', 'title' => 'PT. SMM (Karyawan)', 'navName' => 'Data Karyawan', 'activeButton' => 'masterdata'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Data Karyawan') }}</h4>
                        </div>
                        <div class="">
                        <a href="{{ route('karyawan.create') }}" class="btn btn-sm btn-primary">Tambah Karyawan</a>
                            <div class="card-body table-full-width table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>No</th>
                                        <th>Kode NIK</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jabatan</th>
                                        <th>Gaji Pokok</th>
                                        <th>Insentif</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($karyawans as $karyawan)
                                            <tr>
                                                <td>{{ $karyawan->kode_nik }}</td>
                                                <td>{{ $karyawan->kode_nik }}</td>
                                                <td>{{ $karyawan->nama_lengkap }}</td>
                                                <td>{{ $karyawan->jabatan }}</td>
                                                <td>Rp. {{ $karyawan->gaji_pokok }}</td>
                                                <td>Rp. {{ $karyawan->insentif }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm mx-1"
                                                        data-toggle="modal"
                                                        data-target="#modalDetail{{ $karyawan->kode_nik }}">Detail</button>

                                                        <a href="{{ route('karyawan.edit', ['karyawan' => $karyawan->kode_nik]) }}" class="btn btn-sm btn-primary">Edit</a>


                                                    <form action="{{ route('karyawan.destroy', $karyawan->kode_nik) }}" method="POST"
                                                        style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm mx-1"
                                                            onclick="return confirm('Anda yakin ingin menghapus?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <!-- Modal Detail -->
<div class="modal fade" id="modalDetail{{ $karyawan->kode_nik }}" tabindex="-1"
    aria-labelledby="modalDetailLabel{{ $karyawan->kode_nik }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailLabel{{ $karyawan->kode_nik }}">Detail Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Kode NIK:</strong> {{ $karyawan->kode_nik }}</p>
                <p><strong>Nama Lengkap:</strong> {{ $karyawan->nama_lengkap }}</p>
                <p><strong>Jabatan:</strong> {{ $karyawan->jabatan }}</p>
                <p><strong>Gaji Pokok:</strong> {{ $karyawan->gaji_pokok }}</p>
                <p><strong>Insentif:</strong> {{ $karyawan->insentif }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{-- {{ $karyawans->links() }} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Create -->
            <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="modalCreateLabel" aria-hidden="true">
                <!-- Isi modal -->
            </div>

        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>
@endpush
