@extends('layouts.admin')

@section('content')
    <h2>Listar Cursos</h2>

    <a href="{{ route('courses.show')}}" class="link-button">Visualizar</a><br>
    <a href="{{ route('courses.create')}}" class="link-button">Cadastrar</a><br>
@endsection

