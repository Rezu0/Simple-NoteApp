@extends('app.layout')
@section('title', 'Edit')

@section('content')
    <div class="row">
        <h2 class="my-3 fw-bolder ps-5">Edit Todo List or Note Apps</h2>
        <div class="alert alert-dark" role="alert">
            Telah di update pada : {{ date('d F Y | H:i:s', strtotime($noteApp->updated_at)) }}
        </div>
        <form action="/todo/{{ $noteApp->id }}" method="post">
            @csrf
            @method('PUT')

            <x-input label="title" field="title" value="{{ $noteApp->title }}"></x-input>

            <x-textarea label="deskripsi" field="desc" value="{{ $noteApp->desc }}"></x-textarea>

            <button class="btn btn-success my-2">Update Data</button>
        </form>
    </div>
@endsection