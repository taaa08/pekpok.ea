<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getAbout = About::all();

        return view('landing.about', ["getAbout" => $getAbout]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getAbout = About::all();

        return view('admin.about', ["getAbout" => $getAbout]);
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
            'keterangan' => ['required', 'string', 'max:1000'],
            'gambar' => ['required', 'mimes:jpeg,jpg,png']
        ]);


        $img = $request->file('gambar');
        $imgName = $img->getClientOriginalName();
        $img->storeAs('public/images/about', $imgName);

        About::create([
            'keterangan' => $request->keterangan,
            'gambar' => $imgName
        ]);

        return redirect()->back()->with('success', 'Profil berhasil di perbaharui!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($about)
    {
        $about = About::findOrFail($about);

        return view('admin.about-edit', ["about" => $about]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $about)
    {
        if ($request->gambar !== 0) {
            $request->validate([
                'gambar' => ['mimes:jpeg,jpg,png', 'dimensions:max_width=1080,max_height=1080,min_width=500,min_height=500']
            ]);
        }

        $request->validate([
            'keterangan' => ['required', 'string', 'max:1000']
        ]);

        $img = $request->file('gambar');

        if ($img) {
            $imgName = $img->getClientOriginalName();
            $img->storeAs('public/images/about', $imgName);
        }

        $getImg = About::where('id', $about)->pluck('gambar')->first();

        About::where('id', $about)
        ->update([
            'keterangan' => $request->keterangan,
            'gambar' => $img ? $imgName : $getImg,
        ]);

        return redirect()->back()->with('success', 'Profil berhasil di perbaharui!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($about)
    {
        About::where('id', $about)->delete();

        return redirect()->back();
    }
}
