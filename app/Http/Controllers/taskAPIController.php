<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class taskAPIController extends Controller
{
    public function read(){
        $task = Task::all();
        return response()->json([
            'success'   => true,
            'message'   => 'Berhasil ditampilkan',
            'data'      => $task
        ], 200);
    }
    public function create(Request $request){
        $task = Task::create([
            'nama' => $request->nama,
            'judul_task' => $request->judul_task,
            'deskripsi_task' => $request->deskripsi_task
        ]);
        if ($task)
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
        $task = Task::whereId($id)->update([
            'nama' => $request->nama,
            'judul_task' => $request->judul_task,
            'deskripsi_task' => $request->deskripsi_task
        ]);
        if ($task)
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
        $task = Task::find($id);
        $task->delete();

        if ($task)
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
