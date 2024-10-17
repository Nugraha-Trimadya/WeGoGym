<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visits = Visit::where('name', 'LIKE', '%'.request('search_visit').'%')->orderBy('name', 'ASC')->simplePaginate(10);
        return view('visits.index', compact('visits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('visits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input data
        $request->validate(
            [
                'name' => 'required|string|max:100',
                'age' => 'required|integer|max:100',
                'gender' => 'required|in:L,P',
            ],
            [
                'name.required' => 'Nama harus diisi',
                'name.max' => 'Maksimal 100 karakter',
                'age.required' => 'Umur harus diisi',
                'age.integer' => 'Umur harus berupa angka',
                'age.max' => 'Maksimal 100 tahun',
                'gender.required' => 'Gender harus diisi',
                'gender.in' => 'Gender harus L/P',
            ]
        );

        // Simpan data ke database, waktu kunjungan otomatis menggunakan now()
        Visit::create([
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'time' => now(),  // Isi field 'time' dengan waktu saat ini
        ]);

        // Redirect ke halaman index setelah berhasil menyimpan
        return redirect()->route('visit.data_visit')->with('success', 'Data visit berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Visit $visit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visit $visit)
    {
        return view('visits.edit', compact('visit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visit $visit)
    {
        // Validasi input data
        $request->validate([
            'name' => 'required|string|max:100',
            'age' => 'required|integer|max:100',
            'gender' => 'required|in:L,P',
        ], [
            'name.required' => 'Nama harus diisi',
            'name.max' => 'Maksimal 100 karakter',
            'age.required' => 'Umur harus diisi',
            'age.integer' => 'Umur harus berupa angka',
            'age.max' => 'Maksimal 100 tahun',
            'gender.required' => 'Gender harus diisi',
            'gender.in' => 'Gender harus L/P',
        ]);

        // Update data visit di database
        $visit->update([
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
        ]);

        // Redirect setelah berhasil memperbarui data
        return redirect()->route('visit.data_visit')->with('success', 'Data visit berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visit $visit)
    {
        $visit::where('id', $visit->id)->delete();
        return redirect()->route('visit.data_visit')->with('success', 'data visit berhasil di delete');
    }


}
