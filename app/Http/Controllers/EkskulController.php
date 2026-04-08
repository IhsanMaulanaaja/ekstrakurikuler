<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ekstrakurikuler;

class EkskulController extends Controller
{
    public function pilihanEkskul()
    {
        $ekskulList = Ekstrakurikuler::all();
        return view('pilihan-ekskul-siswa', compact('ekskulList'));
    }
}
