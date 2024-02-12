<!-- resources/views/user/index.blade.php -->

@extends('layouts.app', ['activePage' => 'stok', 'title' => 'PT. SMM (Manajemen Stok Barang)', 'navName' => 'Manajemen Stok Barang', 'activeButton' => 'manajemen'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Users</div>
                    <div class="card-body">
                        <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">Tambah User</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>

                                            <a href="{{ route('user.edit', ['user' => $user->email]) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('user.destroy', $user->email) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
