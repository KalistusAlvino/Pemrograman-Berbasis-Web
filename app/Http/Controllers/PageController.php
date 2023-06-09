<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

class PageController extends Controller
{
    public function home() 
    {
        return view('home', ['key' => 'home']);
    }
    public function profile() 
    {
        return view('profile', ['key' => 'profile']);
    }
    public function mahasiswa() 
    {
        $mhs = Mahasiswa::orderBy('id','desc')->paginate(5);
        return view('mahasiswa', ['key' => 'mahasiswa', 'mhs' => $mhs]);
    }


    public function contact() 
    {
        return view('contact', ['key' => 'contact']);
    }

    public function cari(Request $request)
    {
        $cari = $request->q;
        $mhs = Mahasiswa::where('nama', 'like', '%'.$cari.'%')->orWhere('nim', 'like', '%'.$cari.'%')->paginate(10);
        $mhs->appends($request -> all());
        return view('mahasiswa', ['key' => 'mahasiswa', 'mhs' => $mhs]);
    }

    public function tambah()
    {
        return view('formtambah', ['key' => 'mahasiswa']);
    }

   
    public function edit($id)
    {
        $mhs = Mahasiswa::find($id);
        return view ('formedit', ['key' => 'mahasiswa','mhs' => $mhs]);
    }

    public function simpan(Request $request)
    {
        $minat = implode(',',$request->get('minat'));
        Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'gender' => $request->gender,
            'prodi' => $request->prodi,
            'minat' => $minat
        ]);

        return redirect('mahasiswa')->with('simpan', 'Data Berhasil Di simpan ke basis data');
    }

    public function update($id, Request $request)
    {
        $mhs = Mahasiswa::find($id);
        $minat = implode(',' ,$request->get('minat'));
        $mhs->nim = $request->nim;
        $mhs->nama = $request->nama;
        $mhs->gender = $request->gender;
        $mhs->prodi = $request->prodi;
        $mhs->minat = $minat;
        $mhs->save();

        return redirect('mahasiswa')->with('update','Data Berhasil di Ubah');
    }

    public function hapus($id)
    {
        $mhs = Mahasiswa::find($id);
        $mhs->delete();

        return redirect('mahasiswa')->with('delete', 'Data Berhasil di Hapus');
    }
    
}
