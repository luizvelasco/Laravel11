@extends('layouts.admin')

@section('content')

    <h2>Listar as aulas</h2>

    <a href="{{ route('course.index')}}" class="link-button">Cursos</a><br>
    <a href="{{ route('classe.create', ['course' => $course->id]) }}" class="link-button">Cadastrar</a><br>

    <x-alert />

    <div class="course-list">
        @forelse ($classes as $classe)
            <div class="course-item">
                <p>Nome: {{ $classe->name }} </p>
                <p>Ordem: {{ $classe->order_classe }} </p>
                <p>Descrição: {{ $classe->description }} </p>
                <p>Curso: {{ $classe->course->name }}</p> 
                <p>Criado em: {{ \Carbon\Carbon::parse($classe->created_at)->format('d/m/Y H:i:s') }}</p>
                <p>Atualizado em: {{ \Carbon\Carbon::parse($classe->updated_at)->format('d/m/Y H:i:s') }}</p>
            </div>
        @empty
            <p class="empty-message">Nenhuma aula encontrada!</p>
        @endforelse
    </div>

@endsection