@extends('layouts.admin')
    @include('alerts.success')
    @section('content')
        <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Género</th>
                <th>Dirección</th>
                <th>Caratula</th>
                <th>Operaciones</th>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                <td>{{ $movie->name }}</td>
                <td>{{ $movie->genre }}</td>
                <td>{{ $movie->direction }}</td>
                <td>
                    <img src="movies/{{ $movie->path }}" alt="{{ $movie->path }}" style="width: 100px">
                </td>
                <td>
                    {!! link_to_route('pelicula.edit', $title = 'Editar', $parameters = $movie->id, $attributes = ['class'=>'btn btn-primary']) !!}
                </td>
                @endforeach
            </tbody>
        </table>
    @endsection