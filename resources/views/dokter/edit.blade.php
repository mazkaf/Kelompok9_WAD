@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Dokter</h1>

    <form action="{{ route('dokter.update', $dokter->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama', $dokter->nama) }}" required>
        </div>

        <div class="mb-3">
            <label for="spesialis" class="form-label">Spesialis</label>
            <input type="text" class="form-control" name="spesialis" id="spesialis" value="{{ old('spesialis', $dokter->spesialis) }}" required>
        </div>

        <div class="mb-3">
            <label for="no_telepon" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control" name="no_telepon" id="no_telepon" value="{{ old('no_telepon', $dokter->no_telepon) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection