<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile');
    }

    public function edit(Request $request)
    {
        if (strlen($request->password) !== 0 && strlen($request->password) <= 6) {
            $request->validate([
                'name' => ['required', 'string', 'max:70'],
                'email' => ['required', 'string', 'email', 'max:40', 'unique:users,email,' . auth()->id()],
                'password' => ['min:6']
            ]);
        } else if (strlen($request->gambar) !== 0) {
            $request->validate([
                'name' => ['required', 'string', 'max:70'],
                'email' => ['required', 'string', 'email', 'max:40', 'unique:users,email,' . auth()->id()],
                'gambar' => ['mimes:jpeg,jpg,png', 'dimensions:max_width=300,max_height=200']
            ]);
        }
        

        $img = $request->file('gambar');

        if ($img) {
            $imgName = $img->getClientOriginalName();
            $img->storeAs('public/images/avatar', $imgName);
        }

        User::where('id', auth()->id())
            ->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : auth()->user()->password,
            'gambar' => $request->gambar ? $imgName : auth()->user()->gambar
        ]);

        return redirect()->back()->with('success', 'Profil berhasil di perbaharui!');
    }
}
