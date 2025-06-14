@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Pasien</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pasien.store') }}" method="POST">
        @csrf
        <label for="nim">NIM</label>
        <input type="text" name="nim" id="nim" value="{{ old('nim') }}" required maxlength="50" placeholder="Masukkan NIM pasien" />

        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required maxlength="255" placeholder="Masukkan nama pasien" />

        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required />

        <label for="no_telepon">No. Telepon</label>
        <input type="text" name="no_telepon" id="no_telepon" value="{{ old('no_telepon') }}" required maxlength="20" placeholder="Masukkan nomor telepon" />

        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select name="jenis_kelamin" id="jenis_kelamin" required>
            <option value="" disabled>-- Pilih Jenis Kelamin --</option>
            <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>

        <label for="dokter_id">Dokter</label>
        <select name="dokter_id" id="dokter_id">
            <option value="">-- Pilih Dokter --</option>
            @foreach ($dokters as $dokter)
                <option value="{{ $dokter->id }}" {{ old('dokter_id') == $dokter->id ? 'selected' : '' }}>
                    {{ $dokter->nama }} ({{ $dokter->spesialis }})
                </option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection