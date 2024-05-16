<?php

namespace App\Http\Controllers;

use App\Models\CustomerCare;
use App\Models\Menu;
use App\Models\Testimoni;
use Carbon\Carbon;

class HomeController extends Controller
{

    public function home()
    {
        $makanan = Menu::where('promo', 0)
                        ->whereJsonContains('kategori', ["0"])
                        ->latest()
                        ->take(3)
                        ->get()
                        ->map(function ($menu){
                            $menu['kategori'] = json_decode($menu['kategori'], true);
                
                            return $menu;
                        });
        $minuman = Menu::where('promo', 0)
                        ->whereJsonContains('kategori', ["1"])
                        ->latest()
                        ->take(3)
                        ->get()
                        ->map(function ($menu){
                            $menu['kategori'] = json_decode($menu['kategori'], true);
                
                            return $menu;
                        });

        $promo = Menu::where('promo', 1)
                        ->latest()
                        ->take(3)
                        ->get()
                        ->map(function ($menu){
                            $menu['kategori'] = json_decode($menu['kategori'], true);
                            $getDate = Carbon::parse($menu['masa_berlaku']);
                            $menu['masa_berlaku'] = $getDate->isoFormat('D MMMM YYYY');
                            
                            return $menu;
                        });;
        $testimoni = Testimoni::all();

        return view('landing.home', ["makanan" => $makanan, "minuman" => $minuman, "promo" => $promo, "testimoni" => $testimoni]);
    }

    public function dashboard()
    {
        $menu = Menu::where('promo', 0)->count();
        $promo = Menu::where('promo', 1)->count();
        $testimoni = Testimoni::count();
        $customerCare = CustomerCare::count();
        
        return view('admin.dashboard', ["menu" => $menu, "promo" => $promo, "testimoni" => $testimoni, "customerCare" => $customerCare]);
    }
}
