@extends('layouts.admin')

@section('content')
    {!! Form::open(['route'=>'usuario.store','method'=>'POST']) !!}
        @include('user.forms.usr')
        {!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
@stop   