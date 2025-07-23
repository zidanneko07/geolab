<?php

namespace App\Http\Controllers;

use App\Models\Penelitian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenelitianController extends Controller
{
    // List all data
    public function index()
    {
        $penelitians = Penelitian::orderByDesc('created_at')->get();
        return view('data_pengelolaan', compact('penelitians'));
    }

    // Store new data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_penelitian' => 'required|string|max:255',
            'nama_peneliti' => 'required|string|max:255',
            'instansi' => 'nullable|string|max:255',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'kode_sampel' => 'nullable|string|max:100',
            'jenis_sampel' => 'nullable|string|max:100',
            'lokasi' => 'nullable|string|max:255',
            'kabupaten_kota' => 'nullable|string|max:255',
            'koordinat' => 'nullable|string|max:100',
            'parameter_uji' => 'nullable|string|max:255',
            'metode_uji' => 'nullable|string|max:255',
            'satuan_hasil' => 'nullable|string|max:100',
            'tanggal_uji_mulai' => 'nullable|date',
            'tanggal_uji_selesai' => 'nullable|date|after_or_equal:tanggal_uji_mulai',
            'dokumen' => 'nullable|file|mimes:pdf,xls,xlsx,jpg,jpeg,png|max:51200',
            'petugas' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:50',
            'rating' => 'nullable|integer|min:1|max:5',
            'catatan' => 'nullable|string',
        ]);
        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('penelitian_documents', $fileName, 'public');
            $validated['dokumen'] = $filePath;
        }
        Penelitian::create($validated);
        return redirect()->route('data-pengelolaan.index')->with('success', 'Data berhasil ditambahkan!');
    }

    // Show edit form (AJAX/modal)
    public function edit(Penelitian $data_pengelolaan)
    {
        return response()->json($data_pengelolaan);
    }

    // Update data
    public function update(Request $request, Penelitian $data_pengelolaan)
    {
        $validated = $request->validate([
            'judul_penelitian' => 'required|string|max:255',
            'nama_peneliti' => 'required|string|max:255',
            'instansi' => 'nullable|string|max:255',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'kode_sampel' => 'nullable|string|max:100',
            'jenis_sampel' => 'nullable|string|max:100',
            'lokasi' => 'nullable|string|max:255',
            'kabupaten_kota' => 'nullable|string|max:255',
            'koordinat' => 'nullable|string|max:100',
            'parameter_uji' => 'nullable|string|max:255',
            'metode_uji' => 'nullable|string|max:255',
            'satuan_hasil' => 'nullable|string|max:100',
            'tanggal_uji_mulai' => 'nullable|date',
            'tanggal_uji_selesai' => 'nullable|date|after_or_equal:tanggal_uji_mulai',
            'dokumen' => 'nullable|file|mimes:pdf,xls,xlsx,jpg,jpeg,png|max:51200',
            'petugas' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:50',
            'rating' => 'nullable|integer|min:1|max:5',
            'catatan' => 'nullable|string',
        ]);
        if ($request->hasFile('dokumen')) {
            if ($data_pengelolaan->dokumen) {
                Storage::disk('public')->delete($data_pengelolaan->dokumen);
            }
            $file = $request->file('dokumen');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('penelitian_documents', $fileName, 'public');
            $validated['dokumen'] = $filePath;
        }
        $data_pengelolaan->update($validated);
        return redirect()->route('data-pengelolaan.index')->with('success', 'Data berhasil diupdate!');
    }

    // Delete data
    public function destroy(Penelitian $data_pengelolaan)
    {
        if ($data_pengelolaan->dokumen) {
            Storage::disk('public')->delete($data_pengelolaan->dokumen);
        }
        $data_pengelolaan->delete();
        return redirect()->route('data-pengelolaan.index')->with('success', 'Data berhasil dihapus!');
    }
}
