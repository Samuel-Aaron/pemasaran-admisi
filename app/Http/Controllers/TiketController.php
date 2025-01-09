<?php

namespace App\Http\Controllers;

use App\Models\Telefon;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    public function tiket(){
        $telefons = Telefon::all()->where('status_kendala', '=', 'eskalasi');
        return view('content.tiket', ['telefons' => $telefons]);
    }
}
