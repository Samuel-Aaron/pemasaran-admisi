<?php

namespace App\Http\Controllers;

use App\Models\Telefon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $telefons = Telefon::all()->count();
        return view('content.dashboard', ['telefons' => $telefons]);
    }


}
