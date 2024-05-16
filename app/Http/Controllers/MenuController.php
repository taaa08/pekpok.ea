<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getMenu = Menu::where('promo', 0)->get()->map(function ($menu){
            $menu['kategori'] = json_decode($menu['kategori'], true);
            $menu['harga'] = "Rp " . number_format($menu['harga'], 0, ',', ',');

            return $menu;
        });

        $getPromo = Menu::where('promo', 1)->get()->map(function ($menu){
            $menu['kategori'] = json_decode($menu['kategori'], true);
            $getDate = Carbon::parse($menu['masa_berlaku']);
            $menu['masa_berlaku'] = $getDate->isoFormat('D MMMM YYYY');
            $menu['harga_before'] = "Rp " . number_format($menu['harga_before'], 0, ',', ',');
            $menu['harga_after'] = "Rp " . number_format($menu['harga_after'], 0, ',', ',');

            
            return $menu;
        });
        
        return view('landing.menu', ["getMenu" => $getMenu, "getPromo" => $getPromo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getMenu = Menu::where('promo', 0)->get()->map(function ($menu) {
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

            $menu['kategori'] = implode(', ', $kategoriArr);
            $menu['harga'] = "Rp " . number_format($menu['harga'], 0, ',', ',');
            
            return $menu;
        });
        
        return view('admin.menu', ["getMenu" => $getMenu]);
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
            'harga' => ['required', 'integer', 'max:1000000', 'min:4'],
            'keterangan' => ['required', 'string', 'max:255'],
            'gambar' => ['required', 'mimes:jpeg,jpg,png', 'dimensions:max_width=1080,max_height=1080,min_width=500,min_height=500']
        ]);

        $img = $request->file('gambar');
        $imgName = $img->getClientOriginalName();
        $img->storeAs('public/images/menu', $imgName);

        $kategori = json_encode($request->kategori);

        Menu::create([
            'nama' => $request->nama,
            'kategori' => $kategori,
            'harga' => $request->harga,
            'promo' => 0,
            'keterangan' => $request->keterangan,
            'gambar' => $imgName
        ]);

        return redirect()->back()->with('success', 'Profil berhasil di perbaharui!');
    }

    function search()
    {
        $input = $_POST['findcat'];

        $setInputArr = json_encode($input);

        $getMenu = Menu::where('promo', 0)
                    ->whereRaw('JSON_CONTAINS(kategori, ?)', $setInputArr)
                    ->get()->map(function ($menu){
                        $menu['kategori'] = json_decode($menu['kategori'], true);
            
                        return $menu;
                    });

        // dd($exists);

        return view('landing.menu', ["getMenu" => $getMenu, "setInputArr" => $setInputArr]);


        // if ($exists) {
        //     echo "Angka $input ada dalam array di database.";
        // } else {
        //     echo "Angka $input tidak ada dalam array di database.";
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        Menu::findOrFail($menu->id);
        $menu->kategori = json_decode($menu->kategori, true);

        return view('admin.menu-edit', ["menu" => $menu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu, Request $request)
    {
        if ($request->gambar !== 0) {
            $request->validate([
                'gambar' => ['mimes:jpeg,jpg,png', 'dimensions:max_width=1080,max_height=1080,min_width=500,min_height=500'],
            ]);
        }

        $request->validate([
            'nama' => ['required', 'string', 'max:100'],
            'kategori' => ['required'],
            'harga' => ['required', 'integer', 'max:1000000', 'min:4'],
            'keterangan' => ['required', 'string', 'max:255'],
        ]);

        $img = $request->file('gambar');
        
        if ($img) {
            $imgName = $img->getClientOriginalName();
            $img->storeAs('public/images/menu', $imgName);
        }
        
        $kategori = json_encode($request->kategori);

        $menu->update([
            'nama' => $request->nama,
            'kategori' => $kategori,
            'harga' => $request->harga,
            'promo' => 0,
            'keterangan' => $request->keterangan,
            'gambar' => $request->gambar ? $imgName : $menu->gambar,
        ]);

        return redirect()->back()->with('success', 'Profil berhasil di perbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->back()->with('success', 'Data berhasil di hapus!');
    }
}
