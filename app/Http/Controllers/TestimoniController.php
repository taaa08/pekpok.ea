<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getTestimonial = Testimoni::all();

        return view('admin.testimonial', ["getTestimonial" => $getTestimonial]);
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
            'nama' => ['required', 'string', 'max:100'],
            'keterangan' => ['required', 'string', 'max:255'],
            'gambar' => ['required', 'mimes:jpeg,jpg,png', 'dimensions:max_width=800,max_height=800,min_width=200,min_height=200']
        ]);

        $img = $request->file('gambar');
        $imgName = $img->getClientOriginalName();
        $img->storeAs('public/images/testimonial', $imgName);

        Testimoni::create([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'gambar' => $imgName
        ]);

        return redirect()->back()->with('success', 'Profil berhasil di perbaharui!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function show(Testimoni $testimoni)
    {
        Testimoni::findOrFail($testimoni->id);

        return view('admin.testimonial-edit', ["testimoni" => $testimoni]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Testimoni $testimoni)
    {

        if ($request->gambar !== 0) {
            $request->validate([
                'gambar' => ['mimes:jpeg,jpg,png', 'dimensions:max_width=800,max_height=800,min_width=200,min_height=200']
            ]);
        }

        $request->validate([
            'nama' => ['required', 'string', 'max:100'],
            'keterangan' => ['required', 'string', 'max:255']
        ]);

        $img = $request->file('gambar');
        if ($img) {
            $imgName = $img->getClientOriginalName();
            $img->storeAs('public/images/testimonial', $imgName);
        }

        $testimoni->update([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'gambar' => $img ? $imgName : $testimoni->gambar,
        ]);

        return redirect()->back()->with('success', 'Profil berhasil di perbaharui!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimoni $testimoni)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimoni $testimoni)
    {
        $testimoni->delete();

        return redirect()->back()->with('success', 'Data berhasil di hapus!');
    }
}
