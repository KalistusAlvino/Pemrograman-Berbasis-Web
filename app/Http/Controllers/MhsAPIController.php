<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Http\Request;

class MhsAPIController extends Controller
{
    public function read(){
        $mhs = Mahasiswa::all();
        return response()->json([
            'success'   => true,
            'message'   => 'Berhasil ditampilkan',
            'data'      => $mhs
        ], 200);
    }
    public function create(Request $request){
        $mhs = Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'gender' => $request->gender,
            'prodi' => $request->prodi,
            'minat' => $request->minat
        ]);
        if ($mhs)
        {
            return response()->json([
                'success'   => true,
                'message'   => 'Berhasil disimpan'
            ], 200);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'Gagal ditambahkan'
            ], 401);
        }
    }
    public function update($id,Request $request){
        $mhs = Mahasiswa::whereId($id)->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'gender' => $request->gender,
            'prodi' => $request->prodi,
            'minat' => $request->minat
        ]);
        if ($mhs)
        {
            return response()->json([
                'success'   => true,
                'message'   => 'Berhasil diubah'
            ], 200);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'Gagal diubah'
            ], 401);
        }
    }
    public function delete($id){
        $mhs = Mahasiswa::find($id);
        $mhs->delete();

        if ($mhs)
        {
            return response()->json([
                'success'   => true,
                'message'   => 'Berhasil dihapus'
            ], 200);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'Gagal dihapus'
            ], 401);
        }
    }
}
