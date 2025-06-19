<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Superadmin\RekamMedise;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RekamMediseRequest;
use App\Models\Superadmin\Pendaftaran;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RekamMediseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $rekamMedises = RekamMedise::paginate();

        return view('superadmin.rekam-medise.index', compact('rekamMedises'))
            ->with('i', ($request->input('page', 1) - 1) * $rekamMedises->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($pendaftaran_id): View
    {
        // Ambil data pendaftaran berdasarkan ID
        $pendaftaran = Pendaftaran::with(['user', 'dokter'])->findOrFail($pendaftaran_id);

        // Buat instance baru untuk form
        $rekamMedise = new RekamMedise();

        // Set nilai dari data pendaftaran
        $rekamMedise->pendaftaran_id = $pendaftaran->id;
        $rekamMedise->pasien_id = $pendaftaran->pasien_id;
        $rekamMedise->dokter_id = $pendaftaran->dokter_id;

        return view('superadmin.rekam-medise.create', compact(
            'rekamMedise',
            'pendaftaran'
        ));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(RekamMediseRequest $request): RedirectResponse
    {
        RekamMedise::create($request->validated());

        return Redirect::route('superadmin.pendaftarans.index')
            ->with('success', 'RekamMedise created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $rekamMedise = RekamMedise::find($id);

        return view('superadmin.rekam-medise.show', compact('rekamMedise'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $rekamMedise = RekamMedise::find($id);

        return view('superadmin.rekam-medise.edit', compact('rekamMedise'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RekamMediseRequest $request, RekamMedise $rekamMedise): RedirectResponse
    {
        $rekamMedise->update($request->validated());

        return Redirect::route('superadmin.rekam-medises.index')
            ->with('success', 'RekamMedise updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        RekamMedise::find($id)->delete();

        return Redirect::route('superadmin.rekam-medises.index')
            ->with('success', 'RekamMedise deleted successfully');
    }
}
