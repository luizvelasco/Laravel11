@extends('layouts.admin')

@section('content')
    <h2>Detalhes do Curso</h2>

    <a href="{{ route('courses.index')}}" class="link-button">Listar</a><br>
    <a href="{{ route('courses.edit')}}" class="link-button">Editar</a><br>
@endsection