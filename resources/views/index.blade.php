@extends('app.layout')
@section('title', 'NoteApps')

@section('content')
    
<div class="row">
    <h2 class="my-3 fw-bolder ps-5">Simple Todo List or Note Apps</h2>

    <form action="/todo" method="post">
        <x-input label="title" field="title" placeholder="Masukan Judul disini..."></x-input>

        <x-textarea label="Deskripsi" field="desc" placeholder="Masukan Deskripsi disini..."></x-input>
        
        <button class="btn btn-success">Simpan</button>
    </form>
</div>

@endsection