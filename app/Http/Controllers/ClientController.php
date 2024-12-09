<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function showRegisterForm()
     {
         return view('frontRegister');
     }
     public function register(Request $request)
{
    // Validatsiyani o'zgartirish
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:clients,email',
        'password' => 'required|string|min:8', // 'confirmed'ni olib tashlash
    ]);

    // Yangi client yaratish
    $client = Client::create([
        'first_name' => $validated['first_name'],
        'last_name' => $validated['last_name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
    ]);

    // Tizimga kirish
    Auth::login($client);

    // Sessiyani yangilash
    session()->regenerate(); // Sessiyani yangilash

    // Bosh sahifaga yo'naltirish
    return redirect()->route('index')->with('success', 'Ro\'yxatdan o\'tish muvaffaqiyatli!');
}



public function showLoginForm()
{
    return view('frontLogin'); // Login sahifasini ko'rsatish
}

public function login(Request $request)
{
    // Kirish uchun validatsiya
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    // Agar kirish muvaffaqiyatli bo'lsa
    if (Auth::attempt($credentials)) {
        // Sessiyani yangilash
        $request->session()->regenerate();

        // Bosh sahifaga yo'naltirish
        return redirect()->route('index')->with('success', 'Tizimga muvaffaqiyatli kirdingiz!');
    }

    // Noto'g'ri login ma'lumotlari
    return back()->withErrors([
        'email' => 'Kiritilgan ma\'lumotlar noto\'g\'ri.',
    ]);
}

    public function index()
    {
        //
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
