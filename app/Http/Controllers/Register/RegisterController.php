<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function IndexPages()
    {
        return view('user.pages.register.index');
    }

    public function store(Request $request)
{
    // Validasi data yang dikirim
    $validatedData = $request->validate([
        'username' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'birth_date' => 'required|date',
        'address' => 'required|string',
        'phone_number' => 'required|numeric',
        'event_type' => 'required|string',
    ]);

    // Simpan data ke database
    $user = User::create([
        'username' => $validatedData['username'],
        'email' => $validatedData['email'],
        'password' => bcrypt($validatedData['password']),
        'tanggal_lahir' => $validatedData['birth_date'],
        'alamat' => $validatedData['address'],
        'no_telp' => $validatedData['phone_number'],
        'jenis_event' => $validatedData['event_type'],
    ]);

    // Redirect dengan pesan sukses
    return redirect('/login')->with('success', 'Pendaftaran berhasil! Silahkan login untuk melanjutkan');
}
}
