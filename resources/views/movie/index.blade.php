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
                <td>Editar</td>
                @endforeach
            </tbody>
        </table>
    @endsection