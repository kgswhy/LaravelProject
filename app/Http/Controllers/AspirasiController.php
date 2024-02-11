<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AspirasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('backend.aspirasi.index', [
            'aspirasis' => Aspirasi::filter(request('search'))->paginate(5)->withQueryString()
        ]);
    }

    public function indexUser(Request $request)
    {
        $filters = $request->only(['search', 'tanggal', 'status']);

        $aspirasis = Aspirasi::latest()->filter($filters)->paginate(10)->withQueryString();

        return view('frontend.pages.aspirasi.cek-aspirasi', compact('aspirasis'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.pages.aspirasi.input-aspirasi', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_pengaduan' => 'unique:aspirasis', // Pastikan validasi unik pada tabel aspirasis
            'nik' => 'required|numeric|digits:16',
            'category_id' => 'required',
            'lokasi' => 'required',
            'keterangan' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $kode_pengaduan = 'LSP' . mt_rand(10000, 99999) . mt_rand(100, 999);

        $aspirasiData = [
            'kode_pengaduan' => $kode_pengaduan,
            'nik' => $request->nik,
            'category_id' => $request->category_id,
            'lokasi' => $request->lokasi,
            'keterangan' => $request->keterangan,
        ];

        if ($request->hasFile('gambar')) {
            $gambarName = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->storeAs('public/aspirasi', $gambarName);
            $aspirasiData['gambar'] = 'aspirasi/' . $gambarName;
        }

        Aspirasi::create($aspirasiData);

        return redirect('/')->with('success', 'Aspirasi berhasil disimpan.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aspirasi  $aspirasi
     * @return \Illuminate\Http\Response
     */
    public function show(Aspirasi $aspirasi)
    {
        return view('frontend.pages.aspirasi.detail-aspirasi', [
            'aspirasi' => $aspirasi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aspirasi  $aspirasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Aspirasi $aspirasi)
    {
        return view('backend.aspirasi.showEdit', [
            'aspirasi' => $aspirasi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aspirasi  $aspirasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aspirasi $aspirasi)
    {
        $validatedData = $request->validate([
            'status' => 'required',
            'feedback' => 'nullable'
        ]);

        Aspirasi::where('id', $aspirasi->id)
            ->update($validatedData);

        return redirect('/dashboard')->with('success', 'Feedback/Status berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aspirasi  $aspirasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aspirasi $aspirasi)
    {
        //
    }
}
