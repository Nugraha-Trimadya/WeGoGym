<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function ShowLogin(){
        return view('pages.login');
    }

    public function loginAuth(Request $request){
        $request ->validate([
            'email' => 'required',
            'password' => 'required',
            ]);

            $users = $request->only(['email', 'password']);
            if (Auth::attempt($users)) {
                return redirect()->route('landing_page')->with('success', 'Login berhasil.');
            } else {
                return redirect()->back()->with('failed', 'Login gagal');
            }
    }
    
    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login.auth')->with('success', 'Logout Berhasil');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
