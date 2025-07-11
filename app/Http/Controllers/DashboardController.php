<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class DashboardController extends Controller
{
    public function index()
    {
        $bukus = Buku::all(); // ambil semua data buku

        return view('dashboard', compact('bukus')); // ✅ lempar ke view
    }
}
