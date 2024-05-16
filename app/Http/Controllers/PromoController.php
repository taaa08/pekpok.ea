<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PromoController extends Controller
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
        $getPromo = Menu::where('promo', 1)->get()->map(function ($menu) {
            $kategoriArr = json_decode($menu['kategori'], true);

            $kategoriArr = array_map(function ($item) {
                if ($item == "0") {
                    return 'Makanan';
                } else if ($item == "1") {
                    return 'Minuman';
                } else if ($item == "2") {
                    return 'Best Seller';
                }

                return $item;
            }, $kategoriArr);

            $getDate = Carbon::parse($menu['masa_berlaku']);
            $menu['masa_berlaku'] = $getDate->isoFormat('D MMMM YYYY');

            $menu['kategori'] = implode(', ', $kategoriArr);

            $menu['harga_before'] = number_format($menu['harga_before'], 0, ',', '.');
            $menu['harga_after'] = number_format($menu['harga_after'], 0, ',', '.');
            
            return $menu;
        });
        
        return view('admin.promo', ["getPromo" => $getPromo]);
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
            'kategori' => ['required'],
            'harga_before' => ['required', 'integer', 'max:1000000', 'min:4'],
            'harga_after' => ['required', 'integer', 'max:1000000', 'min:4'],
            'masa_berlaku' => ['required', 'date'],
            'keterangan' => ['required', 'string', 'max:255'],
            'gambar' => ['required', 'mimes:jpeg,jpg,png', 'dimensions:max_width=1080,max_height=1080,min_width=500,min_height=500']
        ]);

        $img = $request->file('gambar');
        $imgName = $img->getClientOriginalName();
        $img->storeAs('public/images/promo', $imgName);

        $kategori = json_encode($request->kategori);

        Menu::create([
            'nama' => $request->nama,
            'kategori' => $kategori,
            'harga_before' => $request->harga_before,
            'harga_after' => $request->harga_after,
            'promo' => 1,
            'masa_berlaku' => $request->masa_berlaku,
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
    public function show($promo)
    {
        $promo = Menu::findOrFail($promo);
        $promo->kategori = json_decode($promo->kategori, true);

        return view('admin.promo-edit', ["promo" => $promo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $promo)
    {
        if ($request->gambar !== 0) {
            $request->validate([
                'gambar' => ['mimes:jpeg,jpg,png', 'dimensions:max_width=1080,max_height=1080,min_width=500,min_height=500']
            ]);
        }

        $request->validate([
            'nama' => ['required', 'string', 'max:100'],
            'kategori' => ['required'],
            'harga_before' => ['required', 'integer', 'max:1000000', 'min:4'],
            'harga_after' => ['required', 'integer', 'max:1000000', 'min:4'],
            'masa_berlaku' => ['required', 'date'],
            'keterangan' => ['required', 'string', 'max:255'],
        ]);

        $kategori = json_encode($request->kategori);

        $img = $request->file('gambar');
        
        if ($img) {
            $imgName = $img->getClientOriginalName();
            $img->storeAs('public/images/promo', $imgName);
        }

        $getImg = Menu::where('id', $promo)->first();

        Menu::where('id', $promo)
        ->update([
            'nama' => $request->nama,
            'kategori' => $kategori,
            'harga_before' => $request->harga_before,
            'harga_after' => $request->harga_after,
            'promo' => 1,
            'keterangan' => $request->keterangan,
            'gambar' => $request->gambar ? $imgName : $getImg->gambar,
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
    public function destroy($promo)
    {
        Menu::where('id', $promo)->delete();

        return redirect()->back()->with('success', 'Data berhasil di hapus!');
    }
}
