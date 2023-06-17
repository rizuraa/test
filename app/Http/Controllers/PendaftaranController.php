<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftarans;

class PendaftaranController extends Controller
{
    // function untuk menampilkan data dari table
    public function index(){
        $pendaftaran = Pendaftarans::all();

        return view('page3', compact('pendaftaran'));
    }

    // function untuk melakukan input data dan juga validasi form 
    public function store(Request $request){
        // validasi form data
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|regex:/^[a-zA-Z0-9]+([._-][a-zA-Z0-9]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z]{2,}$/',
            'nomor_hp' => 'required|numeric',
            'semester' => 'required',
            'ipk' => 'required|numeric',
            'beasiswa' => 'required',
            'berkas' => 'required|mimes:pdf'
        ]);
        
        $berkas = $request->file('berkas');
        $berkasPath = $berkas->store('pdfs', 'public');

        // binding        
        $pendaftaran = new Pendaftarans();
        $pendaftaran->nama = $request->nama;
        $pendaftaran->email = $request->email;
        $pendaftaran->nomor_hp = $request->nomor_hp;
        $pendaftaran->semester = $request->semester;
        $pendaftaran->ipk = $request->ipk;
        $pendaftaran->beasiswa = $request->beasiswa;
        $pendaftaran->berkas = $berkasPath;
        $pendaftaran->save();

        return redirect()->route('page3')->with('success', 'Data pendaftaran berhasil disimpan.');
    }
}
