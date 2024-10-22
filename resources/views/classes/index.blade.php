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

            <div class="button-group">
                <a href="{{ route('classe.show', ['classe' => $classe->id ])}}" class="link-button">Visualizar</a>
                <a href="{{ route('classe.edit', ['classe' => $classe->id ])}}" class="link-button">Editar</a>
                
                <form action="{{ route('classe.destroy', ['classe' => $classe->id]) }}" method="POST" class="inline-form">
                    @csrf
                    @method('delete')
                    <button type="submit" class="link-button delete-button" onclick="return confirm('Tem certeza que deseja apagar esse registro?')">Apagar</button>
                </form>
            </div>
        @empty
            <p class="empty-message">Nenhuma aula encontrada!</p>
        @endforelse
    </div>

@endsection