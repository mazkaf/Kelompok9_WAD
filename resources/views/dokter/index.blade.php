@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Dokter</h1>
    <a href="{{ route('dokter.create') }}" class="btn btn-primary mb-3">Tambah Dokter</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Spesialis</th>
                <th>No. Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dokters as $dokter)
            <tr>
                <td>{{ $dokter->nama }}</td>
                <td>{{ $dokter->spesialis }}</td>
                <td>{{ $dokter->no_telepon }}</td>
                <td>
                    <a href="{{ route('dokter.edit', $dokter->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('dokter.destroy', $dokter->id) }}" method="POST" style="display:inline-block">
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