<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Perusahaan;
class SiswaController extends Controller
{
/**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
   $keyword = $request->input('cari');
 $siswa = Siswa::with('perusahaan')
    ->when($keyword, function ($query) use ($keyword) {
        $query->where('nama', 'like', "%{$keyword}%")
              ->orWhere('nis', 'like', "%{$keyword}%");
    })
    ->latest()
    ->paginate(10)
    ->withQueryString();
 return view('siswa.index', compact('siswa'));
 }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $perusahaan = Perusahaan::all();
 return view('siswa.create', compact('perusahaan'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $validated = $request->validate([
 'nis' => 'required|unique:siswas,nis',
 'nama' => 'required|string|max:100',
 'kelas' => 'required|string|max:30',
 'tanggal_mulai_pkl' => 'required|date',
 'tanggal_selesai_pkl' => 'required|date|after:tanggal_mulai_pkl',
 'perusahaan_id' => 'required|exists:perusahaans,id',
 ]);
 Siswa::create($validated);
 return redirect()->route('siswa.index')
 ->with('success', 'Data siswa PKL berhasil ditambahkan.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $perusahaan = Perusahaan::all();
 return view('siswa.edit', compact('siswa', 'perusahaan'));

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
 'nis' => 'required|unique:siswas,nis,' . $siswa->id,
 'nama' => 'required|string|max:100',
 'kelas' => 'required|string|max:30',
 'tanggal_mulai_pkl' => 'required|date',
 'tanggal_selesai_pkl' => 'required|date|after:tanggal_mulai_pkl',
 'perusahaan_id' => 'required|exists:perusahaans,id',
 ]);
 $siswa->update($validated);
 return redirect()->route('siswa.index')
 ->with('success', 'Data siswa PKL berhasil diperbarui.');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa->delete();
 return redirect()->route('siswa.index')
 ->with('success', 'Data siswa PKL berhasil dihapus.');

    }
}
