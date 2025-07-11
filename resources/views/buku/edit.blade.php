<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Edit Buku</h2>

    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" value="{{ $buku->judul }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Penulis</label>
            <input type="text" name="penulis" value="{{ $buku->penulis }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Penerbit</label>
            <input type="text" name="penerbit" value="{{ $buku->penerbit }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tahun Terbit</label>
            <input type="number" name="tahun_terbit" value="{{ $buku->tahun_terbit }}" class="form-control" required>
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
