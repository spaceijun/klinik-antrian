<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use App\Models\Superadmin\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PasienController extends Controller
{
    public function index(): View
    {
        $pendaftaran = Pendaftaran::where('pasien_id', Auth::user()->id)->get();
        return view('pasien.index', compact('pendaftaran'));
    }
}
