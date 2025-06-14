
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Dokter</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dokter.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Spesialis</label>
            <input type="text" name="spesialis" class="form-control" required>
        </div>
        <div class="form-group">
            <label>No Telepon</label>
            <input type="text" name="no_telepon" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection