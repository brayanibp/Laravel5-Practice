@extends('layouts.admin')
    @section('content')
    @include('gender.modal')
        <div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Genero Editado Correctamente</strong>
        </div>
        <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Operaciones</th>
            </thead>
            <tbody id="datos">

            </tbody>
        </table>
    @endsection

    @section('scripts')
        {!!Html::script('js/read_genders.js')!!}
    @endsection