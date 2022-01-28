@extends('app.layout')
@section('title', 'NoteApps')

@section('content')
  <a class="dropdown-item" href="{{ route('logout') }}"
     onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
      {{ __('Logout') }}
  </a>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
      @csrf
  </form>
<div class="row">
    <h2 class="my-3 fw-bolder ps-5">Simple Todo List or Note Apps</h2>

    <x-alert input="msgInput" delete="msgDelete" update="msgUpdate" finish="msgFinish"></x-alert>

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
            <a href="/todo/{{ $noteAppData->slug }}">
              <h5 class="card-title">{{ ucfirst($noteAppData->title) }}</h5>  
            </a>
            <p class="card-text">{{ Str::limit($noteAppData->desc, '100') }}</p>
            <div class="row">
              @if ($noteAppData->finish == null)
                <div class="col-6">
                  <a href="todo/{{ $noteAppData->id }}/edit" class="btn btn-success">Edit</a>
                </div>
                <div class="col-6">
                  <form action="todo/{{ $noteAppData->id }}/delete" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                  </form>
                </div>
              @else
                <div class="col-12">
                  <form action="todo/{{ $noteAppData->id }}/delete" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                  </form>
                </div>
              @endif
              <div class="col-12 mt-2">
                @if ($noteAppData->finish == null)
                  <form action="/finish/{{ $noteAppData->id }}" method="post">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-done">Finish</button>
                  </form>
                @else
                    <button class="btn btn-done" disabled>Task is Done</button>
                @endif
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