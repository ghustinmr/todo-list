<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        // Mendapatkan list task yang terbaru
        $tasks = Task::orderBy('created_at', 'desc')->get();

        // Redirect kembali dengan pesan sukses dan menampilkan data
        return view('tasks.index', compact('tasks'));
    }

    public function create(Request $request)
    {
        // Create task berdasakan input title
        $task = Task::create([
            'title' => $request->input('title'),
        ]);

        // Redirect kembali dengan pesan sukses
        return back()->with('success', 'Sukses menambahkan item pada list');
    }

    public function update($id)
    {
        // Cari task berdasarkan id, atau gagal jika tidak ditemukan
        $task = Task::findOrFail($id);

        // toggle value selesai atau belum;
        $newStatus = $task->status === 'selesai' ? 'belum' : 'selesai';

        // Edit status Task
        $task->update(['status' => $newStatus]);

        // Redirectt kembali dengan pesan sukses
        return back()->with('success', 'Sukses menupdate item pada list');
    }

    public function delete($id)
    {
        // Cari task berdasarkan id, atau gagal jika tidak ditemukan
        $task = Task::findOrFail($id);

        // Hapus task
        $task->delete();

        // Redirect kembali dengan pesan sukses
        return back()->with('success', 'Sukses mendelete item pada list');
    }
}
