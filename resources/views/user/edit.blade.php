@extends('layouts.admin')
@section('content')
    @include('alerst.request')
    {!! Form::model($user, ['route'=>[ 'usuario.update', $user->id ],'method'=>'PUT']) !!}
        @include('user.forms.usr')
        {!! Form::submit('Actualizar', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
    {!! Form::open(['route'=>[ 'usuario.destroy', $user->id ],'method'=>'DELETE']) !!}
        {!! Form::submit('Eliminar', ['class'=>'btn btn-danger']) !!}
    {!! Form::close() !!}
@endsection