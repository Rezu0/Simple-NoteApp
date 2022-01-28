@extends('app.layout')

@section('title', $noteApp->title)

@section('content')
    <div class="row my-3">
        <div class="row">
            @if ($noteApp->finish == null)
                <div class="col-md-2 mb-2">
                    <a href="/todo/{{ $noteApp->id }}/edit" class="btn btn-success">Edit</a>
                </div>
                <div class="col-md-2 mb-2">
                    <form action="todo/{{ $noteApp->id }}/delete" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </div>
                <div class="col-md-2 mb-2">
                    <form action="/finish/{{ $noteApp->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-done">Finish</button>
                    </form>
                </div>
            @else
            <div class="col-md-2 mb-2">
                <form action="todo/{{ $noteApp->id }}/delete" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
            <div class="col-md-2 mb-2">
                <button class="btn btn-done" disabled>This task is over!</button>
            </div>
            @endif
        </div>
        <div class="col-md-12 fw-bolder fs-2">
            @if ($noteApp->finish == null)
                {{ Str::ucfirst($noteApp->title) }}
            @else
            {{ Str::ucfirst($noteApp->title) }} <i class="fas fa-check-circle text-success"></i>
            @endif
        </div>
        <div class="col-md-12">
            {!! $noteApp->desc !!}
        </div>
    </div>
@endsection