@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pasien</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nim">NIM</label>
        <input type="text" name="nim" id="nim" value="{{ $pasien->nim }}" required maxlength="50" placeholder="Masukkan NIM pasien" />

        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" value="{{ $pasien->nama }}" required maxlength="255" placeholder="Masukkan nama pasien" />

        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ $pasien->tanggal_lahir->format('Y-m-d') }}" required />

        <label for="no_telepon">No. Telepon</label>
        <input type="text" name="no_telepon" id="no_telepon" value="{{ $pasien->no_telepon }}" required maxlength="20" placeholder="Masukkan nomor telepon" />

        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select name="jenis_kelamin" id="jenis_kelamin" required>
            <option value="" disabled>-- Pilih Jenis Kelamin --</option>
            <option value="Laki-laki" {{ $pasien->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ $pasien->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>

        <label for="dokter_id">Dokter</label>
        <select name="dokter_id" id="dokter_id">
            <option value="">-- Pilih Dokter --</option>
            @foreach ($dokters as $dokter)
                <option value="{{ $dokter->id }}" {{ $pasien->dokter_id == $dokter->id ? 'selected' : '' }}>
                    {{ $dokter->nama }} ({{ $dokter->spesialis }})
                </option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection