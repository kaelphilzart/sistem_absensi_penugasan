<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Hasil;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class TaskController extends Controller
{
    //
    public function indexLeader(){
        $data = Task::all();
    return view('task.index', ['dataTask' => $data]);
    }

    public function createTask(){
        return view('task.create');
    }

    public function indexMagang(){
        
        $data = Task::all();

    return view('task.index_magang', ['dataTask' => $data]);
    }

public function buatTugas(Request $request)
{
    $request->validate([
        'subject' => 'required',
        'description' => 'required',
        'deadline' => 'required|date', // Validasi bahwa 'deadline' adalah tanggal
        'file' => 'mimes:pdf,doc,docx|max:2048', // Contoh validasi file: PDF, DOC, DOCX, maksimal 2MB
    ]);

    // Simpan tugas ke dalam database
    $task = new Task();
    $task->subject = $request->input('subject');
    $task->description = $request->input('description');
    $task->deadline = $request->input('deadline');

    // Simpan file (jika ada)
   if ($request->hasFile('file_path')) {
    $cvFile = $request->file('file_path');
    $cvFileName =  $cvFile->getClientOriginalName();
    $cvFile->storeAs('public/tasks', $cvFileName); // Simpan file tugas di direktori 'storage/app/public/tasks'
    $task->file_path = 'storage/tasks/' . $cvFileName; // Simpan nama file tugas dalam basis data
}

    $task->save();

    return redirect()->route('leader.task')->with('success', 'Task berhasil disimpan!');
}

public function numpukTugas(Request $request)
{
    $validator = Validator::make($request->all(), [
        'id_task' => 'required',
        'id_user' => 'required',
        'deadline' => 'required|date',
        'tugas' => 'mimes:pdf,doc,docx|max:2048', // Validasi file: PDF, DOC, DOCX, maksimal 2MB
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Memeriksa apakah pengguna sudah mengumpulkan tugas
    $existingTask = Hasil::where('id_task', $request->id_task)
        ->where('id_user', $request->id_user)
        ->first();

    if ($existingTask) {
        return redirect('tampil-tugas')->with('error', 'Anda sudah mengumpulkan tugas ini sebelumnya');
    }

    // Simpan tugas ke dalam database
    $task = new Hasil();
    $task->id_task = $request->id_task;
    $task->id_user = $request->id_user;
    $task->deadline = $request->deadline;

    // Simpan file (jika ada)
    if ($request->hasFile('tugas')) {
        $tugasFile = $request->file('tugas');
        $tugasFileName = $tugasFile->getClientOriginalName();
        $tugasFile->storeAs('public/pengumpulan', $tugasFileName);
        $task->tugas = 'storage/pengumpulan/' . $tugasFileName;
    }

    $task->save();

    return redirect()->route('magang.task')->with('success', 'Tugas berhasil dikirim');
}

public function destroyTask($id){
    $data = Task::find($id);
    $data->delete();
    return redirect('tampil-task')->with('success', 'Task berhasil dihapus');;
}


}
