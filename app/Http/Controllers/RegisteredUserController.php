<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('content.register');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string', 'confirmed'],
            'role' => ['required'],
        ]);
        User::create($validate);

        return redirect(route('admin'))->with('success', 'Akun Berhasil Dibuat');
    }

    public function edit($slug)
    {
        $user = User::where('username', '=', $slug)->firstOrFail();
        
        return view('content.edit-user', ['user' => $user]);
    }

    public function destroy($slug){
        $user = User::where('username', '=', $slug)->firstOrFail();
        $user->delete();
        return redirect(route('admin'))->with('success', 'Akun Berhasil Dihapus');
    }

    public function update(Request $request, $slug){
        $user = User::where('username', '=', $slug)->firstOrFail();
        $validate = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string', 'confirmed'],
            'role' => ['required'],
        ]);
        $user->update($validate);
        return redirect(route('admin'))->with('success', 'Akun Berhasil Diubah');
    }
}
