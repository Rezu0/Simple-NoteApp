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

        return redirect('/')->with('msgInput', 'Berhasil di [' . $request->title .'] tambah');
    }

    public function editNote($id){
        $noteApp = noteApp::find($id);
        return view('edit', compact('noteApp'));
    }

    public function deleteNote($id){
        noteApp::find($id)->delete();
        return redirect('/')->with('msgDelete', 'Berhasil di hapus');
    }
}
