<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use App\Models\Superadmin\Dokter;
use App\Models\Superadmin\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftarans = Pendaftaran::with(['user', 'dokter'])
            ->where('pasien_id', Auth::user()->id)
            ->orderBy('tgl_pendaftaran', 'desc')
            ->orderBy('queue_position', 'asc')
            ->paginate(10);

        return view('pasien.pendaftaran.index', compact('pendaftarans'));
    }
    public function create()
    {
        $dokters = Dokter::where('is_active', true)->get();
        return view('pasien.pendaftaran.create', compact('dokters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dokter_id' => 'required|exists:dokters,id',
            'tgl_pendaftaran' => 'required|date|after_or_equal:today',
            'keluhan_utama' => 'required|string|max:1000',
            'catatan' => 'nullable|string|max:1000'
        ]);

        // Generate queue number dan position
        $tglPendaftaran = Carbon::parse($request->tgl_pendaftaran)->format('Y-m-d');
        $lastQueue = Pendaftaran::where('dokter_id', $request->dokter_id)
            ->whereDate('tgl_pendaftaran', $tglPendaftaran)
            ->orderBy('queue_position', 'desc')
            ->first();

        $queuePosition = $lastQueue ? $lastQueue->queue_position + 1 : 1;
        $queueNumber = 'A' . str_pad($queuePosition, 3, '0', STR_PAD_LEFT);

        $pendaftaran = Pendaftaran::create([
            'pasien_id' => Auth::id(),
            'dokter_id' => $request->dokter_id,
            'tgl_pendaftaran' => $request->tgl_pendaftaran,
            'queue_number' => $queueNumber,
            'queue_position' => $queuePosition,
            'keluhan_utama' => $request->keluhan_utama,
            'catatan' => $request->catatan,
            'registered_at' => now(),
            'status' => 'Terdaftar'
        ]);

        return redirect()->route('pasien.pendaftaran.show', $pendaftaran)
            ->with('success', 'Pendaftaran berhasil! Nomor antrian Anda: ' . $queueNumber);
    }

    public function show(Pendaftaran $pendaftaran)
    {
        $pendaftaran->load(['user', 'dokter']);

        // Hitung estimasi waktu tunggu
        $antrian_sebelum = Pendaftaran::where('dokter_id', $pendaftaran->dokter_id)
            ->whereDate('tgl_pendaftaran', $pendaftaran->tgl_pendaftaran)
            ->where('queue_position', '<', $pendaftaran->queue_position)
            ->whereIn('status', ['Terdaftar', 'Menunggu', 'Diproses'])
            ->count();

        $estimasi_waktu = $antrian_sebelum * 15; // Asumsi 15 menit per pasien

        return view('pasien.pendaftaran.show', compact('pendaftaran', 'estimasi_waktu'));
    }

    public function edit(Pendaftaran $pendaftaran)
    {
        // Pastikan hanya pasien yang bersangkutan yang bisa edit
        if ($pendaftaran->pasien_id !== Auth::id()) {
            abort(403);
        }

        // Hanya bisa edit jika status masih Terdaftar
        if ($pendaftaran->status !== 'Terdaftar') {
            return redirect()->route('pasien.pendaftaran.show', $pendaftaran)
                ->with('error', 'Pendaftaran tidak dapat diubah karena sudah diproses.');
        }

        $dokters = Dokter::where('is_active', true)->get();
        return view('pasien.pendaftaran.edit', compact('pendaftaran', 'dokters'));
    }

    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        // Validasi kepemilikan dan status
        if ($pendaftaran->pasien_id !== Auth::id() || $pendaftaran->status !== 'Terdaftar') {
            abort(403);
        }

        $request->validate([
            'dokter_id' => 'required|exists:dokters,id',
            'tgl_pendaftaran' => 'required|date|after_or_equal:today',
            'keluhan_utama' => 'required|string|max:1000',
            'catatan' => 'nullable|string|max:1000'
        ]);

        // Jika dokter atau tanggal berubah, generate ulang queue
        if (
            $pendaftaran->dokter_id != $request->dokter_id ||
            $pendaftaran->tgl_pendaftaran->format('Y-m-d') != $request->tgl_pendaftaran
        ) {

            $tglPendaftaran = Carbon::parse($request->tgl_pendaftaran)->format('Y-m-d');
            $lastQueue = Pendaftaran::where('dokter_id', $request->dokter_id)
                ->whereDate('tgl_pendaftaran', $tglPendaftaran)
                ->orderBy('queue_position', 'desc')
                ->first();

            $queuePosition = $lastQueue ? $lastQueue->queue_position + 1 : 1;
            $queueNumber = 'A' . str_pad($queuePosition, 3, '0', STR_PAD_LEFT);

            $pendaftaran->update([
                'dokter_id' => $request->dokter_id,
                'tgl_pendaftaran' => $request->tgl_pendaftaran,
                'queue_number' => $queueNumber,
                'queue_position' => $queuePosition,
                'keluhan_utama' => $request->keluhan_utama,
                'catatan' => $request->catatan,
            ]);
        } else {
            $pendaftaran->update([
                'keluhan_utama' => $request->keluhan_utama,
                'catatan' => $request->catatan,
            ]);
        }

        return redirect()->route('pasien.pendaftaran.show', $pendaftaran)
            ->with('success', 'Pendaftaran berhasil diupdate!');
    }

    public function destroy(Pendaftaran $pendaftaran)
    {
        // Pastikan hanya pasien yang bersangkutan yang bisa hapus
        if ($pendaftaran->pasien_id !== Auth::id()) {
            abort(403);
        }

        // Hanya bisa hapus jika status masih Terdaftar atau Menunggu
        if (!in_array($pendaftaran->status, ['Terdaftar', 'Menunggu'])) {
            return redirect()->route('pendaftarans.show', $pendaftaran)
                ->with('error', 'Pendaftaran tidak dapat dibatalkan karena sudah diproses.');
        }

        $pendaftaran->update(['status' => 'Batal']);

        return redirect()->route('pasien.pendaftaran.index')
            ->with('success', 'Pendaftaran berhasil dibatalkan.');
    }

    // Method untuk admin/petugas
    public function updateStatus(Request $request, Pendaftaran $pendaftaran)
    {
        $request->validate([
            'status' => 'required|in:Terdaftar,Menunggu,Diproses,Selesai,Batal'
        ]);

        $updateData = ['status' => $request->status];

        // Update timestamp sesuai status
        switch ($request->status) {
            case 'Menunggu':
                $updateData['called_at'] = now();
                break;
            case 'Diproses':
                $updateData['started_at'] = now();
                break;
            case 'Selesai':
                $updateData['completed_at'] = now();
                break;
        }

        $pendaftaran->update($updateData);

        return redirect()->back()->with('success', 'Status pendaftaran berhasil diupdate.');
    }

    // Method untuk melihat antrian hari ini
    public function antrianHariIni(Request $request)
    {
        $dokterId = $request->get('dokter_id');
        $tanggal = $request->get('tanggal', now()->format('Y-m-d'));

        $query = Pendaftaran::with(['pasien', 'dokter'])
            ->whereDate('tgl_pendaftaran', $tanggal)
            ->orderBy('queue_position');

        if ($dokterId) {
            $query->where('dokter_id', $dokterId);
        }

        $antrians = $query->get();
        $dokters = Dokter::where('status', 'aktif')->get();

        return view('pasien.pendaftaran.antrian', compact('antrians', 'dokters', 'tanggal', 'dokterId'));
    }
}
