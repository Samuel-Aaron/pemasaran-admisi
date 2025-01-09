<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class SessionController extends Controller
{
    //
    public function create(User $user)
    {
        return view('content.login');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);
        
        if (Auth::attempt($data)) {
            return Redirect::back()->withErrors(
                [
                    'login' => 'Login Failed!'
                ]
            );
        }

        Auth::attempt($data);

        $request->session()->regenerate();

        return redirect('/dashboard');

    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/login');
    }
}
