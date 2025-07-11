<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-3">Daftar Buku</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('buku.index') }}" method="GET" class="row mb-3">
    <div class="col-md-4">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari judul buku...">
    </div>
    <div class="col-auto">
        <button class="btn btn-outline-primary">Cari</button>
        <a href="{{ route('buku.index') }}" class="btn btn-outline-secondary">Reset</a>
    </div>
</form>

    <a href="{{ route('buku.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bukus as $buku)
            <tr>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->penulis }}</td>
                <td>{{ $buku->penerbit }}</td>
                <td>{{ $buku->tahun_terbit }}</td>
                <td>
                    <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus buku ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
