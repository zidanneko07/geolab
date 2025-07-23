<?php

namespace App\Http\Controllers;

use App\Models\HasilLab;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HasilLabController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $hasilLabs = HasilLab::paginate(10);
        $categories = ['Petrologi', 'Geokimia', 'Geofisika', 'Paleontologi'];
        return view('kelola_hasil_lab', compact('hasilLabs', 'categories'));
    }

    public function create()
    {
        $categories = ['Petrologi', 'Geokimia', 'Geofisika', 'Paleontologi'];
        $autoKodeLab = $this->generateKodeLab();
        return view('kelola_hasil_lab_create', compact('categories', 'autoKodeLab'));
    }

    private function generateKodeLab()
    {
        $prefix = 'LAB';
        $year = date('Y');
        $month = date('m');
        
        // Get the last lab code for this month
        $lastLab = HasilLab::where('kode_lab', 'like', $prefix . $year . $month . '%')
                           ->orderBy('kode_lab', 'desc')
                           ->first();
        
        if ($lastLab) {
            // Extract the sequence number
            $lastSequence = (int) substr($lastLab->kode_lab, -4);
            $newSequence = $lastSequence + 1;
        } else {
            $newSequence = 1;
        }
        
        return $prefix . $year . $month . str_pad($newSequence, 4, '0', STR_PAD_LEFT);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_lab' => 'required|string|max:25|unique:hasil_lab,kode_lab',
            'judul_lab' => 'required|string|max:255',
            'jenis_sampel' => 'required|string|max:50',
            'jenis_sampel_lainnya' => 'nullable|required_if:jenis_sampel,Lainnya|string|max:50',
            'kategori' => 'required|string|max:50',
            'kategori_lainnya' => 'nullable|required_if:kategori,Lainnya|string|max:50',
            'tanggal' => 'required|date',
            'link_dokumen' => 'required|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,csv,txt,jpg,jpeg,png|max:51200',
            'rating' => 'nullable|integer|min:0|max:5',
        ], [
            'kategori_lainnya.required_if' => 'Kategori lainnya harus diisi ketika memilih "Lainnya".',
            'jenis_sampel_lainnya.required_if' => 'Jenis sampel lainnya harus diisi ketika memilih "Lainnya".',
            'link_dokumen.max' => 'Ukuran file maksimal 50 MB.',
        ]);

        // Determine the final kategori value
        $kategori = $request->kategori;
        if ($request->kategori === 'Lainnya' && $request->filled('kategori_lainnya')) {
            $kategori = $request->kategori_lainnya;
        }
        // Determine the final jenis_sampel value
        $jenis_sampel = $request->jenis_sampel;
        if ($request->jenis_sampel === 'Lainnya' && $request->filled('jenis_sampel_lainnya')) {
            $jenis_sampel = $request->jenis_sampel_lainnya;
        }

        $file = $request->file('link_dokumen');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('lab_documents', $fileName, 'public');

        HasilLab::create([
            'kode_lab' => $request->kode_lab,
            'judul_lab' => $request->judul_lab,
            'jenis_sampel' => $jenis_sampel,
            'kategori' => $kategori,
            'tanggal' => $request->tanggal,
            'link_dokumen' => $filePath,
            'rating' => $request->rating ?? 0,
        ]);

        return redirect()->route('kelola-hasil-lab.index')->with('success', 'Data hasil lab berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $hasilLab = HasilLab::findOrFail($id);
        $categories = ['Petrologi', 'Geokimia', 'Geofisika', 'Paleontologi'];
        
        // Check if the current kategori is not in the default categories
        $isCustomKategori = !in_array($hasilLab->kategori, $categories);
        
        return view('kelola_hasil_lab_edit', compact('hasilLab', 'categories', 'isCustomKategori'));
    }

    public function update(Request $request, $id)
    {
        $hasilLab = HasilLab::findOrFail($id);
        $request->validate([
            'kode_lab' => 'required|string|max:25|unique:hasil_lab,kode_lab,' . $hasilLab->id,
            'judul_lab' => 'required|string|max:255',
            'jenis_sampel' => 'required|string|max:50',
            'jenis_sampel_lainnya' => 'nullable|required_if:jenis_sampel,Lainnya|string|max:50',
            'kategori' => 'required|string|max:50',
            'kategori_lainnya' => 'nullable|required_if:kategori,Lainnya|string|max:50',
            'tanggal' => 'required|date',
            'link_dokumen' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,csv,txt,jpg,jpeg,png|max:51200',
            'rating' => 'nullable|integer|min:0|max:5',
        ], [
            'kategori_lainnya.required_if' => 'Kategori lainnya harus diisi ketika memilih "Lainnya".',
            'jenis_sampel_lainnya.required_if' => 'Jenis sampel lainnya harus diisi ketika memilih "Lainnya".',
            'link_dokumen.max' => 'Ukuran file maksimal 50 MB.',
        ]);

        // Determine the final kategori value
        $kategori = $request->kategori;
        if ($request->kategori === 'Lainnya' && $request->filled('kategori_lainnya')) {
            $kategori = $request->kategori_lainnya;
        }
        // Determine the final jenis_sampel value
        $jenis_sampel = $request->jenis_sampel;
        if ($request->jenis_sampel === 'Lainnya' && $request->filled('jenis_sampel_lainnya')) {
            $jenis_sampel = $request->jenis_sampel_lainnya;
        }

        $data = [
            'kode_lab' => $request->kode_lab,
            'judul_lab' => $request->judul_lab,
            'jenis_sampel' => $jenis_sampel,
            'kategori' => $kategori,
            'tanggal' => $request->tanggal,
            'rating' => $request->rating ?? 0,
        ];

        if ($request->hasFile('link_dokumen')) {
            if ($hasilLab->link_dokumen) {
                Storage::disk('public')->delete($hasilLab->link_dokumen);
            }
            $file = $request->file('link_dokumen');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('lab_documents', $fileName, 'public');
            $data['link_dokumen'] = $filePath;
        }

        $hasilLab->update($data);

        return redirect()->route('kelola-hasil-lab.index')->with('success', 'Data hasil lab berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $hasilLab = HasilLab::findOrFail($id);
        if ($hasilLab->link_dokumen) {
            Storage::disk('public')->delete($hasilLab->link_dokumen);
        }
        $hasilLab->delete();
        return redirect()->route('kelola-hasil-lab.index')->with('success', 'Data hasil lab berhasil dihapus!');
    }
} 