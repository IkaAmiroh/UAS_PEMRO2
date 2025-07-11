<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    // ✅ Izinkan kolom di‐isi mass‑assignment
    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
    ];
}
