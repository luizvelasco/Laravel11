@extends('layouts.admin')

@section('content')

    <h2>Cadastrar Aula</h2>

    <a href="{{ route('classe.index', ['course' => $course->id]) }}" class="link-button">Aulas</a><br>

    <x-alert />

    <form action="{{ route('classe.store')}}" method="POST">
        @csrf
        @method('POST')

        <input type="hidden" name="course_id" id="course_id" value="{{ $course_id }}">

        <label>Curso: </label>
        <input type="text" name="name_course" id="name_course" value="{{ $course->name }}" disabled ><br><br>
        
        <label>Nome: </label>
        <input type="text" name="name" id="name" placeholder="Nome da aula" value="{{old('name')}}" required><br><br>

        <label>Descrição: </label>
        <input type="text" name="description" id="description" placeholder="Descrição da Aula" value="{{old('description')}}" required><br><br>

        <button type="submit">Cadastrar</button>


    </form>

@endsection