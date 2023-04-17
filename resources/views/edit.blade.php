@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Editar evento</h1>
        <form action="{{ route('events.update', ['event' => $event->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $event->title }}">
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea class="form-control" id="description" name="description">{{ $event->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="date">Fecha y hora:</label>
                <input type="datetime-local" class="form-control" id="date" name="date"
                    value="{{ date('Y-m-d\TH:i:s', strtotime($event->date)) }}">
            </div>
            <div class="form-group">
                <label for="location">Ubicación:</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ $event->location }}">
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary px-5">Actualizar evento</button>
            </div>
        </form>
    </div>
@endsection
