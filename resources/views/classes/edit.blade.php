@extends('layouts.admin')

@section('content')

    <h2>Editar Aula</h2>

    <a href="{{ route('classe.index', ['course' => $classe->course_id]) }}" class="link-button">Aulas</a><br>

    <x-alert />

    <form action="{{ route('classe.update', ['classe' => $classe->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Curso: </label>
        <input type="text" name="name_course" id="name_course" value="{{ $classe->course->name }}" disabled ><br><br>
        
        <label>Nome: </label>
        <input type="text" name="name" id="name" placeholder="Nome da aula" value="{{old('name', $classe->name)}}" required><br><br>

        <label>Descrição: </label>
        <input type="text" name="description" id="description" placeholder="Descrição da Aula" value="{{old('description', $classe->description)}}" required><br><br>

        <button type="submit">Editar</button>


    </form>

@endsection