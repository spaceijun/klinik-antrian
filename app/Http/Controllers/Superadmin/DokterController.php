<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Superadmin\Dokter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DokterRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $dokters = Dokter::paginate();

        return view('superadmin.dokter.index', compact('dokters'))
            ->with('i', ($request->input('page', 1) - 1) * $dokters->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $dokter = new Dokter();

        return view('superadmin.dokter.create', compact('dokter'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DokterRequest $request): RedirectResponse
    {
        Dokter::create($request->validated());

        return Redirect::route('superadmin.dokters.index')
            ->with('success', 'Dokter created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $dokter = Dokter::find($id);

        return view('superadmin.dokter.show', compact('dokter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $dokter = Dokter::find($id);

        return view('superadmin.dokter.edit', compact('dokter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DokterRequest $request, Dokter $dokter): RedirectResponse
    {
        $dokter->update($request->validated());

        return Redirect::route('superadmin.dokters.index')
            ->with('success', 'Dokter updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Dokter::find($id)->delete();

        return Redirect::route('superadmin.dokters.index')
            ->with('success', 'Dokter deleted successfully');
    }
}
