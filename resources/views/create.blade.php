@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear evento</h1>
        <form method="POST" action="{{ url('/events') }}">
            @csrf

            <div class="form-group">
                <label for="title">{{ __('Título') }}</label>
                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">{{ __('Descripción') }}</label>
                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">{{ old('description') }}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="location">{{ __('Ubicación') }}</label>
                <textarea id="location" class="form-control @error('location') is-invalid @enderror" name="location" required autocomplete="location">{{ old('location') }}</textarea>
                @error('location')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="date">{{ __('Fecha y hora') }}</label>
                <input id="date" type="datetime-local" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date">
                @error('date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">{{ __('Crear') }}</button>
        </form>
    </div>
@endsection
