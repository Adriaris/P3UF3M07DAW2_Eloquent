@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mis eventos creados</h1>
        <div class="row">
            @forelse ($events as $event)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $event->title }}</h4>
                            <p class="card-text">{{ $event->description }}</p>
                            <p class="card-text">Fecha: {{ $event->date }}</p>
                            <p class="card-text">Ubicación: {{ $event->location }}</p>
                            <a href="{{ route('events.show', ['id' => $event->id]) }}" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                        Aún no has creado ningún evento.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
