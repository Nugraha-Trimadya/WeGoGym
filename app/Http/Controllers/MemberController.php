<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::where('name', 'LIKE', '%'.request('search_member').'%')->orderBy('name', 'ASC')->simplePaginate(10);
        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari user
        $request->validate([
            'name' => 'required|string|max:100',
            'age' => 'required|integer|max:100',
            'gender' => 'required|in:L,P',
            // Tidak perlu validasi untuk membership_number, karena akan di-generate otomatis
        ], [
            'name.required' => 'Name is required',
            'name.max' => 'Maximum 100 characters',
            'age.required' => 'Age is required',
            'age.integer' => 'Age must be a number',
            'age.max' => 'Maximum 100 years',
            'gender.required' => 'Gender is required',
            'gender.in' => 'Gender must be L/P',
        ]);

        // Generate nomor keanggotaan secara otomatis
        $membershipNumber = 'GYM' . strtoupper(uniqid());

        // Buat anggota baru dengan nomor keanggotaan yang sudah di-generate
        Member::create([
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'membership_number' => $membershipNumber, // Nomor otomatis
            'join_date' => now(),
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('member.data_member')->with('success', 'Member successfully added with Membership Number: ' . $membershipNumber);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'age' => 'required|integer|max:100',
            'gender' => 'required|in:L,P',
            'membership_number' => 'required|alpha_num|unique:members,membership_number,' . $member->id,
        ], [
            'name.required' => 'nama harus diisi',
            'name.max' => 'maksimal 100 karakter',
            'age.required' => 'umur harus diisi',
            'age.integer' => 'umur harus berupa angka',
            'age.max' => 'maksimal 100 tahun',
            'gender.required' => 'gender harus diisi',
            'gender.in' => 'gender harus L/P',
            'membership_number.required' => 'nomor keanggotaan harus diisi',
        ]);


        // Update the member
        $member->update([
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'membership_number' => $request->membership_number,
        ]);

        return redirect()->route('member.data_member')->with('success', 'Member berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member::where('id', $member->id)->delete();
        return redirect()->route('member.data_member')->with('success', 'Member berhasil dihapus!');
    }
}
