@extends('app.layout')

@section('title', $noteApp->title)

@section('content')
    <div class="row my-3">
        <div class="col-md-12 fw-bolder fs-3">
            {{ $noteApp->title }}
        </div>
        <div class="col-md-12">
            {{ $noteApp->desc }}
        </div>
    </div>
@endsection