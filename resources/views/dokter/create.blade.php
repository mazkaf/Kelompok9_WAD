@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Dokter</h1>

    <form action="{{ route('dokter.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" required>
        </div>
        <div class="mb-3">
            <label for="spesialis" class="form-label">Spesialis</label>
            <input type="text" class="form-control" name="spesialis" id="spesialis" required>
        </div>
        <div class="mb-3">
            <label for="no_telepon" class="form-label">No. Telepon</label>
            <input type="text" class="form-control" name="no_telepon" id="no_telepon" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection