<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function Admin()
    {
        Gate::authorize('isAdmin');
        $users = User::all();
        return view('content.admin', ['users' => $users]);
    }
    public function Akun()
    {
        return view('content.tambah-akun');
    }
}
