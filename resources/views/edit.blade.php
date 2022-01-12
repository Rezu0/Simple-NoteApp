@extends('app.layout')
@section('title', 'edit')

@section('content')
    <div class="row">
        <h2 class="my-3 fw-bolder ps-5">Edit Todo List or Note Apps</h2>

        <x-input label="title" field="title" value="{{ $noteApp->title }}"></x-input>

        <x-textarea label="deskripsi" field="desc" value="{{ $noteApp->desc }}"></x-textarea>
    </div>
@endsection