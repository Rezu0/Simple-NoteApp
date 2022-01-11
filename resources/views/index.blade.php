@extends('app.layout')
@section('title', 'NoteApps')

@section('content')
    
<div class="row">
    <h2 class="my-3 fw-bolder ps-5">Simple Todo List or Note Apps</h2>

    <form action="/todo" method="post">
        @csrf
        <x-input label="title" field="title" placeholder="Masukan Judul disini..."></x-input>

        <x-textarea label="Deskripsi" field="desc" placeholder="Masukan Deskripsi disini..."></x-input>
        
        <button class="btn btn-success">Simpan</button>
    </form>
</div>

<div class="row">
    <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
</div>

@endsection