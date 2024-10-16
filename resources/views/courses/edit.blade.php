@extends('layouts.admin')

@section('content')
    <h2>Editar o Curso</h2>

    <a href="{{ route('course.index')}}" class="link-button">Listar</a><br><br>
    <a href="{{ route('course.show',['course' => $course->id]) }}" class="link-button">Visualizar</a><br>

    <x-alert />

    <form action="{{ route('course.update', ['course' => $course->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nome: </label>
        <input type="text" name="name" id="name" placeholder="Nome do Curso" value="{{ old('name', $course->name) }}" ><br><br>
        <label>Preço: </label>
        <input type="text" name="price" id="price" placeholder="Preço do Curso" value="{{ old('price', $course->price) }}" ><br><br>

        <button type="submit">Salvar</button>
    </form>
@endsection


