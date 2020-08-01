@extends('layouts.admin')
    @section('content')
        {!! Form::open() !!}
            <div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
                <strong>Genero Agregado Correctamente</strong>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token" />
            @include('gender.form.gender')
            {!! link_to('#', $title = 'Registrar', $attributes = ['id' => 'register', 'class' => 'btn btn-primary'], $secure = null) !!}
        {!! Form::close() !!}
    @endsection

    @section('scripts')
        {!!Html::script('js/script.js')!!}
    @endsection