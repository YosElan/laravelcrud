<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SppModel;

class Siswa extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->level != 'siswa') {
            return redirect()->intended('login');
        }
        // echo "Ini Halaman Siswa";

        $pembayaran = SppModel::all();
        $data = [
            'title' => 'Spp | MyApp',
            'active' => 'Spp',
            'pembayaran' => $pembayaran
        ];

        return view('siswa.index', $data);
    }
}
