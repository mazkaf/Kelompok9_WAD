<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Pasien - Telkomedika</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f6f8;
            margin: 0; padding: 20px;
            color: #333;
        }
        h1 {
            color: #0b3d91;
            margin-bottom: 20px;
        }
        form {
            background: white;
            padding: 25px;
            border-radius: 6px;
            max-width: 500px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
        }
        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus,
        input[type="date"]:focus,
        select:focus {
            border-color: #0b3d91;
            outline: none;
        }
        .btn-submit {
            background-color: #0b3d91;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-submit:hover {
            background-color: #093270;
        }
        .btn-back {
            display: inline-block;
            margin-bottom: 15px;
            color: #0b3d91;
            text-decoration: none;
            font-weight: 600;
        }
        .alert-error {
            background: #f8d7da;
            padding: 10px;
            border-radius: 4px;
            color: #721c24;
            margin-bottom: 15px;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <h1>Edit Pasien</h1>
    <a href="{{ route('pasien.index') }}" class="btn-back">&larr; Kembali ke Data Pasien</a>

    @if ($errors->any())
        <div class="alert-error">
            <strong>Maaf, ada kesalahan saat memasukkan data:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nim">NIM</label>
        <input type="text" name="nim" id="nim" value="{{ old('nim', $pasien->nim) }}" required maxlength="50" placeholder="Masukkan NIM pasien" />

        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" value="{{ old('nama', $pasien->nama) }}" required maxlength="255" placeholder="Masukkan nama pasien" />

        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $pasien->tanggal_lahir->format('Y-m-d')) }}" required />

        <label for="no_telepon">No. Telepon</label>
        <input type="text" name="no_telepon" id="no_telepon" value="{{ old('no_telepon', $pasien->no_telepon) }}" required maxlength="20" placeholder="Masukkan nomor telepon" />

        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select name="jenis_kelamin" id="jenis_kelamin" required>
            <option value="" disabled>-- Pilih Jenis Kelamin --</option>
            <option value="Laki-laki" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>

        <button type="submit" class="btn-submit">Perbarui</button>
    </form>
</body>
</html>