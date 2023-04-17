@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-end mb-3">

                <a href="{{ url('/events') }}" class="col-1 btn btn-primary">{{ __('Mis eventos') }}</a>
                <a href="{{ url('/events/create') }}" class="col-1 btn btn-success">{{ __('Crear evento') }}</a>

        </div>
        
        
        
        

        <h1>Lista de eventos</h1>
        @if ($events->count() > 0)
            <ul class="list-group">
                @foreach ($events as $event)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $event->title }}
                        <div class="d-flex">
                            <a href="{{ route('events.show', ['id' => $event->id]) }}"
                                class="btn btn-warning btn-sm mr-1">Ver</a>
                            <a href="{{ route('events.edit', ['id' => $event->id]) }}"
                                class="btn btn-success btn-sm">Editar</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="alert alert-danger" role="alert">
                No tienes eventos creados.
            </div>
        @endif
        <a href="{{ route('events.create') }}" class="btn btn-primary mt-3">Crear evento</a>
    </div>
@endsection
