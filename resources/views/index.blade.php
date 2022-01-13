@extends('app.layout')
@section('title', 'NoteApps')

@section('content')
    
<div class="row">
    <h2 class="my-3 fw-bolder ps-5">Simple Todo List or Note Apps</h2>
    
    @if(session()->has('msgInput'))
      <div class="alert alert-success">
          {{ session()->get('msgInput') }}
      </div>
    @endif

    @if(session()->has('msgDelete'))
      <div class="alert alert-success">
          {{ session()->get('msgDelete') }}
      </div>
    @endif

    @if(session()->has('msgUpdate'))
      <div class="alert alert-success">
          {{ session()->get('msgUpdate') }}
      </div>
    @endif
    <form action="/todo" method="post">
        @csrf
        <x-input label="title" field="title" placeholder="Masukan Judul disini..."></x-input>

        <x-textarea label="Deskripsi" field="desc" placeholder="Masukan Deskripsi disini..."></x-input>
        
        <button class="btn btn-success">Simpan</button>
    </form>
</div>

<h2 class="fw-bolder my-2">Data Todo List or Note</h2>
@if ($noteApp->isEmpty())
    <p>Data Tidak ada bos</p>
@else
@foreach ($noteApp->chunk(3) as $dataNoteAppChunk)
<div class="row my-4">
    @foreach ($dataNoteAppChunk as $noteAppData)
      <div class="col card ms-3" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">{{ ucfirst($noteAppData->title) }}</h5>
            <p class="card-text">{{ Str::limit($noteAppData->desc, '100') }}</p>
            <div class="row">
              <div class="col-6">
                <a href="todo/{{ $noteAppData->id }}/edit" class="btn btn-success">Edit</a>
              </div>
              <div class="col-6">
                <form action="todo/{{ $noteAppData->id }}/delete" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger">Hapus</button>
                </form>
              </div>
              <div class="col-12 mt-2">
                <a href="/todo/finish" class="btn btn-primary">Finish this work</a>
              </div>
            </div>
          </div>
          <div class="card-footer text-muted">
            Di Upload pada: {{ date('d F Y | H:i:s', strtotime($noteAppData->created_at)) }}
        </div>
        </div> 
    @endforeach
</div>
@endforeach
@endif

<div>
  {{ $noteApp->links('pagination::bootstrap-4') }}
</div>

@endsection