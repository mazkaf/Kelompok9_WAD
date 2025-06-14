@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Pasien</h1>
    <a href="{{ route('pasien.create') }}" class="btn btn-primary mb-3">Tambah Pasien</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>No. Telepon</th>
                <th>Jenis Kelamin</th>
                <th>Dokter</th> <!-- New column for Dokter -->
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pasiens as $pasien)
            <tr>
                <td>{{ $pasien->nim }}</td>
                <td>{{ $pasien->nama }}</td>
                <td>{{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d-m-Y') }}</td>
                <td>{{ $pasien->no_telepon }}</td>
                <td>{{ $pasien->jenis_kelamin }}</td>
                <td>{{ $pasien->dokter->nama ?? 'Belum ada' }}</td> <!-- Display assigned Dokter -->
                <td>
                    <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection