<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerCare;

class CustomerCareController extends Controller
{
    public function index()
    {
        return view('landing.contact');
    }

    public function create()
    {
        $getCust = CustomerCare::all();

        return view('admin.customercare', ["getCust" => $getCust]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'subjek' => 'required',
            'pesan' => 'required',
        ]);

        $request->validate([
            'nama' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:50'],
            'subjek' => ['required', 'string', 'max:100'],
            'pesan' => ['required', 'string', 'max:255']
        ]);

        CustomerCare::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'subjek' => $request->subjek,
            'pesan' => $request->pesan
        ]);

        return redirect()->back()->with('success', 'Data berhasil dikirim!');
    }

    public function destroy($customercare)
    {
        CustomerCare::where('id', $customercare)->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
