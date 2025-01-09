<?php

namespace App\Http\Controllers;

use App\Models\Telefon;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function telefon(){
        return view('content.telefon', ['telefons' => Telefon::all()]);
    }
    public function CreateTelefon(){
  
        return view('content.tambah-telefon');
    }
    public function StoreTelefon(Request $request){
        $validate = $request->validate([
            'nama' => ['required', 'string'],
            'status_kendala' => ['required'],
        ]);

        Telefon::create($validate);
              
        return redirect('/telefon')->with('success', 'Telefon Berhasil Ditambahkan');
    }

    public function EditTelefon($slug){
        $telefon = Telefon::where('id', '=', $slug)->firstOrFail();
        return view('content.edit-telefon', ['telefon' => $telefon]);
    }

    public function UpdateTelefon(Request $request, $slug){
        $telefon = Telefon::where('id', '=', $slug)->firstOrFail();
        $validate = $request->validate([
            'nama' => ['required', 'string'],
            'status_kendala' => ['required'],
        ]);
        $telefon->update($validate);
        return redirect('/telefon')->with('success', 'Telefon Berhasil Diubah');
    }
}
