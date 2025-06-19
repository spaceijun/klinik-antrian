<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Superadmin\Pendaftaran;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PendaftaranRequest;
use App\Models\Superadmin\Dokter;
use App\Models\Superadmin\RekamMedise;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $pendaftarans = Pendaftaran::with('user', 'dokter', 'rekamMedise')->paginate();
        // $rekamMedise = RekamMedise::where('pendaftaran_id', $pendaftarans->id)->first();

        return view('superadmin.pendaftaran.index', compact('pendaftarans'))
            ->with('i', ($request->input('page', 1) - 1) * $pendaftarans->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pendaftaran = new Pendaftaran();
        $pasiens = User::where('role', 'pasien')->get();
        $dokters = Dokter::all();

        return view('superadmin.pendaftaran.create', compact('pendaftaran', 'pasiens', 'dokters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PendaftaranRequest $request): RedirectResponse
    {
        Pendaftaran::create($request->validated());

        return Redirect::route('superadmin.pendaftarans.index')
            ->with('success', 'Pendaftaran created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $pendaftaran = Pendaftaran::find($id);

        return view('superadmin.pendaftaran.show', compact('pendaftaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $pendaftaran = Pendaftaran::find($id);
        $pasiens = User::where('role', 'pasien')->get();
        $dokters = Dokter::all();

        return view('superadmin.pendaftaran.edit', compact('pendaftaran', 'pasiens', 'dokters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PendaftaranRequest $request, Pendaftaran $pendaftaran): RedirectResponse
    {
        $pendaftaran->update($request->validated());

        return Redirect::route('superadmin.pendaftarans.index')
            ->with('success', 'Pendaftaran updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Pendaftaran::find($id)->delete();

        return Redirect::route('superadmin.pendaftarans.index')
            ->with('success', 'Pendaftaran deleted successfully');
    }
}
