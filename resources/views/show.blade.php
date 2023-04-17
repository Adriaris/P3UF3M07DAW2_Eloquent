@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">{{ $event->title }}</h1>
        <p>{{ $event->description }}</p>
        <p><strong>Fecha:</strong> {{ $event->date }}</p>
        <p><strong>Ubicación:</strong> {{ $event->location }}</p>
        <hr>

        <h2 class="mt-4">Asistentes:</h2>
        @if ($event->users)
    @if ($event->users->count() > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Registrado en</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($event->users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->pivot->created_at->format('d/m/Y H:i:s') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="color: red">No hay asistentes registrados para este evento</p>
    @endif
@else
    <p style="color: red">No hay asistentes registrados para este evento</p>
@endif

        <hr>

        @if (Auth::check())
            <h3 class="mt-4">Añadir Asistentes</h3>
            <form action="{{ route('events.add_user', ['id' => $event->id]) }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="user" class="col-sm-3 col-form-label">Seleccionar usuario:</label>
                    <div class="col-sm-6">
                        <select class="form-control" id="user" name="user">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3 mt-2 mt-sm-0">
                        <button type="submit" class="btn btn-primary btn-block">Añadir usuario</button>
                    </div>
                </div>
            </form>
        @endif
    </div>
@endsection
