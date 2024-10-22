@extends('layouts.admin')

@section('content')
    <h2>Detalhes da aula</h2>

    <a href="{{ route('classe.index', ['course' => $classe->course_id]) }}" class="link-button">Aulas</a><br>
    <a href="{{ route('classe.edit', ['classe' => $classe->id])}}" class="link-button">Editar</a><br>

    <x-alert />

    <div class="course-list">
        <div class="course-item">
            <p>Nome: {{ $classe->name }} </p>
                <p>Ordem: {{ $classe->order_classe }} </p>
                <p>Descrição: {{ $classe->description }} </p>
                <p>Curso: {{ $classe->course->name }}</p> 
                <p>Criado em: {{ \Carbon\Carbon::parse($classe->created_at)->format('d/m/Y H:i:s') }}</p>
                <p>Atualizado em: {{ \Carbon\Carbon::parse($classe->updated_at)->format('d/m/Y H:i:s') }}</p>
        </div>
    </div>
    
@endsection
