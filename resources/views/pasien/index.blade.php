<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Data Pasien - Telkomedika</title>
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
        .btn {
            background-color: #0b3d91;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            float: right;
            margin-bottom: 10px;
        }
        .btn:hover {
            background-color: #093270;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        th {
            background-color: #0b3d91;
            color: white;
            text-transform: uppercase;
            font-size: 13px;
        }
        tr:hover {
            background-color: #f1f8ff;
        }
        .action-buttons form {
            display: inline;
        }
        .action-buttons button, .action-buttons a {
            font-size: 14px;
            padding: 6px 12px;
            margin-right: 4px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            color: white;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }
        .edit-btn {
            background-color: #1f7a1f;
        }
        .edit-btn:hover {
            background-color: #145314;
        }
        .delete-btn {
            background-color: #c53939;
        }
        .delete-btn:hover {
            background-color: #841c1c;
        }
        .alert {
            margin-bottom: 20px;
            padding: 12px;
            border-radius: 5px;
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
        }
        nav.pagination {
            margin-top: 15px;
            text-align: right;
        }
        nav.pagination a, nav.pagination span {
            margin: 0 3px;
            padding: 5px 10px;
            text-decoration: none;
            color: #0b3d91;
            border: 1px solid #0b3d91;
            border-radius: 3px;
            font-size: 14px;
        }
        nav.pagination .active span {
            background-color: #0b3d91;
            color: white;
            border-color: #0b3d91;
        }
    </style>
</head>
<body>

<h1>Data Pasien</h1>
<a href="{{ route('pasien.create') }}" class="btn">Tambah Pasien</a>

@if(session('success'))
    <div class="alert">{{ session('success') }}</div>
@endif

<table>
    <thead>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>No. Telepon</th>
            <th>Jenis Kelamin</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($pasiens as $pasien)
        <tr>
            <td>{{ $pasien->nim }}</td>
            <td>{{ $pasien->nama }}</td>
            <td>{{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d-m-Y') }}</td>
            <td>{{ $pasien->no_telepon }}</td>
            <td>{{ $pasien->jenis_kelamin }}</td>
            <td class="action-buttons">
                <a href="{{ route('pasien.edit', $pasien->id) }}" class="edit-btn">Edit</a>
                <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pasien ini?');" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-btn">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" style="text-align:center;">Tidak ada data pasien.</td></tr>
        @endforelse
    </tbody>
</table>

<nav class="pagination">
    {{ $pasiens->links() }}
</nav>

</body>
</html>