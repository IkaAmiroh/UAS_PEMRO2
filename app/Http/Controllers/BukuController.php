<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    /* -------------------------------------------------
       TAMPILKAN DAFTAR BUKU (+PENCARIAN)
    --------------------------------------------------*/
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        $bukus = Buku::when($keyword, function ($query) use ($keyword) {
                    $query->where('judul', 'like', "%{$keyword}%");
                })
                ->orderByDesc('created_at')
                ->get();

        return view('buku.index', compact('bukus', 'keyword'));
    }

    /* -------------------------------------------------
       FORM TAMBAH BUKU
    --------------------------------------------------*/
    public function create()
    {
        return view('buku.create');
    }

    /* -------------------------------------------------
       SIMPAN DATA BUKU
    --------------------------------------------------*/
    public function store(Request $request)
    {
        $request->validate([
            'judul'        => 'required|string|max:255',
            'penulis'      => 'required|string|max:255',
            'penerbit'     => 'required|string|max:255',
            'tahun_terbit' => 'required|digits:4|integer|min:1900',
            // 'judul'     => 'unique:bukus,judul', // ← buka jika ingin judul unik
        ]);

        Buku::create($request->only(['judul','penulis','penerbit','tahun_terbit']));

        return redirect()->route('buku.index')
                         ->with('success','Buku berhasil ditambahkan!');
    }

    /* -------------------------------------------------
       FORM EDIT BUKU
    --------------------------------------------------*/
    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    /* -------------------------------------------------
       UPDATE DATA BUKU
    --------------------------------------------------*/
    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judul'        => 'required|string|max:255',
            'penulis'      => 'required|string|max:255',
            'penerbit'     => 'required|string|max:255',
            'tahun_terbit' => 'required|digits:4|integer|min:1900',
        ]);

        $buku->update($request->only(['judul','penulis','penerbit','tahun_terbit']));

        return redirect()->route('buku.index')
                         ->with('success','Buku berhasil diperbarui!');
    }

    /* -------------------------------------------------
       HAPUS DATA BUKU
    --------------------------------------------------*/
    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect()->route('buku.index')
                         ->with('success','Buku berhasil dihapus!');
    }
}
