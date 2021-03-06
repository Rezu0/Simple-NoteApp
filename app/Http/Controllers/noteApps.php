<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\noteApp;
use Illuminate\Support\Str;

class noteApps extends Controller
{
    public function index(){
        
        $noteApp = noteApp::orderBy('id', 'desc')->paginate(6);

        return view('index', compact('noteApp'));
    }

    public function postInputNote(Request $request){
        $request->validate([
            'title' => 'required|max:255|min:3',
            'desc' => 'required|min:10'
        ]);

        noteApp::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'desc' => $request->desc
        ]);

        return redirect('/')->with('msgInput', '[ ' . $request->title . ' ] Berhasil di tambah');
    }

    public function editNote($id){
        $noteApp = noteApp::find($id);
        return view('edit', compact('noteApp'));
    }

    public function deleteNote($id){
        noteApp::find($id)->delete();
        return redirect('/')->with('msgDelete', 'Berhasil di hapus');
    }

    public function updateNote(Request $request, $id){
        $request->validate([
            'title' => 'required|max:255|min:3',
            'desc' => 'required|min:10'
        ]);

        noteApp::find($id)->update([
            'title' => $request->title,
            'desc'  => $request->desc
        ]);

        return redirect('/')->with('msgUpdate', '[ ' . $request->title . ' ] berhasil di update');
    }
    
    public function updateFinishWork($id){
        noteApp::find($id)->update([
            'finish' => 1
        ]);

        return redirect('/')->with('msgFinish', 'Data yang sudah selesai lebih baik di hapus');
    }

    public function showPerSlug(noteApp $noteApp){
        return view('show', [
            'noteApp' => $noteApp
        ]);
    }
}
