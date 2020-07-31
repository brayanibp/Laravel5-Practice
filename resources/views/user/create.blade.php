@extends('layouts.admin')

@section('content')
    <form action="">
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Correo</label>
            <input type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" class="form-control">
        </div>
        <button class="btn btn-primary">Registrar</button>
    </form>
@stop