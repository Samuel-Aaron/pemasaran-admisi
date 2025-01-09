<?php

namespace App\Http\Controllers;

use App\Models\Telefon;
use Illuminate\Http\Request;

class EskalasiController extends Controller
{
    public function eskalasi()
    {
        $telefons = Telefon::all()->where('status_kendala', '=', 'eskalasi');
        return view('content.eskalasi', ['telefons' => $telefons]);
    }
}
